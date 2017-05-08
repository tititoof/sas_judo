<template>
    <div class="col-xs-12">
        <h1>
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
    export default {
        data() {
            return {
                auth:           auth,
                categories:     [],
                types:          [],
                typeSelected:   '',
                name:           '',
                categoryId:     null
            }
        },
        methods: {
            index() {
                const _self = this;
                _self.$http.get('api/category/' + _self.categoryId + '/edit').then(
                    (response) => {
                        let data            = response.data.object;
                        _self.name          = data.name;
                        _self.types         = response.data.factories;
                        _self.types.forEach(function(element) {
                            if (element.name == data.type) {
                                _self.typeSelected  = element;
                            }
                        });
                    },
                    (response) => {
                        console.log("error ! :'(");
                    }
                );
            },
            update() {
                const _self = this;
                _self.$http.patch('api/category/' + _self.categoryId,
                    { 'name': _self.name, 'id': _self.categoryId, 'type': _self.typeSelected.name }).then(
                    (response) => {
                        _self.$emit('sas-snackbar', 'Menu modifié');
                        router.push({ name: 'admin_categories_index' });
                    },
                    (response) => {
                        console.log(response);
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
