<template>
    <div>
        <h1>
            <small>
                <ui-icon-button
                    icon="arrow_left" size="small" color="green"
                    @click.prevent="back()">
                </ui-icon-button>
            </small>
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
    import Keen     from 'keen-ui';
    import {app}    from './../../../app.js';
    import {router} from './../../../app.js';
    import common   from './common.js'
    import back     from './../back.js'
    export default {
        data() {
            return {
            }
        },
        mixins: [common, back],
        methods: {
            index() {
                const _self = this;
                _self.$http.get('api/category/create').then(
                    (response) => {
                        _self.types = response.data.factories;
                    }
                ).catch(
                    error   => {
                        _self.$store.dispatch("showError", {
                            response:       error.response,
                            formElements:   _self.formErrors,
                            vue:            _self
                        })
                    }
                );;
            },
            store() {
                const _self = this;
                _self.$http.post('api/category',
                    { 'name': _self.name, 'type': _self.typeSelected.name }).then(
                    () => {
                        _self.$emit('sas-snackbar', 'Menu ajouté');
                        router.push({ name: 'admin_categories_index' });
                    }
                ).catch(
                    error   => {
                        _self.$store.dispatch("showError", {
                            response:       error.response,
                            formElements:   _self.formErrors,
                            vue:            _self
                        })
                    }
                );;
            }
        },
        mounted() {
            this.$nextTick(function () {
                const _self = this;
                _self.$store.dispatch("check",
                    { app: _self, router: router }
                )
                _self.index();
            });
        }
    }
</script>
