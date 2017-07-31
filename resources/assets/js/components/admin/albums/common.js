export default {
    data() {
        return {
            name:       '',
            files:      [],
            files_id:   Array,
            allPictures:[],
            pictures:   [],
            upload:     {},
            active:     false,
            uploadName: 'Télécharger',
            filesIds:   '',
            formErrors: [
                { 'name': 'name', 'human': 'Nom'}, 
                { 'name': 'pictures', 'human': "Images"}
            ]
        }
    },
    computed: {
        getFilesIds: function() {
            const _self = this;
            const str = _self.filesIds.replace(/(^[,\s]+)|([,\s]+$)/g, '')
            return str.split(',')
        }
    },
    methods: {
        onFileChange(file) {
            const _self = this;
            _self.files = file;
        },
        onFileUpload(res) {
            const _self = this;
            _self.filesIds += res.data.data + ','
            _self.$store.dispatch('addPictureToAlbum', res.data.data)
        },
    }
}