<template>
    <div class="col-xs-12">
        <h1>
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
        <quill ref="qc"
            :options="optionsEditor">
        </quill>
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
    import auth from '../../../auth';
    import Keen from 'keen-ui';
    import { app } from './../../../app.js';
    import { router } from './../../../app.js';
    import Quill from './../../editor/v-quill';
    export default {
        data() {
            return {
                auth:               auth,
                name:               '',
                menus:              [],
                content:            '',
                categoriesSelected: [],
                albums:             [],
                albumsSelected:     [],
                optionsEditor:      {
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
        directives: {
        },
        components: {
            Quill
        },
        computed: {
            editor() {
                return this.$refs.myTextEditor.quillEditor
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
                        _self.menus  = response.data.categories;
                        _self.albums = response.data.albums;
                    },
                    (response) => {
                        _self.$emit('sas-snackbar', 'Une erreur est survenue');
                    }
                );
            },
            save(album = false) {
                const _self = this;
                let categories  = [],
                    albums      = [];
                _self.content   = _self.$refs.qc.$el.querySelector('.ql-editor').innerHTML;
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
                    'user_id':      auth.user.profile.id,
                    'albums':       albums
                }).then(
                    (response) => {
                        _self.$emit('sas-snackbar', 'Article ajouté');
                        const id = response.data.article_id;
                        if (album) {
                            router.push({ name: 'admin_albums_new', params: { articleId: id } });
                        } else {
                            router.push({ name: 'admin_articles_index' });
                        }
                    },
                    (response) => {
                        _self.$emit('sas-snackbar', 'Une erreur est survenue');
                        return null;
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
                auth.check(_self);
                _self.index();
            });
        },
        onEditorBlur(editor) {
        },
        onEditorFocus(editor) {
        },
        onEditorReady(editor) {
        },
        onEditorChange({ editor, html, text }) {
            this.content = html
        }
    }
</script>
