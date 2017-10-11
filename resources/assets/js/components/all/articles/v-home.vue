<template>
    <div>
        <h1>Laravel 5</h1>
        <h2>test moi</h2>
    </div>
</template>
<script>
import vMenu    from '../../v-menu.vue';
import Keen     from 'keen-ui';
import {app}    from './../../../app.js';
import {router} from './../../../app.js';
export default {
    data() {
        return {
            page: 1
        }
    },
    methods: {
        index() {
            const _self = this;
            _self.$http.get(
                'api/visitor/' + _self.page + '/articles'
            ).then(
                response => {

                }
            ).catch(
                error   => {
                    _self.$store.dispatch("showError", {
                        response:       error.response,
                        formElements:   _self.formErrors,
                        vue:            _self
                    })
                }
            );
        }
    },
    mounted() {
        this.$nextTick(function() {
           const _self = this;
           _self.index();
        });
    },
    watch: {
        '$route.params.menu'(newId, oldId) {
            this.index()
        }
    }
    
}
</script>
