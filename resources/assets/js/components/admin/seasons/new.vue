<template>
    <div class="col-xs-12">
        <h1>
            Nouvelle saison
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
        <ui-datepicker
          icon="events"
          picker-type="modal"
          placeholder="Sélectionner une date"
          :lang="pickerLang"
          v-model="startAt"
        >Date de d&eacute;but</ui-datepicker>
        <ui-datepicker
          icon="events"
          picker-type="modal"
          placeholder="Sélectionner une date"
          :lang="pickerLang"
          v-model="endAt"
        >Date de fin</ui-datepicker>
    </div>
</template>
<script>
    import auth from '../../../auth';
    import Keen from 'keen-ui';
    import {app} from './../../../app.js';
    import {router} from './../../../app.js';
    import languageFr from '../../data/date-picker-lang.fr.js';
    export default {
        data() {
            return {
                auth:       auth,
                name:       '',
                startAt:    null,
                endAt:      null,
                pickerLang: languageFr
            }
        },
        methods: {
            store() {
                const _self = this;
                _self.$http.post('api/season',
                    {'name': _self.name, 'start_at': _self.startAt, 'end_at': _self.endAt}).then(function(response) {
                    _self.$emit('sas-snackbar', 'Saison ajoutée');
                    router.push({ name: 'admin_seasons_index' });
                }, function(response) {
                    _self.$emit('sas-snackbar', 'Une erreur est survenue');
                });
            }
        },
        mounted() {
            this.$nextTick(function () {
                const _self = this;
                auth.check(_self);
            });
        }
    }
</script>
<style>

</style>
