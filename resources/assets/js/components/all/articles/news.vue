<template>
    <div>
        <template
            v-for="article in articles"
            >
            <h3>{{ article.name }}</h3>
            <p v-html="article.content"></p>
            <hr/>
        </template>
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
            articles: [],
            menu: '',
            page: 1
        }
    },
    methods: {
        index() {
            const _self = this;
            _self.menu = _self.$route.params.menu;
            _self.$http
            .get(
                'api/visitor/menu/' + _self.menu
            ).then(
                response => {
                    const data = response.data;
                    _self.articles = data;
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
