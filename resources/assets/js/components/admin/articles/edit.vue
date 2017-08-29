<template>
    <div>
        <h1>
            <small>
                <ui-icon-button
                    icon="arrow_left" size="small" color="green"
                    @click.prevent="back()">
                </ui-icon-button>
            </small>
            Editer article
            <small>
                <ui-button
                        type="secondary" color="accent" size="large"
                        @click.prevent="update()">
                    Modifier
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
            <Vueditor ref="qc"></Vueditor>
        </div>
        <ui-select
            name="albums" label="Albums" placeholder="Choisir le ou les albums" show-search multiple z-index="1"
            id="albums"
            v-model="albumsSelected"
            :options="albums"
            >
        </ui-select>
        <ui-button
                type="secondary" color="accent" size="large"
                @click.prevent="addAlbum()">
            Ajouter un album
        </ui-button>
    </div>
</template>
<script>
    import Keen     from 'keen-ui';
    import {app}    from './../../../app.js';
    import {router} from './../../../app.js';
    import common   from './common.js';
    import back     from './../back.js'
    export default {
        data() {
            return {
                auth:           auth,
                articleId:      ''
            }
        },
        mixins: [common, back],
        methods: {
            index() {
                const _self = this;
                _self.$http.get(
                    'api/article/' +_self.articleId + '/edit'
                ).then(
                    (response) => {
                        const data          = response.data;
                        const newAlbumId    = _self.$route.params.albumId;
                        _self.name          = data.object.name;
                        _self.content       = data.object.content;
                        _self.$refs.qc.setContent(_self.content);
                        _self.menus         = data.menus;
                        data.object.categories.forEach(function(category) {
                            _self.categoriesSelected.push({ 'label': category.name, 'value': category.id });
                        });
                        _self.albums = data.allAlbums;
                        data.albums.forEach(function(album) {
                            _self.albums.push({ 'label': album.name, 'value': album.id });
                        });

                        if (newAlbumId !== 0) {
                            _self.albums.forEach(function(album) {
                                if (newAlbumId == album.value) {
                                    _self.albums.push({ 'label': album.name, 'value': album.id })
                                }
                            });
                        }
                }).catch(
                    error   => {
                        _self.$emit('sas-errors', _self.$store.getters.showError(error.response, _self.formErrors));
                    }
                );
            },
            update() {
                const _self = this;
                _self.send();
            },
            send(newAlbum = false) {
                const _self = this,
                    categories  = [],
                    albums      = [];
                _self.content   = _self.$refs.qc.getContent();
                _self.categoriesSelected.forEach(function(category) {
                    categories.push(category.value);
                });
                _self.albumsSelected.forEach(function(album) {
                    albums.push(album.value);
                });
                _self.$http.patch('api/article/' + _self.articleId, {
                    'name': _self.name, 'categories': categories, 'content': _self.content,
                    'user_id': auth.user.profile.id, 'albums': albums
                }).then(
                    () => {
                        _self.$emit('sas-snackbar', 'Article modifié');
                        if (newAlbum) {
                            router.push({ name: 'admin_albums_new', params: { articleId: _self.articleId } });
                        } else {
                            router.push({ name: 'admin_articles_index' });
                        }
                    }
                ).catch(
                    error   => {
                        _self.$emit('sas-errors', _self.$store.getters.showError(error.response, _self.formErrors));
                    }
                );
            }
        },
        mounted() {
            this.$nextTick(function () {
                const _self = this;
                _self.$store.dispatch("check",
                    { app: _self, router: router }
                )
                _self.articleId = _self.$route.params.articleId;
                _self.index();
            });
        }
    }
</script>
