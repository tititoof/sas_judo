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
        <ui-select
            name="types" label="Affichage"
            :options="types"
            v-model="typeSelected"
            placeholder="Choisir le type d'affichage" show-search z-index="1"
        ></ui-select>
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
                auth:           auth,
                categories:     [],
                types:          [],
                typeSelected:   '',
                name:           ''
            }
        },
        methods: {
            index() {
                const _self = this;
                _self.$http.get('api/category/create').then(
                    (response) => {
                        _self.types = response.data.factories;
                    },
                    (response) => {
                        console.log(response);
                    }
                );
            },
            store() {
                const _self = this;
                _self.$http.post('api/category',
                    { 'name': _self.name, 'type': _self.typeSelected.name }).then(
                    (response) => {
                        _self.$emit('sas-snackbar', 'Menu ajouté');
                        router.push({ name: 'admin_categories_index' });
                    },
                    (response) => {
                        console.log(response);
                    }
                );
            }
        },
        mounted() {
            this.$nextTick(function () {
                const _self = this;
                auth.check(_self);
                _self.index();
            });
        }
    }
</script>
