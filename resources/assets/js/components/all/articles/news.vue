<template>
    <div>
        <h1>
            {{ name }}
        </h1>
        <article
            class="article-section article-section-1"
            v-for="article in articles"
            >
            <h3>{{ article.name }}</h3>
            <p v-html="article.content"></p>
            <p>
                <div
                    class="row text-center portfolio" 
                    style="height:30vh; max-height: 30vh; overflow-y: auto"
                    v-show="article.albums.length > 0">
                    <section v-for="(albums, iAlbums) in article.albums">
                        <div class="col-lg-3 col-sm-3 col-xs-4"
                             v-for="(picture, index) in albums.pictures" style="max-height: 20vh">
                            <img v-img:name 
                                :src="'/get/picture/' + picture.id + '/false'" 
                                class="img-thumbnail img-responsive" 
                                height="20vh">
                            <div class="clear" v-if="(index % 4 == 0) && (index != 0)"></div>
                        </div>
                    </section>
                </div>
            </p>
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
export default {
    data() {
        return {
            articles:   [],
            nbArticles: 0,
            nbPerPage:  0,
            menu:       '',
            page:       1,
            name:       ''
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
        },
        reverseArticles: function() {
            return this.articles.reverse();
        }
    },
    methods: {
        index() {
            const _self = this;
            _self.menu = _self.$route.params.menu;
            _self.$http.get(
                'api/visitor/menu/' + _self.menu + '/' + _self.page
            ).then(
                response => {
                    const data = response.data.data;
                    _self.articles   = data.articles
                    _self.nbArticles = data.nbArticles
                    _self.nbPerPage  = data.nbPerPage
                    _self.name       = data.name
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
        PreviousPage() {
            const _self = this
            router.push({ name: 'visitor_news', params: { 'menu': _self.menu, 'page': (parseInt(_self.page) - 1) } });
        },
        nextPage() {
            const _self = this
            router.push({ name: 'visitor_news', params: { 'menu': _self.menu, 'page': (parseInt(_self.page) + 1) } });
        },
        pictureUrl(id) {
            return '/get/picture/' + id
        }
    },
    mounted() {
        this.$nextTick(function() {
           const _self = this;
           _self.page = _self.$route.params.page
           _self.menu = _self.$route.params.menu
           _self.index()
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
