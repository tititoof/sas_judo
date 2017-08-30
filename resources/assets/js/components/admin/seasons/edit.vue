<template>
    <div>
        <h1>
            <small>
                <ui-icon-button
                    icon="arrow_left" size="small" color="green"
                    @click.prevent="back()">
                </ui-icon-button>
            </small>
            &Eacute;dition saison
            <small>
                <ui-button
                        type="secondary" color="accent"
                        @click.prevent="update()">
                    Modifier
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
    import vMenu from '../../v-menu.vue';
    import Keen from 'keen-ui';
    import {app} from './../../../app.js';
    import {router} from './../../../app.js';
    import languageFr from '../../data/date-picker-lang.fr.js';
    import common from './common.js'
    import back     from './../back.js'
    export default {
        data() {
            return {
                seasonId:   null
            }
        },
        mixins: [common, back],
        methods: {
            update() {
                const _self = this;
                _self.$http
                    .patch('api/season/' + _self.seasonId,
                        {'name': _self.name, 'start_at': _self.startAt, 'end_at': _self.endAt}).then(
                    () => {
                        _self.$emit('sas-snackbar', 'Saison modifiée');
                        router.push({ name: 'admin_seasons_index' });
                    }
                ).catch(
                    error   => {
                        _self.$emit('sas-errors', _self.$store.getters.showError(error.response, _self.formErrors));
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
                _self.$store.dispatch("check",
                    { app: _self, router: router }
                )
                _self.seasonId = _self.$route.params.seasonId;
                _self.$http.get('api/season/' + _self.seasonId + '/edit').then(function(response) {
                    const data = response.data.object;
                    _self.name      = data.name;
                    _self.startAt   = new Date(data.start_at);
                    _self.endAt     = new Date(data.end_at);
                }).catch(
                    error   => {
                        _self.$emit('sas-errors', _self.$store.getters.showError(error.response, _self.formErrors));
                    }
                );
            });
        }
    }
</script>
