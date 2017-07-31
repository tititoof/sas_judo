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
}