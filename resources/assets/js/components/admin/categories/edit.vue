<template>
    <div class="col-xs-12">
        <h1>
            &Eacute;dition menu
            <small>
                <ui-button type="flat" color="accent" @click="this.update()">Modifier</ui-button>
            </small>
        </h1>
        <ui-textbox
                label="Nom" name="name" type="text" placeholder="Entrer le nom du menu" :value.sync="name"
        ></ui-textbox>
    </div>
</template>
<script>
    import auth from '../../../auth';
    import menu from '../../v-menu.vue';
    import Keen from 'keen-ui';
    import Vue from './../../../app.js';
    import {router} from './../../../app.js';
    export default {
        data() {
            return {
                auth: auth,
                categories: Array,
                name: String,
                categoryId: Number
            }
        },
        methods: {
            update() {
                const _self = this;
                _self.$http
                    .patch('api/category/' + _self.categoryId, { 'name': _self.name, 'id': _self.categoryId })
                    .then((response) => {
                        _self.$dispatch('sas-snackbar', 'Menu modifié');
                        router.go({ name: 'admin_categories' });
                    }, (response) => {
                        console.log(response);
                    });
            }
        },
        components: {
            menu
        },
        ready() {
            const _self = this;
            auth.check();
            _self.categoryId = _self.$route.params.categoryId;
            _self.$http.get('api/category/' + _self.categoryId + '/edit').then(function(response) {
                let data = response.data.object;
                _self.name = data.name;
            }, function(response) {
                console.log("error ! :'(");
            })
        }
    }
</script>