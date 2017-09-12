<template>
    <div>
        <h1>
            <small>
                <ui-icon-button
                    icon="arrow_left" size="small" color="green"
                    @click.prevent="back()">
                </ui-icon-button>
            </small>
            Nouvelle saison
            <small>
                <ui-button
                    class="pull-right"
                    type="primary" color="primary" size="large"
                    @click.prevent="store()"
                    >
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
    import Keen from 'keen-ui';
    import {app} from './../../../app.js';
    import {router} from './../../../app.js';
    import languageFr from '../../data/date-picker-lang.fr.js';
    import common from './common.js'
    import back     from './../back.js'
    export default {
        data() {
            return {
            }
        },
        mixins: [common, back],
        methods: {
            store() {
                const _self = this;
                _self.$http.post('api/season',
                    {'name': _self.name, 'start_at': _self.startAt, 'end_at': _self.endAt})
                .then(
                    () =>  {
                        _self.$emit('sas-snackbar', 'Saison ajoutée');
                        router.push({ name: 'admin_seasons_index' });
                }).catch(
                    error   => {
                        _self.$store.dispatch("showError", {
                            response:       error.response,
                            formElements:   _self.formErrors,
                            vue:            _self
                        })
                    }
                );
            }
        },
        mounted() {
            this.$nextTick(function () {
                const _self = this;
                _self.$store.dispatch("check",
                    { app: _self, router: router }
                )
            });
        }
    }
</script>
<style>

</style>
