<template>
    <div class="row">
        <h1>
            Inscription
            <small>
                <ui-button
                    type="secondary" color="accent" size="large"
                    @click.prevent="save()">
                    Enregister
                </ui-button>
            </small>
        </h1>
        <div class="col-xs-12">
            <div class="col-xs-6">
                <ui-select
                    name="season" label="Saison"
                    :options="seasons"
                    v-model="seasonSelected"
                    placeholder="Choisir la saison" show-search z-index="1"
                    >
                </ui-select>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="col-xs-6">
                <ui-textbox
                    label="Nom" name="name" type="text" placeholder="Entrer le nom"
                    v-model="lastname"
                    >
                </ui-textbox>
            </div>
            <div class="col-xs-5">
                <ui-textbox
                    label="Prénom" name="name" type="text" placeholder="Entrer le prénom"
                    v-model="firstname"
                    >
                </ui-textbox>
            </div>
            <div class="col-xs-1">
                <ui-fab
                    color="primary"
                    icon="search"
                    size="small"
                    @click="load">
                </ui-fab>
            </div>
        </div>
        <div class="col-xs-12">
            <ui-tabs fullwidth>
                <ui-tab title="Adhérent">
                    <div class="row">
                        <div class="col-xs-6">
                            <ui-datepicker
                                icon="events"
                                picker-type="modal"
                                placeholder="Sélectionner une date"
                                :lang="pickerLang"
                                v-model="birthday"
                                >
                                Date de naissance
                            </ui-datepicker>
                        </div>
                        <div class="col-xs-6">
                            Sexe
                            <div class="ui-radio-group__radios">
                                <ui-radio v-model="sexe" true-value="Masculin">Masculin</ui-radio>
                                &nbsp;&nbsp;
                                <ui-radio v-model="sexe" true-value="Féminin">Féminin</ui-radio>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <ui-textbox
                                label="Adresse" name="address" type="text" placeholder="Entrer l'adresse"
                                v-model="address"
                                >
                            </ui-textbox>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <ui-textbox
                                label="Code postal" name="postal_code" type="text" placeholder="Entrer le code postal"
                                v-model="postalCode"
                                >
                            </ui-textbox>
                        </div>
                        <div class="col-xs-6">
                            <ui-textbox
                                label="Ville" name="city" type="text" placeholder="Entrer la ville"
                                v-model="city"
                                >
                            </ui-textbox>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <ui-textbox
                                label="Téléphone" name="phone" type="text" placeholder="Entrer le numéro de téléphone"
                                v-model="phone"
                                >
                            </ui-textbox>
                        </div>
                        <div class="col-xs-6">
                            Liste rouge ?
                            <div class="ui-radio-group__radios">
                                <ui-radio v-model="redList" true-value="1">Oui</ui-radio>
                                &nbsp;&nbsp;
                                <ui-radio v-model="redList" true-value="0">Non</ui-radio>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <ui-textbox
                                label="Mobile" name="mobile" type="text" placeholder="Entrer le numéro de mobile"
                                v-model="mobile"
                                >
                            </ui-textbox>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <ui-textbox
                                label="E-mail" name="email" type="text" placeholder="Entrer l'adresse e-mail"
                                v-model="email"
                                >
                            </ui-textbox>
                        </div>
                    </div>
                </ui-tab>
                <ui-tab title="Informations d'inscription">
                    Enfant mineur autorisé à repartir seul
                    <div class="ui-radio-group__radios">
                        <ui-radio v-model="minorGoAlone" true-value="1">Oui</ui-radio>
                        &nbsp;&nbsp;
                        <ui-radio v-model="minorGoAlone" true-value="0">Non</ui-radio>
                    </div>
                    <ui-textbox
                        label="Nom de la tierce personne venant chercher l’enfant si différente des parents :"
                        name="major"
                        type="text"
                        placeholder="Entrer le nom du majeur venant chercher le mineur"
                        v-model="majorTakeOff"
                        >
                    </ui-textbox>
                    L'adhérent accepte l’assurance complémentaire
                    « Individuelle Accident Complémentaire »
                    qui couvre notamment les pertes de revenu
                    <div class="ui-radio-group__radios">
                        <ui-radio v-model="complementaryInsurance" true-value="1">Oui</ui-radio>
                        &nbsp;&nbsp;
                        <ui-radio v-model="complementaryInsurance" true-value="0">Non</ui-radio>
                    </div>
                </ui-tab>
            </ui-tabs>
        </div>
    </div>
