<template>
    <div class="col-xs-12">
        <h1>
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
                :options="allMenus"
                v-model="menus"
                placeholder="Choisir le ou les menus" show-search multiple z-index="1"
        ></ui-select>
        <ui-textbox
                label="Nom" name="name" type="text" placeholder="Entrer le nom de l'article" v-model="name"
        >
        </ui-textbox>
        <quill ref="qc"
               :options="optionsEditor">
        </quill>
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
    import auth from '../../../auth';
    import Keen from 'keen-ui';
    import {app} from './../../../app.js';
    import {router} from './../../../app.js';
    import Quill from './../../editor/v-quill';
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
                albumsSelected: [],
                optionsEditor: {
                    modules: {
                        toolbar: [
                            ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
                            ['blockquote', 'code-block'],

                            [{ 'header': 1 }, { 'header': 2 }],               // custom button values
                            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                            [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
                            [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
                            [{ 'direction': 'rtl' }],                         // text direction

                            [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
                            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                            [ 'link', 'image', 'video', 'formula' ],
                            [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
                            [{ 'font': [] }],
                            [{ 'align': [] }],
                            ['clean']                                         // remove formatting button
                        ],
                    },
                    theme: 'snow'
                }
            }
        },
        components: {
            Quill
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
                        _self.$refs.qc.$el.querySelector('.ql-editor').innerHTML = _self.content;
                        _self.allMenus  = data.menus;
                        data.object.categories.forEach(function(category) {
                            _self.menus.push({ 'label': category.name, 'value': category.id });
                        });
                        _self.albums = data.allAlbums;
                        data.albums.forEach(function(album) {
                            _self.albumsDefault.push({ 'label': album.name, 'value': album.id });
                        });

                        if (newAlbumId !== 0) {
                            _self.albums.forEach(function(album) {
                                if (newAlbumId == album.value) {
                                    _self.albumsDefault.push({ 'label': album.name, 'value': album.id })
                                }
                            });
                        }
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
                _self.send(true);
            },
            send(newAlbum = false) {
                const _self = this;
                let categories  = [],
                    albums      = [];
                _self.content   = _self.$refs.qc.$el.querySelector('.ql-editor').innerHTML;
                _self.menus.forEach(function(category) {
                    categories.push(category.value);
                });
                _self.albumsSelected.forEach(function(album) {
                    albums.push(album.value);
                });
                _self.$http.patch('api/article/' + _self.articleId, {
                    'name': _self.name, 'categories': categories, 'content': _self.content,
                    'user_id': auth.user.profile.id, 'albums': albums
                }).then(
                    (response) => {
                        _self.$emit('sas-snackbar', 'Article modifié');
                        if (newAlbum) {
                            router.push({ name: 'admin_albums_new', params: { articleId: _self.articleId } });
                        } else {
                            router.push({ name: 'admin_articles_index' });
                        }
                    },
                    (response) => {
                        console.log(response);
                    }
                );
            }
        },
        mounted() {
            this.$nextTick(function () {
                const _self = this;
                auth.check(_self);
                _self.articleId = _self.$route.params.articleId;
                _self.index();
            });
        },
        onEditorBlur(editor) {
            console.log('editor blur!', editor)
        },
        onEditorFocus(editor) {
            console.log('editor focus!', editor)
        },
        onEditorReady(editor) {
            console.log('editor ready!', editor)
        },
        onEditorChange({ editor, html, text }) {
            this.content = html
        }
    }
</script>
