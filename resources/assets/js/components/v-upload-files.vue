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
                this.$dispatch('onFileClick', this.myFiles);
            },
            fileInputChange: function() {
                // get the group of files assigned to this field
                let ident = this.id || this.name;
                this.myFiles = document.getElementById(ident).files;
                this.$dispatch('onFileChange', this.myFiles);
            },
            _onProgress: function(e) {
                // this is an internal call in XHR to update the progress
                e.percent = (e.loaded / e.total) * 100;
                this.$dispatch('onFileProgress', e);
            },
            _handleUpload: function(file) {
                this.$dispatch('beforeFileUpload', file);
                let form = new FormData();
                let xhr = new XMLHttpRequest();
                try {
                    form.append('Content-Type', file.type || 'application/octet-stream');
                    // our request will have the file in the ['file'] key
                    form.append('file', file);
                } catch (err) {
                    this.$dispatch('onFileError', file, err);
                    return;
                }

                return new Promise(function(resolve, reject) {

                    xhr.upload.addEventListener('progress', this._onProgress, false);

                    xhr.onreadystatechange = function() {
                        if (xhr.readyState < 4) {
                            return;
                        }
                        if (xhr.status < 400) {
                            let res = JSON.parse(xhr.responseText);
                            this.$dispatch('onFileUpload', file, res);
                            resolve(file);
                        } else {
                            let err = JSON.parse(xhr.responseText);
                            err.status = xhr.status;
                            err.statusText = xhr.statusText;
                            this.$dispatch('onFileError', file, err);
                            reject(err);
                        }
                    }.bind(this);

                    xhr.onerror = function() {
                        let err = JSON.parse(xhr.responseText);
                        err.status = xhr.status;
                        err.statusText = xhr.statusText;
                        this.$dispatch('onFileError', file, err);
                        reject(err);
                    }.bind(this);

                    xhr.open(this.method || "POST", this.action, true);
                    if (this.headers) {
                        for(let header in this.headers) {
                            xhr.setRequestHeader(header, this.headers[header]);
                        }
                    }
                    xhr.send(form);
                    this.$dispatch('afterFileUpload', file);
                }.bind(this));
            },
            fileUpload: function() {
                if(this.myFiles.length > 0) {
                    // a hack to push all the Promises into a new array
                    let arrayOfPromises = Array.prototype.slice.call(this.myFiles, 0).map(function(file) {
                        return this._handleUpload(file);
                    }.bind(this));
                    // wait for everything to finish
                    Promise.all(arrayOfPromises).then(function(allFiles) {
                        console.log('onAllFilesUploaded');
                        this.$dispatch('onAllFilesUploaded', allFiles);
                    }.bind(this)).catch(function(err) {
                        this.$dispatch('onFileError', this.myFiles, err);
                    }.bind(this));
                } else {
                    // someone tried to upload without adding files
                    let err = new Error("No files to upload for this field");
                    this.$dispatch('onFileError', this.myFiles, err);
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