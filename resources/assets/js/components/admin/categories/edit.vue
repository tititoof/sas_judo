<template>
    <div>
        <h1>
            <small>
                <ui-icon-button 
                    icon="arrow_left" size="small" color="green"
                    @click.prevent="back()">
                </ui-icon-button>
            </small>
            &Eacute;dition menu
            <small>
                <ui-button
                    type="secondary" color="accent"
                    @click.prevent="update()">Modifier</ui-button>
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
    import auth     from '../../../auth';
    import vMenu    from '../../v-menu.vue';
    import Keen     from 'keen-ui';
    import {app}    from './../../../app.js';
    import {router} from './../../../app.js';
    import common   from './common.js'
    import back     from './../back.js'
    export default {
        data() {
            return {
                auth:           auth,
                categoryId:     null
            }
        },
        mixins: [common, back],
        methods: {
            index() {
                const _self = this;
                _self.$http.get('api/category/' + _self.categoryId + '/edit').then(
                    (response) => {
                        const data          = response.data.object;
                        _self.name          = data.name;
                        _self.types         = response.data.factories;
                        _self.types.forEach(function(element) {
                            if (element.name == data.type) {
                                _self.typeSelected  = element;
                            }
                        });
                    }
                ).catch(
                    error   => {
                        _self.$emit('sas-errors', auth.showError(error.response, _self.formErrors));
                    }
                );
            },
            update() {
                const _self = this;
                _self.$http.patch('api/category/' + _self.categoryId,
                    { 'name': _self.name, 'id': _self.categoryId, 'type': _self.typeSelected.name }
                ).then(
                    () => {
                        _self.$emit('sas-snackbar', 'Menu modifié');
                        router.push({ name: 'admin_categories_index' });
                    }
                ).catch(
                    error   => {
                        _self.$emit('sas-errors', auth.showError(error.response, _self.formErrors));
                    }
                );
            }
        },
        components: {
            vMenu
        },
        mounted() {
            this.$nextTick(function () {
                const _self = this;
                auth.check(_self);
                _self.categoryId = _self.$route.params.categoryId;
                _self.index();
            });
        }
    }
</script>
