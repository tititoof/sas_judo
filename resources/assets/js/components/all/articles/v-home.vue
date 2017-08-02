<template>
    <div>
        <h1>Laravel 5</h1>
        <h2>test moi</h2>
    </div>
</template>
<script>
import auth     from '../../../auth';
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
                    
                    // console.log(response);
                }
            ).catch(
                error   => {
                    _self.$emit('sas-errors', auth.showError(error.response, _self.formErrors));
                }
            );
        }
    },
    mounted() {
        this.$nextTick(function() {
           const _self = this;
           auth.check(_self);
           _self.index();
        });
    }
}
</script>
