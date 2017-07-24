<template>
    <div class="col-xs-12">
        <h1>
            Nouvelle catégorie d'âge
            <small>
                <ui-button
                    type="secondary" color="accent" size="large"
                    @click.prevent="store()">
                    Cr&eacute;er
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
import common from './common.js';

export default {
    mixins: [common],
    methods: {
        index() {
        
        },
        store() {
            const _self = this;
            _self.$http.post(
                'api/age_category', 
                { name: _self.name, years: _self.years }
            ).then(
                response => {
                    _self.$emit('sas-snackbar', 'Catégorie d\'âge ajoutée');
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
            _self.index();
        });
    }
}
</script>
