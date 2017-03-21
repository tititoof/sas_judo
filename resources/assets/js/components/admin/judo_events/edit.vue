<template>
    <div class="col-xs-12">
        <h1>
            Editer &eacute;v&egrave;nement
            <small>
                <ui-button
                        type="secondary" color="accent" size="large"
                        @click.prevent="update()">
                    Modifier
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
                label="Nom" name="name" type="text" placeholder="Entrer le nom du menu"
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
    import VueTimepicker from 'vue2-timepicker';
    import moment from 'moment';
    export default {
        data() {
            return {
                auth:           auth,
                id:             null,
                types:          [{
                    'label': 'compétition',
                    'value': 'tournament'
                }, {
                    'label': "évènement",
                    'value': 'event'
                }, {
                    'label': 'stage',
                    'value': 'stage'
                }],
                typeSelected:   {},
                name:           '',
                description:    '',
                startAt:        null,
                startTimeAt:    {
                    HH: "08",
                    mm: "30"
                },
                endAt:          null,
                endTimeAt:      {
                    HH: "12",
                    mm: "00"
                }
            }
        },
        components: {
            VueTimepicker
        },
        methods: {
            update() {
                const _self = this;
                _self.$http.patch('api/judoevent/' + _self.id, {
                    'name': _self.name, 'description': _self.description, 'start_at': _self.startAt, 'end_at': _self.endAt,
                    'end_time_at': _self.endTimeAt, 'start_time_at': _self.startTimeAt, 'type': _self.typeSelected.value
                }).then(function(response) {
                    _self.$emit('sas-snackbar', 'évènement modifié');
                    router.push({ name: 'admin_judo_event_index' });
                }, function(response) {
                    console.log(response);
                });
            },
            index() {
                const _self = this;
                _self.id    = _self.$route.params.id;
                _self.$http.get('api/judoevent/' + _self.id).then(
                    (response) => {
                        let data    = response.data.entity,
                            startAt = new moment(data.start_at),
                            endAt   = new moment(data.end_at);
                        _self.getType(data.type);
                        _self.name            = data.name;
                        _self.description     = data.description;
                        _self.startAt         = new Date(startAt.format('YYYY-MM-DD'));
                        _self.endAt           = new Date(endAt.format('YYYY-MM-DD'));
                        _self.startTimeAt.HH  = startAt.format('HH');
                        _self.startTimeAt.mm  = startAt.format('mm');
                        _self.endTimeAt.HH    = endAt.format('HH');
                        _self.endTimeAt.mm    = endAt.format('mm');
                    },
                    (response) => {
                        console.log(response);
                    }
                );
            },
            getType(type) {
                const _self = this;
                _self.types.forEach(function (element) {
                    if (element.value == type) {
                        _self.typeSelected = element;
                    }
                });
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
