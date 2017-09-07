<template>
    <div>
        <h1>
            <small>
                <ui-icon-button
                    icon="arrow_left" size="small" color="green"
                    @click.prevent="back()">
                </ui-icon-button>
            </small>
            Nouvel album
            <small>
                <ui-button
                        type="secondary" color="accent" size="large"
                        @click.prevent="store()">
                    Cr&eacute;er
                </ui-button>
            </small>
        </h1>
        <ui-textbox
            label="Nom" name="name" type="text" placeholder="Entrer le nom de l'album" v-model="name"
        ></ui-textbox>
        <file-upload
            v-on:onFileChange="onFileChange"
            v-on:onFileUpload="onFileUpload"
            v-on:onAllFilesUploaded="onAllFilesUploaded"
            ref="fu"
            class="bg-info" name="pictures" id="pictures" accept="image/*" action="/api/picture"
            :button-text="uploadName" multiple>
        </file-upload>

        <ul>
            <li v-for="file in files">
                {{ file.name }} ({{ file.size }})
            </li>
        </ul>
    </div>
</template>
<script>
    import Keen             from 'keen-ui';
    import Vue              from './../../../app.js';
    import { router }       from './../../../app.js';
    import common           from './common.js';
    import back             from './../back.js'
    import { mapGetters }   from 'vuex'
    export default {
        data() {
            return {
                articleId: null
            }
        },
        mixins: [common, back],
        components: {
            FileUpload: require('../../v-upload-files.vue')
        },
        computed:
            mapGetters({
                user_id: 'getUserId'
            })
        ,
        methods: {
            store() {
                const _self = this;
                _self.$refs.fu.fileUpload();
            },
            onAllFilesUploaded(allFiles) {
                const _self = this;
                _self.filesIds = allFiles
                _self.$http
                .post(
                    'api/album',
                    { 'name': _self.name, 'pictures': _self.getFilesIds, 'user_id': _self.user_id }
                ).then(
                    response => {
                        const albumId = response.data.data.album_id;
                        _self.$emit('sas-snackbar', 'Les images ont bien été enregistrées');
                        _self.$emit('sas-snackbar', 'Album créé');
                        if ( typeof _self.articleId !== 'undefined' ) {
                            router.push({ name: 'admin_articles_edit', params: { articleId: _self.articleId, albumId: albumId } });
                        } else {
                            router.push({ name: 'admin_albums_index' });
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
                )
            }
        },
        mounted() {
            this.$nextTick( () => {
                const _self = this;
                _self.$store.dispatch("check",
                    { app: _self, router: router }
                )
                _self.files_id = []
                _self.$store.dispatch('resetPicturesInAlbum')
                _self.articleId = _self.$route.params.articleId
            });
        }
    }
</script>
<style>

</style>
