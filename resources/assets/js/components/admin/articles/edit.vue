<template>
    <div class="col-xs-12">
        <h1>
            Editer article
            <small>
                <ui-button type="flat" color="accent" @click="this.update()">Modifier</ui-button>
            </small>
        </h1>
        <ui-select
                name="categories" label="Menus" :value.sync="menus" :options="allMenus"
                placeholder="Choisir le ou les menus" show-search multiple z-index="1"
        ></ui-select>
        <ui-textbox
                label="Nom" name="name" type="text" placeholder="Entrer le nom de l'article" :value.sync="name"
        >
        </ui-textbox>
        <vue-html5-editor :content.sync="content" :height="500" :z-index="1"></vue-html5-editor>
        <ui-select
            name="albums" label="Albums" placeholder="Choisir le ou les albums" show-search multiple z-index="1"
            id="albums"
            :options="albums" :value.sync="albumsSelected" :default="albumsDefault"
            ></ui-select>
        <ui-button type="flat" color="accent" @click="this.addAlbum()">Ajouter un album</ui-button>
    </div>
</template>
<script>
    import auth from '../../../auth';
    import Keen from 'keen-ui';
    import Vue from './../../../app.js';
    import {router} from './../../../app.js';
    export default {
        data() {
            return {
                auth:           auth,
                articleId:      '',
                name:           '',
                menus:          [],
                allMenus:       [],
                content:        '',
                albums:         [],
                albumsDefault:  [],
                albumsSelected: []
            }
        },
        methods: {
            index() {
                const _self = this;
                _self.$http.get('api/article/' +_self.articleId + '/edit').then(
                    (response) => {
                        let data        = response.data,
                            newAlbumId  = _self.$route.params.albumId;
                        _self.name      = data.object.name;
                        _self.content   = data.object.content;
                        _self.allMenus  = data.menus;
                        data.object.categories.forEach(function(category) {
                            _self.menus.push({ 'text': category.name, 'value': category.id });
                        });
                        _self.albums = data.allAlbums;
//                        _self.albumsDefault = "[";
                        data.albums.forEach(function(album) {
//                            _self.albumsDefault += album.id + ",";
                            _self.$broadcast('ui-select::set-selected', album.id, 'albums');
                            _self.albumsDefault.push({ 'text': album.name, 'value': album.id });
                        });

                        if (newAlbumId !== 0) {
                            _self.albums.forEach(function(album) {
                                if (newAlbumId == album.value) {
//                                    _self.albumsDefault += album.id + ",";
                                    _self.albumsDefault.push({ 'text': album.name, 'value': album.id })
                                }
                            });
                        }
                        console.log(_self.albumsDefault);
//                        _self.albumsDefault = _self.albumsDefault.substring(0, _self.albumsDefault.length - 1);
//                        _self.albumsDefault += "]";
                    },
                    (response) => {
                        console.log(response);
                    });
            },
            update() {
                const _self = this;
                _self.send();
            },
            addAlbum() {
                const _self = this;
                _self.save(true);
            },
            send(newAlbum = false) {
                const _self = this;
                let categories  = [],
                    albums      = [];
                _self.menus.forEach(function(category) {
                    categories.push(category.value);
                });
                _self.AlbumsSelected.forEach(function(album) {
                    albums.push(album.value);
                });
                _self.$http.patch('api/article/' + _self.articleId, {
                    'name': _self.name, 'categories': categories, 'content': _self.content,
                    'user_id': auth.user.profile.id, 'albums': albums
                }).then(
                    (response) => {
                        _self.$dispatch('sas-snackbar', 'Article modifié');
                        if (newAlbum) {
                            router.go({ name: 'admin_albums_new', params: { articleId: _self.articleId } });
                        } else {
                            router.go({ name: 'admin_articles_index' });
                        }
                    },
                    (response) => {
                        console.log(response);
                    }
                );
            }
        },
        ready() {
            const _self = this;
            auth.check();
            _self.articleId = _self.$route.params.articleId;
            _self.index();
        }
    }
</script>