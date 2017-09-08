<template>
    <div>
        <template
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
            <hr/>
        </template>
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
            page:           1
        }
    },
    methods: {
        index() {
            const _self = this;
            _self.menu = _self.$route.params.menu;
            _self.$http
            .get(
                'api/visitor/menu/' + _self.menu
            ).then(
                response => {
                    const data = response.data;
                    data.results.forEach(function(element) {
                        _self.formatData(element);
                    })
                    _self.ageCategories = data.ageCategories
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
            this.index()
        }
    }
}
</script>
