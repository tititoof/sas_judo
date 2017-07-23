<template>
    <div class="col-xs-12">
        <h1>
            Editer catégorie d'âge
            <small>
                <ui-button
                    type="secondary" color="accent" size="large"
                    @click.prevent="update()">
                    Modifier
                </ui-button>
            </small>
        </h1>
        <ui-textbox
            label="Nom"
            name="name"
            type="text" placeholder="Entrer le nom de la catégorie"
            v-model="name"
            >
        </ui-textbox>
        <ui-textbox
            label="Nb d'année" name="years" type="text"
            placeholder="Entrer le nombre d'année"
            v-model="years"
            >
        </ui-textbox>
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
            name:   '',
            years:  '',
            id:     '',
            formErrors: [
                { 'name': 'name', 'human': 'Nom'}, 
                { 'name': 'years', 'human': "Nombre d'années"}
            ]
        }
    },
    methods: {
        index() {
            const _self = this;
            _self.$http.get('api/age_category/' + _self.id + '/edit').then(
                response => {
                    _self.name  = response.data.ageCategory.name;
                    _self.years = response.data.ageCategory.years;
                },
                response => {
                    auth.showError(response, ['name', 'years', 'id']);
                }
            );
        },
    update() {
        const _self = this;
        _self.$http.patch(
            'api/age_category/' + _self.id, 
            { name: _self.name, years: _self.years }
        ).then(
            response => {
                _self.$emit('sas-snackbar', 'Catégorie d\'âge modifiée');
                router.push({ name: 'admin_age_categories_index' });
            }
        ).catch(
            error   => {
                _self.$emit('sas-errors', auth.showError(error.response, _self.formErrors));
            }
        )
    }
  },
  mounted() {
    this.$nextTick(function () {
      const _self = this;
      auth.check(_self);
      _self.id = _self.$route.params.id;
      _self.index();
    });
  }
}
</script>
