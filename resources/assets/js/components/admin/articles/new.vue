<template>
    <div>
        <h1>
            <small>
                <ui-icon-button
                    icon="arrow_left" size="small" color="green"
                    @click.prevent="back()">
                </ui-icon-button>
            </small>
            Nouvel article
            <small>
                <ui-button
                   type="secondary" color="accent" size="large"
                   @click.prevent="store()">
                    Cr&eacute;er
                </ui-button>
            </small>
        </h1>
        <ui-select
                name="categories" label="Menus"
                :options="menus"
                v-model="categoriesSelected"
                placeholder="Choisir le ou les menus" show-search multiple z-index="1"
        ></ui-select>
        <ui-textbox
                label="Nom" name="name" type="text" placeholder="Entrer le nom de l'article" v-model="name"
        >
        </ui-textbox>
        <div id="editor-vue">
            <Vueditor ref="qc" style="height: 400px"></Vueditor>
        </div>
        <p style="height: 10vh"></p>
        <ui-select
                name="albums" label="Albums"
                :options="albums"
                v-model="albumsSelected"
                placeholder="Choisir le ou les albums" show-search multiple z-index="1"
        ></ui-select>
        <ui-button
            type="secondary" color="accent" size="large"
            @click="addAlbum()"
            >
            Ajouter un album
        </ui-button>
    </div>
</template>
<script>
    import Keen             from 'keen-ui';
    import { app }          from './../../../app.js';
    import { router }       from './../../../app.js';
    import common           from './common.js';
    import back             from './../back.js'
    import { mapGetters }   from 'vuex';
    export default {
        data() {
            return {
            }
        },
        mixins: [common, back],
        directives: {
        },
        computed: {
            editor() {
                return this.$refs.qc
            },
            user_id: {
                get() {
                    return this.$store.state.user.user.profile.data.id;
                }
            }
        },
        methods: {
            store() {
                const _self = this;
                _self.save();
            },
            index() {
                const _self = this;
                let maxRows = 10;
                let maxCols = 5;
                for (let r = 1; r <= maxRows; r++) {
                  for (let c = 1; c <= maxCols; c++) {
                    _self.tableOptions.push('newtable_' + r + '_' + c);
                  }
                }
                _self.$http.get('api/article/create').then(
                    (response) => {
                        _self.menus  = response.data.categories;
                        _self.albums = response.data.albums;
                    }
                ).catch(
                    error   => {
                        _self.$emit('sas-errors', _self.$store.getters.showError(error.response, _self.formErrors));
                    }
                );
            },
            save(album = false) {
                const _self     = this,
                    categories  = [],
                    albums      = [];
                _self.content   = _self.$refs.qc.getContent();
                _self.categoriesSelected.forEach(function(category) {
                    categories.push(category.value);
                });
                _self.albumsSelected.forEach(function(album) {
                    albums.push(album.value);
                });

                _self.$http.post('api/article', {
                    'name':         _self.name,
                    'categories':   categories,
                    'content':      _self.content,
                    'user_id':      _self.user_id,
                    'albums':       albums
                }).then(
                    (response) => {
                        _self.$emit('sas-snackbar', 'Article ajouté');
                        const id = response.data.data.article_id;
                        if (album) {
                            router.push({ name: 'admin_albums_new', params: { articleId: id } });
                        } else {
                            router.push({ name: 'admin_articles_index' });
                        }
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
            addAlbum() {
                const _self = this;
                _self.save(true);
            }
        },
        mounted() {
            this.$nextTick(function () {
                const _self = this;
                _self.$store.dispatch("check",
                    { app: _self, router: router }
                )
                _self.index();
            });
        }
    }
</script>
