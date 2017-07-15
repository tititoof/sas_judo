<template>
    <div :class="className">
        <label :for="name">
            <input type="file"
               :name="name" :id="getIdName"
               :accept="accept" v-on:click="fileInputClick" v-on:change="fileInputChange"
               :multiple="multiple">
                <slot></slot>
        </label>
        <!--<button type="button" v-on:click="fileUpload">{{ buttonText }}</button>-->
    </div>
</template>
<script>
    import axios from 'axios';
    export default {
        props: {
            className: String,
            name: {
                type: String,
                required: true
            },
            id: String,
            action: {
                type: String,
                required: true
            },
            accept: String,
            multiple: String,
            headers: Object,
            method: String,
            buttonText: {
                type: String,
                default: 'Télécharger'
            }
        },
        computed: {
            getIdName: function() {
                return (this.id || this.name);
            }
        },
        data: function() {
            return {
                myFiles: [] // a container for the files in our field
            };
        },
        methods: {
            fileInputClick: function() {
                // click actually triggers after the file dialog opens
                this.$emit('onFileClick', this.myFiles);
            },
            fileInputChange: function() {
                // get the group of files assigned to this field
                let ident = this.id || this.name;
                this.myFiles = document.getElementById(ident).files;
                this.$emit('onFileChange', this.myFiles);
            },
            _onProgress: function(e) {
                // this is an internal call in XHR to update the progress
                e.percent = (e.loaded / e.total) * 100;
                this.$emit('onFileProgress', e);
            },
            _handleUpload: function(file) {
                this.$emit('beforeFileUpload', file);
                let form = new FormData();
                // let xhr = new XMLHttpRequest();
                try {
                    // form.append('X-CSRF-TOKEN', document.getElementsByName('csrf-token')[0].getAttribute('content'));
                    form.append('Content-Type', file.type || 'application/octet-stream');

                    // our request will have the file in the ['file'] key
                    form.append('file', file);
                } catch (err) {
                    this.$emit('onFileError', file, err);
                    return;
                }
                var my_axios = axios.create({
                  baseURL: 'http://localhost',
                  headers: {
                      'X-CSRF-TOKEN': document.getElementsByName('csrf-token')[0].getAttribute('content'),
                      'Authorization': 'Bearer ' + localStorage.getItem('id_token')
                  },

                });
                my_axios.post('/api/picture', form).then(
                    response => {
                        this.$emit('onFileUpload', file, response);
                        return response;
                    },
                    response => {
                        return response;
                    }
                );
            },
            fileUpload: function() {
                if(this.myFiles.length > 0) {

                    // a hack to push all the Promises into a new array
                    let arrayOfPromises = Array.prototype.slice.call(this.myFiles, 0).map(function(file) {
                        return this._handleUpload(file);
                    }.bind(this));
                    // wait for everything to finish
                    Promise.all(arrayOfPromises).then(function(allFiles) {
                        this.$emit('onAllFilesUploaded', allFiles);
                    }.bind(this)).catch(function(err) {
                        this.$emit('onFileError', this.myFiles, err);
                    }.bind(this));
                } else {
                    // someone tried to upload without adding files
                    let err = new Error("No files to upload for this field");
                    this.$emit('onFileError', this.myFiles, err);
                }
            }
        },
        events: {
            'sendFiles': function() {
                let _self = this;
                _self.fileUpload();
            }
        }
    }
</script>
<style>

</style>
