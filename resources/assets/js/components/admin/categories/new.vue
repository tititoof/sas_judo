<template>
    <div class="col-xs-12">
        <h1>
            Nouveau menu
            <small>
                <ui-button type="flat" color="accent" @click="this.createAction()">Cr&eacute;er</ui-button>
            </small>
        </h1>
        <ui-textbox
                label="Nom" name="name" type="text" placeholder="Entrer le nom du menu" :value.sync="name"
        ></ui-textbox>
    </div>
</template>
<script>
    import auth from '../../../auth';
    import Keen from 'keen-ui';
    import Vue from './../../../app.js';
    import {router} from './../../../app.js';
    export default {
        data() {
            return {
                auth:       auth,
                categories: [],
                name:       ''
            }
        },
        methods: {
            createAction() {
                const _self = this;
                _self.$http.post('api/category', {'name': _self.name}).then(function(response) {
                    _self.$dispatch('sas-snackbar', 'Menu ajouté');
                    router.go({ name: 'admin_categories' });
                }, function(response) {
                    console.log(response);
                });
            }
        },
        ready() {
            auth.check();
        }
    }
</script>