</template>
<script>
import vMenu        from '../../v-menu.vue';
// import Keen         from 'keen-ui';
import { UiRadioGroup, UiTabs, UiTab } from 'keen-ui';
import {app}        from './../../../app.js';
import {router}     from './../../../app.js';
import languageFr   from '../../data/date-picker-lang.fr.js';
import moment       from 'moment';
export default {
    data() {
        return {
            id:             null,
            pickerLang:     languageFr,
            seasons:        [],
            seasonSelected: '',
            lastname:       '',
            firstname:      '',
            birthday:       null,
            group1:         '',
            email:          '',
            mobile:         '',
            redList:        '',
            phone:          '',
            city:           '',
            postalCode:     '',
            address:        '',
            sexe:           '',
            complementaryInsurance: '',
            minorGoAlone:   '',
            majorTakeOff:   '',
            formErrors:     [
                { 'name': 'address',        'human': 'Adresse'},
                { 'name': 'birthday',       'human': "Date de naissance" },
                { 'name': 'city',           'human': "Ville" },
                { 'name': 'email',          'human': "Email" },
                { 'name': 'firstname',      'human': "Prénom" },
                { 'name': 'lastname',       'human': "Nom" },
                { 'name': 'mobile',         'human': "Mobile" },
                { 'name': 'phone',          'human': "Téléphone" },
                { 'name': 'postal_code',    'human': "Code postal" },
                { 'name': 'red_list',       'human': "Liste rouge" },
                { 'name': 'sexe',           'human': "Sexe" }
            ]
        }
    },
    components: {
        UiRadioGroup,
        UiTab,
        UiTabs
    },
    methods: {
        index() {
            const _self = this;
            _self.getSeasons();
            if (_self.id !== null) {
                _self.getInformations();
            }
        },
        save() {
            const _self = this,
                data    = _self.getDataForm();
            _self.$http.post(
                'api/inscriptions/save',
                data
            ).then(
                () => {
                    _self.$emit('sas-snackbar', 'Inscription enregistrée');
                }
            ).catch(
                error   => {
                    _self.$store.dispatch("showError", {
                        response:       error.response,
                        formElements:   _self.formErrors,
                        vue:            _self
                    })
                }
            );
        },
        checkBaseInformations() {
            const _self = this;
            if (null == _self.seasonSelected) { return false; }
            if ('' == _self.lastname) { return false; }
            if ('' == _self.firstname) { return false; }
            return true;
        },
        load() {
            const _self = this,
                  data  = { 'lastname': _self.lastname, 'firstname': _self.firstname, 'season_id': _self.seasonSelected.value };
            if (_self.checkBaseInformations()) {
                _self.$http.post(
                    'api/inscriptions/load', data
                ).then(
                    response => {
                        const member    = response.data.member,
                            inscription = response.data.inscription;
                        _self.setDataForm(member, inscription);
                    }
                ).catch(
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
        getDataForm() {
            const _self = this,
                  data  = {};
            data.lastname       = _self.lastname;
            data.firstname      = _self.firstname;
            data.season_id      = _self.seasonSelected.value;
            data.birthday       = _self.birthday;
            data.email          = _self.email;
            data.mobile         = _self.mobile;
            data.red_list       = _self.redList;
            data.phone          = _self.phone;
            data.city           = _self.city;
            data.postal_code    = _self.postalCode;
            data.address        = _self.address;
            data.sexe           = _self.sexe;
            data.complementary_insurance = _self.complementaryInsurance;
            data.minor_go_alone = _self.minorGoAlone;
            data.major_take_off = _self.majorTakeOff;
            return data;
        },
        setDataForm(member, inscription) {
            const _self = this,
                listMember = [
                    { 'index': 'lastname', 'value': 'lastname' }, { 'index': 'firstname', 'value': 'firstname' },
                    { 'index': 'email', 'value': 'email' }, { 'index': 'mobile', 'value': 'mobile' },
                    { 'index': 'red_list', 'value': 'redList' }, { 'index': 'phone', 'value': 'phone' },
                    { 'index': 'city', 'value': 'city' }, { 'index': 'sexe', 'value': 'sexe' },
                    { 'index': 'postal_code', 'value': 'postalCode' }, {'index': 'address', 'value': 'address' }
                ],
                listInscription = [
                    { 'index': 'complementary_insurance', 'value': 'complementaryInsurance' },
                    { 'index': 'minor_go_alone', 'value': 'minorGoAlone' },
                    { 'index': 'major_take_off', 'value': 'majorTakeOff' }
                ];
            if (member.hasOwnProperty('birthday')) {
                _self.birthday = new Date(new moment(member.birthday).format('YYYY-MM-DD'));
            }
            listMember.forEach(function(element) {
                if (member.hasOwnProperty(element.index)) {
                    _self[element.value] = member[element.index];
                }
            });
            listInscription.forEach(function(element) {
                if (inscription.hasOwnProperty(element.index)) {
                    _self[element.value] = inscription[element.index];
                }
            });
        },
        getSeasons() {
            const _self = this;
            _self.$http.get('api/seasons/list').then(
                response => {
                    _self.seasons = response.data.data;
                }
            ).catch(
                error   => {
                    _self.$store.dispatch("showError", {
                        response:       error.response,
                        formElements:   _self.formErrors,
                        vue:            _self
                    })
                }
            );
        },
        getInformations() {
            const _self = this;
            _self.$http.get('api/member').then(
                () => {

                }
            ).catch(
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
            _self.id = _self.$route.params.id;
            _self.index();
        });
    }
}
</script>
