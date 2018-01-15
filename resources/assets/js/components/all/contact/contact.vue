<template>
    <div class="row">
        <div class="col-sm-12">
            <h1>
                Nous contacter
            </h1>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-4">
                <ui-textbox
                    floating-label
                    label="Nom"
                    placeholder="Entrez votre nom"
                    v-model="contactName"
                    >
                </ui-textbox>
            </div>
            <div class="col-sm-4">
                <ui-textbox
                    floating-label
                    label="Adresse email"
                    placeholder="Email"
                    v-model="contactEmail"
                    >
                </ui-textbox>
            </div>
            <div class="col-sm-4">
                <ui-textbox
                    floating-label
                    label="Sujet"
                    placeholder="Sujet"
                    v-model="contactSubject"
                    >
                </ui-textbox>
            </div>
        </div>
        <div class="col-sm-12">
            <ui-textbox
                enforce-maxlength
                floating-label
                help="Maximum 256 charactères"
                label="Message"
                placeholder="écrivez votre message"
    
                :multi-line="true"
                :maxlength="256"
    
                v-model="contactText"
                >
            </ui-textbox>
        </div>
        <div class="col-sm-12 pull-right">
            <ui-button color="green" icon="email" :icon-position="iconPosition" :size="size" class="pull-right" @click.prevent="sendMail">Envoyer</ui-button>
        </div>
        <div class="col-sm-12">
            <br/>
        </div>
        <div class="col-sm-12">
            <h1>
                Nous localiser
            </h1>
        </div>
        <div class="col-sm-12">
            <address>
                Rue de Verdun<br>
                Saint-Avertin, 37550<br>
            </address>
        </div>
        <div class="col-sm-12">
            <gmap-map
                :center="center"
                :zoom="18"
                style="width: 80vw; height: 50vh"
                >
                <gmap-marker
                    :key="index"
                    v-for="(m, index) in markers"
                    :position="m.position"
                    :clickable="true"
                    :draggable="false"
                    @click="center=m.position"
                    >
                </gmap-marker>
            </gmap-map>
        </div>
    </div>
</template>
<script>
import vMenu    from '../../v-menu.vue';
import Keen     from 'keen-ui';
import {app}    from './../../../app.js';
import {router} from './../../../app.js';
export default {
    data() {
        return {
            center: {
                lat: 47.365569,
                lng: 0.736566
            },
            markers: [
                {
                    position: {
                        lat: 47.365569,
                        lng: 0.736566
                    }
                }
            ],
            contactName:    '',
            contactEmail:   '',
            contactSubject: '',
            contactText:    '',
            formErrors:     [
                { 'name': 'contactName', 'human': 'Votre nom' }, 
                { 'name': 'contactEmail', 'human': "Adresse email" },
                { 'name': 'contactSubject', 'human': "Sujet" },
                { 'name': 'contactText', 'human': "Texte" }
            ]
        }
    },
    methods: {
        index() {
            
        },
        sendMail() {
            const _self = this
            let informations = _self.checkInformations()
            if (Object.keys(informations.data).length !== 0) {
                _self.$store.dispatch("showContactError", {
                    response:       informations,
                    formElements:   _self.formErrors,
                    vue:            _self
                })
            } else {
                _self.$http.post(
                    'api/visitor/contact',
                    { 'name': _self.contactName, 'email': _self.contactEmail, 'subject': _self.contactSubject, 'text': _self.contactText }
                ).then(
                    response => {
                        console.log(response);
                    }
                ).catch(
                    error   => {
                        _self.$store.dispatch("showError", {
                            response:       error.response,
                            formElements:   _self.formErrors,
                            vue:            _self
                        })
                    }
                )
            }
        },
        checkInformations() {
            const   _self       = this
            let     errors      = {},
                    dataError   = {}
            
            if (_self.contactName === '') {
                errors.contactName = []
                errors.contactName.push('validation.required')
            }
            if (_self.contactEmail === '') {
                errors.contactEmail = []
                errors.contactEmail.push('validation.required')
            }
            if (_self.contactSubject === '') {
                errors.contactSubject = []
                errors.contactSubject.push('validation.required')
            }
            if (_self.contactText === '') {
                errors.contactText = []
                errors.contactText.push('validation.required')
            }
            if ( !(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(_self.contactEmail)) ) {  
                errors.contactEmail = []
                errors.contactEmail.push('validation.email')
            }  
            dataError.data = errors
            return dataError;
        },
    },
    mounted() {
        this.$nextTick(function() {
           const _self = this;
           _self.index();
        });
    },
    watch: {
        '$route.params.menu'(newId, oldId) {
            this.index()
        }
    }
}
</script>
