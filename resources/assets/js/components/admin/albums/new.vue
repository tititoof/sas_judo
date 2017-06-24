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
            :button-text="uploadName" multiple></file-upload>
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
    export default {
        data() {
            return {
                auth:       auth,
                name:       '',
                files:      [],
                files_id:   [],
                upload:     {},
                active:     false,
                articleId:  null,
                uploadName: 'Télécharger'
            }
        },
        components: {
            FileUpload: require('../../v-upload-files.vue')
        },
        methods: {
            store() {
                const _self = this;
                _self.$refs.fu.fileUpload();
            },
            onFileChange: function(file, res) {
                const _self = this;
                _self.files = file;
            },
            onFileUpload: function(file, res) {
                const _self = this;
                // console.log(file, res);
                _self.files_id.push(res.data.picture_id);
            },
            onAllFilesUploaded: function() {
                const _self = this;
                let data    = new FormData();
                console.log(_self.files_id);
                data.append('name', _self.name);
                data.append('pictures', _self.files_id);
                data.append('user_id', auth.user.profile.id);
                _self.$http.post('api/album', data).then(
                    (response) => {
                        let albumId = response.data.album_id;
                        if ( (_self.articleId !== 0) && (_self.articleId !== null) ) {
                            router.push({ name: 'admin_articles_edit', params: { articleId: _self.articleId, albumId: albumId } });
                        } else {
                            router.push({ name: 'admin_albums_index' });
                        }
                    },
                    (response) => {
                        console.log(response);
                    }
                )
            }
        },
        mounted() {
            this.$nextTick(function () {
                const _self = this;
                auth.check(_self);
                _self.articleId = _self.$route.params.articleId;
            });
        }
    }
</script>
<style>

</style>
