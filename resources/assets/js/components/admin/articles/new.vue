<template>
    <div class="col-xs-12">
        <h1>
            Nouvel article
            <small>
                <ui-button type="flat" color="accent" @click="this.store()">Cr&eacute;er</ui-button>
            </small>
        </h1>
        <ui-select
                name="categories" label="Menus" :options="menus" :value.sync="categoriesSelected"
                placeholder="Choisir le ou les menus" show-search multiple z-index="1"
        ></ui-select>
        <ui-textbox
                label="Nom" name="name" type="text" placeholder="Entrer le nom de l'article" :value.sync="name"
        >
        </ui-textbox>
        <vue-html5-editor :content.sync="content" :height="500" :z-index="1"></vue-html5-editor>
        <ui-select
                name="albums" label="Albums" :options="albums" :value.sync="AlbumsSelected"
                placeholder="Choisir le ou les albums" show-search multiple z-index="1"
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
                auth: auth,
                name: '',
                menus: [],
                content: '',
                categoriesSelected: [],
                albums: [],
                AlbumsSelected: []
            }
        },
        methods: {
            store() {
                const _self = this;
                _self.save();
            },
            index() {
                const _self = this;
                _self.$http.get('api/article/create').then(
                    (response) => {
                        _self.menus = response.data.categories;
                        _self.albums = response.data.albums;
                    },
                    (response) => {
                        console.log(response);
                    }
                );
            },
            save(album = false) {
                const _self = this;
                let categories  = [],
                    albums      = [];
                _self.categoriesSelected.forEach(function(category) {
                    categories.push(category.value);
                });
                _self.AlbumsSelected.forEach(function(album) {
                    albums.push(album.value);
                });
                _self.$http.post('api/article', {
                    'name': _self.name,
                    'categories': categories,
                    'content': _self.content,
                    'user_id': auth.user.profile.id,
                    'albums': albums
                }).then(
                    (response) => {
                        _self.$dispatch('sas-snackbar', 'Article ajouté');
                        let id = response.data.article_id;
                        if (album) {
                            router.go({ name: 'admin_albums_new', params: { articleId: id } });
                        } else {
                            router.go({ name: 'admin_articles_index' });
                        }
                    },
                    (response) => {
                        console.log(response);
                        return null;
                    }
                );
            },
            addAlbum() {
                const _self = this;
                _self.save(true);
            }
        },
        ready() {
            const _self = this;
            auth.check();
            _self.index();
        }
    }
</script>