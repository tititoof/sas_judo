<template>
    <div class="col-xs-12">
        <h1>
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
    import auth from '../../../auth';
    import Keen from 'keen-ui';
    import Vue from './../../../app.js';
    import {router} from './../../../app.js';
    import common from './common.js';
    export default {
        mixins: [common],
        components: {
            FileUpload: require('../../v-upload-files.vue')
        },
        methods: {
            store() {
                const _self = this;
                _self.$refs.fu.fileUpload();
            },
            onAllFilesUploaded(allFiles) {
                const _self = this;
                _self.filesIds = allFiles
                _self.$http.post('api/album', { 'name': _self.name, 'pictures': _self.getFilesIds, 'user_id': auth.user.profile.id }).then(
                    response => {
                        const albumId = response.data.album_id;
                        if ( (_self.articleId !== 0) && (_self.articleId !== null) ) {
                            router.push({ name: 'admin_articles_edit', params: { articleId: _self.articleId, albumId: albumId } });
                        } else {
                            router.push({ name: 'admin_albums_index' });
                        }
                    }
                ).catch(
                    error   => {
                        _self.$emit('sas-errors', auth.showError(error.response, _self.formErrors));
                    }
                )
            }
        },
        mounted() {
            this.$nextTick( () => {
                const _self = this;
                auth.check(_self);
                _self.files_id = []
                _self.$store.dispatch('resetPicturesInAlbum')
                _self.articleId = _self.$route.params.articleId
            });
        }
    }
</script>
<style>

</style>
