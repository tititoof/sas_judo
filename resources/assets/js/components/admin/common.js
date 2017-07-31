export default {
    methods: {
        deleteObject: function(url, message) {
            const _self = this;
            _self.$http.delete(url)
            .then(
                () => {
                _self.$emit('sas-snackbar', message);
                _self.index();
            }).catch(
                error   => {
                    _self.$emit('sas-errors', auth.showError(error.response, _self.formErrors));
                }
            );
        }
    },
}