<template>
    <div>
        <h1>
            <small>
                <ui-icon-button
                    icon="arrow_left" size="small" color="green"
                    @click.prevent="back()">
                </ui-icon-button>
            </small>
            Edition de l'album
            <small>
                <ui-button
                    type="secondary" color="accent" size="large"
                    @click.prevent="update()">
                    Modifier
                </ui-button>
            </small>
        </h1>
        <ui-textbox
                label="Nom" name="name" type="text" placeholder="Entrer le nom de l'album" :value.sync="name"
        ></ui-textbox>
        <file-upload
            v-on:onFileChange="onFileChange"
            v-on:onFileUpload="onFileUpload"
            v-on:onAllFilesUploaded="onAllFilesUploaded"
            ref="fu"
            class="bg-info" name="pictures" id="pictures" accept="image/*" action="/api/picture" :button-text="uploadName" multiple>
        </file-upload>
        <ul class="pagination">
            <li v-for="file in files">
                {{ file.name }} ({{ file.size }})
            </li>
        </ul>
        <ui-collapsible :open="false">
            <div slot="header">
                <h4>Images de l'abum</h4>
            </div>
            <div class="row text-center portfolio" style="height:500px; max-height:500px; overflow-y: auto">
                <div class="col-lg-3 col-sm-3 col-xs-4"
                     v-for="(picture, index) in pictures" style="max-height: 200px">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <a href="#" height="150px">
                                <lazy-image
                                    :src='picture.url'
                                    class="img-thumbnail img-responsive" height="150px"
                                ></lazy-image>
                            </a>
                        </div>
                        <div class="panel-footer">
                            <ui-icon-button
                                icon="delete" type="secondary" color="red" size="small"
                                @click.prevent="togglePicture(picture.id)">
                            </ui-icon-button>
                        </div>
                    </div>
                    <div class="clear" v-if="(index % 4 == 0) && (index != 0)"></div>
                </div>
            </div>
        </ui-collapsible>
        <ui-collapsible :open="false">
            <div slot="header">
                <h4>Images enregistrées</h4>
            </div>
            <div class="row text-center portfolio" style="height:500px; max-height:500px; overflow-y: auto">
                <div class="col-lg-3 col-sm-3 col-xs-4"
                     v-for="(picture, index) in allPictures" style="max-height: 200px">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <a href="#" height="150px">
                                <lazy-image
                                    :src='picture.url'
                                    class="img-thumbnail img-responsive" height="150px"
                                ></lazy-image>
                            </a>
                        </div>
                        <div class="panel-footer">
                            <ui-icon-button
                                icon="add" type="secondary" color="green" size="small"
                                @click.prevent="togglePicture(picture.id)">
                            </ui-icon-button>
                        </div>
                    </div>
                    <div class="clear" v-if="(index % 4 == 0) && (index != 0)"></div>

                </div>
            </div>
        </ui-collapsible>
    </div>
</template>
<script>
    import Keen         from 'keen-ui';
    import Vue          from './../../../app.js';
    import { router }   from './../../../app.js';
    import common       from './common.js';
    import back         from './../back.js'
    export default {
        data() {
            return {
                albumId:    '',
            }
        },
        mixins: [common, back],
        components: {
            FileUpload: require('../../v-upload-files.vue')
        },
        computed: {
            presentInArray: function (picture) {
                return !this.pictures.includes(picture);
            }
        },
        methods: {
            togglePicture(id) {
                const _self = this;
                _self.$http.get('api/picture/' + id + '/sync/album/' + _self.albumId).then(
                    (response) => {
                        const data          = response.data;
                        _self.pictures      = [];
                        _self.allPictures   = [];
                        _self.setPictures(data);
                    }
                ).catch(
                    error   => {
                        _self.$emit('sas-errors', _self.$store.getters.showError(error.response, _self.formErrors));
                    }
                )
            },
            update() {
                const _self = this;
                if (_self.files.length > 0) {
                    _self.$refs.fu.fileUpload();
                } else {
                    _self.onAllFilesUploaded();
                }
            },
            index() {
                const _self = this;
                _self.$http.get('api/album/' +_self.albumId + '/edit').then(
                    (response) => {
                        const data  = response.data;
                        _self.name  = data.object.name;
                        _self.setPictures(data);
                    }
                ).catch(
                    error   => {
                        _self.$emit('sas-errors', _self.$store.getters.showError(error.response, _self.formErrors));
                    }
                )
            },
            setPictures(data) {
                const _self = this
                data.pictures.forEach(function(picture) {
                    _self.pictures.push({ 'id': picture.id, 'url': '/get/picture/' + picture.id });
                });
                data.all_pictures.forEach(function(picture) {
                    _self.allPictures.push({ 'id': picture.id, 'url': '/get/picture/' + picture.id });
                });
            },
            onAllFilesUploaded: function(allFiles) {
                const _self = this;
                _self.filesIds = allFiles
                _self.$http.patch(
                    'api/album/' + _self.albumId,
                    { 'name': _self.name, 'pictures': _self.getFilesIds, 'user_id': auth.user.profile.id }
                ).then(
                    () => {
                        _self.$emit('sas-snackbar', 'Les images ont bien été enregistrées');
                    }
                ).catch(
                    error   => {
                        _self.$emit('sas-errors', _self.$store.getters.showError(error.response, _self.formErrors));
                    }
                )
            }
        },
        mounted() {
            this.$nextTick(function () {
                const _self = this;
                _self.$store.dispatch("check",
                    { app: _self, router: router }
                )
                _self.albumId = _self.$route.params.albumId;
                _self.index();
            });
        }
    }
</script>
<style>
    /* add a little bottom space under the images */
    .portfolio>.clear::before {
        content: '';
        display: table;
        clear: both;
    }
</style>
