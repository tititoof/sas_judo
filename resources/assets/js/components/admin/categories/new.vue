<template>
    <div class="col-xs-12">
        <h1>
            Nouveau menu
            <small>
                <ui-button
                    type="secondary" color="accent" size="large"
                    @click.prevent="store()">
                    Cr&eacute;er
                </ui-button>
            </small>
        </h1>
        <ui-textbox
            label="Nom" name="name" type="text" placeholder="Entrer le nom du menu"
            v-model="name"
        ></ui-textbox>
    </div>
</template>
<script>
    import auth from '../../../auth';
    import Keen from 'keen-ui';
    import {app} from './../../../app.js';
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
            store() {
                const _self = this;
                _self.$http.post('api/category', {'name': _self.name}).then(function(response) {
                    _self.$emit('sas-snackbar', 'Menu ajouté');
                    router.push({ name: 'admin_categories_index' });
                }, function(response) {
                    console.log(response);
                });
            }
        },
        mounted() {
            this.$nextTick(function () {
                let _self = this;
                auth.check(_self);
            });
        }
    }
</script>
