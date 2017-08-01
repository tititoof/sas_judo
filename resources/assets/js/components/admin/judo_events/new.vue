<template>
    <div class="col-xs-12">
        <h1>
            <small>
                <ui-icon-button 
                    icon="arrow_left" size="small" color="green"
                    @click.prevent="back()">
                </ui-icon-button>
            </small>
            Nouvel &eacute;v&egrave;nement
            <small>
                <ui-button
                    type="secondary" color="accent" size="large"
                    @click.prevent="store()">
                    Cr&eacute;er
                </ui-button>
            </small>
        </h1>
        <ui-select
            name="types" label="Type"
            :options="types"
            v-model="typeSelected"
            placeholder="Choisir le type" show-search z-index="1"
        ></ui-select>
        <ui-textbox
            label="Nom" name="name" type="text" placeholder="Entrer le nom de l'évènement"
            v-model="name"
        ></ui-textbox>
        <ui-textbox
                label="Description" name="description" type="text" placeholder="Description"
                v-model="description"
        ></ui-textbox>
        <ui-datepicker
            icon="events"
            picker-type="modal"
            placeholder="Sélectionner une date"
            v-model="startAt"
        >Date de d&eacute;but</ui-datepicker>
        Heure de d&eacute;but <vue-timepicker
                    :minute-interval="5" v-model="startTimeAt"></vue-timepicker>
        <ui-datepicker
            icon="events"
            picker-type="modal"
            placeholder="Sélectionner une date"
            v-model="endAt"
        >Date de fin</ui-datepicker>
        Heure de fin <vue-timepicker
            :minute-interval="5"
            v-model="endTimeAt"
        ></vue-timepicker>
    </div>
</template>
<script>
    import auth from '../../../auth';
    import Keen from 'keen-ui';
    import {app} from './../../../app.js';
    import {router} from './../../../app.js';
    import VueTimepicker from 'vue2-timepicker'
    import common from './common.js'
    export default {
        data() {
            return {
                auth:           auth
            }
        },
        mixins: [common],
        components: {
            VueTimepicker
        },
        methods: {
            store() {
                const _self = this;
                _self.$http.post('api/judoevent', {
                        'name': _self.name, 'description': _self.description, 'start_at': _self.startAt, 'end_at': _self.endAt,
                        'end_time_at': _self.endTimeAt, 'start_time_at': _self.startTimeAt, 'type': _self.typeSelected.value
                }).then(
                    (response) => {
                        _self.$emit('sas-snackbar', 'évènement ajouté');
                        router.push({ name: 'admin_judo_event_index' });
                }).catch(
                    error   => {
                        _self.$emit('sas-errors', auth.showError(error.response, _self.formErrors));
                    }
                );
            },
            index() {
                const _self = this;
                if (_self.$route.params.startAt) {
                    _self.startAt   = _self.$route.params.startAt;
                    _self.endAt     = _self.$route.params.startAt;
                }
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
<style>

</style>
