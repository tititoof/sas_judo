<template>
    <h1>Laravel 5</h1>
    test
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
            menu: '',
            page: 1
        }
    },
    methods: {
        index() {
            const _self = this;
            _self.menu = _self.$route.params.menu;
            _self.$http.get('api/visitor/menu/' + _self.menu).then(
                response => {
                    console.log(response);
                },
                response => {
                    console.log(response);
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
