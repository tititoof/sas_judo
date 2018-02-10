<template>
    <div>
        <article 
            class="article-section article-section-1"
            v-for="result in results"
            >
            <h3>
                <img src="/api/visitor/menu/picture/logo_judo.png" height="30px"/>
                {{ result.name }}, le {{ result.contest_at }} à {{ result.locality }}
            </h3>
            <ul>
                <li
                    v-for="information in result.informations"
                    >
                    {{ information.name }} : {{ information.place }}
                    <template v-if="information.ageCategory">
                        ({{ information.ageCategory.label }})
                    </template>
                </li>
            </ul>
            <br/>
        </article>
        <nav aria-label="...">
            <ul class="pager">
                <li class="previous disabled">
                    <ui-icon-button 
                        color="green" 
                        icon="keyboard_arrow_left" 
                        size="small"
                        :disabled="firstPage"
                        @click.prevent="PreviousPage"
                        >
                    </ui-icon-button>
                </li>
                <li class="next">
                    <ui-icon-button 
                        color="green" 
                        icon="keyboard_arrow_right" 
                        size="small"
                        :disabled="lastPage"
                        @click.prevent="nextPage"
                        >
                    </ui-icon-button>
                </li>
            </ul>
        </nav>
    </div>
</template>
<script>
import vMenu    from '../../v-menu.vue';
import Keen     from 'keen-ui';
import {app}    from './../../../app.js';
import {router} from './../../../app.js';
import moment   from 'moment'

export default {
    data() {
        return {
            results:        [],
            ageCategories:  [],
            menu:           '',
            page:           1,
            name:           '',
            nbArticles:     0,
            nbPerPage:      0
        }
    },
    computed: {
        firstPage: function() {
            const _self = this
            return (_self.page === 1)
        },
        lastPage: function() {
            const _self = this;
            return ( (_self.nbPerPage * _self.page) >= _self.nbArticles )
        }
    },
    methods: {
        index() {
            const _self = this;
            _self.menu = _self.$route.params.menu;
            _self.$http
            .get(
                'api/visitor/menu/' + _self.menu + '/' + _self.page
            ).then(
                response => {
                    const data = response.data.data;
                    data.results.forEach(function(element) {
                        _self.formatData(element);
                    })
                    _self.ageCategories = data.ageCategories
                    _self.nbArticles    = data.nbResults
                    _self.nbPerPage     = data.nbPerPage
                }
            ).catch(
                error   => {
                    _self.$store.dispatch("showError", {
                        response:       error.response,
                        formElements:   _self.formErrors,
                        vue:            _self
                    })
                }
            );
        },
        formatData(data) {
            const _self = this,
                 line = {};
            line.name  = data.name;
            line.contest_at = moment(data.contest_at, "YYYY-MM-DD HH:mm:ss").format("dddd Do MMMM YYYY");
            line.locality   = data.locality
            line.informations = JSON.parse(data.informations);
            _self.results.push(line);
        },
        PreviousPage() {
            const _self = this
            router.push({ name: 'visitor_news', params: { 'menu': _self.menu, 'page': (_self.page - 1) } });
        },
        nextPage() {
            const _self = this
            router.push({ name: 'visitor_news', params: { 'menu': _self.menu, 'page': (_self.page + 1) } });
        }
    },
    mounted() {
        this.$nextTick(function() {
           const _self = this;
           moment.locale('fr');
           _self.index();
        });
    },
    watch: {
        '$route.params.menu'(newId, oldId) {
           const _self = this;
            _self.page = _self.$route.params.page
            _self.menu = _self.$route.params.menu
            this.index()
        },
        '$route.params.page'(newId, oldId) {
           const _self = this;
            _self.page = _self.$route.params.page
            _self.menu = _self.$route.params.menu
            this.index()
        }
    }
}
</script>
