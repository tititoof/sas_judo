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
                myFiles: [], // a container for the files in our field
                filesIds: '',
                my_axios: null
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
                this.filesIds = ''
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
                return this.my_axios.post('/api/picture', form)
            },
            fileUpload: function() {
                const _self = this
                if (_self.myFiles.length > 0) {
                    _self.my_axios = axios.create({
                        baseURL: 'http://localhost',
                        headers: {
                          'X-CSRF-TOKEN': document.getElementsByName('csrf-token')[0].getAttribute('content'),
                          'Authorization': 'Bearer ' + localStorage.getItem('id_token')
                        },
                    });
                    let arrayOfPromises = Array.prototype.slice.call(this.myFiles, 0).map(function(file) {
                        return _self._handleUpload(file);
                    });
                    axios.all(arrayOfPromises)
                        .then(axios.spread((...args) => {
                            for (let i = 0; i < args.length; i++) {
                                _self.filesIds += args[i].data.data + ','
                                this.$emit('onFileUpload', args[i]);
                            }
                            _self.$emit('onAllFilesUploaded', _self.filesIds);
                            
                        }))
                        
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
