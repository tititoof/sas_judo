<template>
    <div class="col-xs-12">
        <h1>
            &Eacute;dition de l'Utilisateur
            <small>
                <ui-button
                    type="secondary"
                    color="accent"
                    @click.prevent="update()">
                    Modifier
                </ui-button>
            </small>
        </h1>
        <ui-textbox
            label="Prénom"
            name="firstname"
            type="text"
            placeholder="Entrer votre prénom"
            v-model="firstname"
        ></ui-textbox>
        <ui-textbox
            label="Nom"
            name="lastname"
            type="text"
            placeholder="Entrer votre nom"
            v-model="lastname"
            >
        </ui-textbox>
        <ui-textbox
            label="Adresse e-mail"
            name="email"
            type="text"
            placeholder="Entrer votre adresse mail"
            v-model="email"
            >
        </ui-textbox>
        <ui-textbox
          label="Adresse"
          name="address"
          type="text"
          placeholoder="Entrer l'adresse"
          v-model="address"
        >
        </ui-textbox>
        <ui-textbox
          icon="phone"
          label="Téléphone"
          name="phone"
          type="tel"
          v-model="phone"
          >
        </ui-textbox>
        <ui-switch v-model="is_admin">Administrateur</ui-switch>
        <ui-switch v-model="is_teacher">Professeur</ui-switch>
    </div>
</template>
<script>
    import auth from '../../../auth';
    import vMenu from '../../v-menu.vue';
    import Keen from 'keen-ui';
    import {app} from './../../../app.js';
    import {router} from './../../../app.js';
    export default {
        data() {
            return {
              userId:     '',
              firstname:  '',
              lastname:   '',
              email:      '',
              address:    '',
              phone:      '',
              is_admin:   false,
              is_teacher: false
            };
        },
        methods: {
            update() {
              const _self = this;
              _self.$http
                  .patch('api/admin/user/' + _self.userId,
                    { 'firstname': _self.firstname, 'lastname': _self.lastname,
                      'is_admin': _self.is_admin, 'is_teacher': _self.is_teacher,
                      'email': _self.email, 'phone': _self.phone, 'address': _self.address })
                  .then(
                    (response) => {
                      _self.$emit('sas-snackbar', 'Utilisateur modifié');
                      router.push({ name: 'admin_users_index' });
                    },
                    (response) => {
                        _self.$emit('sas-snackbar', 'Une erreur est survenue');
                    }
                  );
            }
        },
        mounted() {
            this.$nextTick(function () {
                const _self = this;
                auth.check(_self);
                _self.userId = _self.$route.params.userId;
                _self.$http.get('api/admin/user/' + _self.userId + '/edit').then(function(response) {
                    let data = response.data.object;
                    _self.firstname   = data.firstname;
                    _self.lastname    = data.lastname;
                    _self.is_admin    = data.is_admin;
                    _self.is_teacher  = data.is_teacher;
                    _self.address     = data.address;
                    _self.phone       = data.phone;
                    _self.email       = data.email;
                }, function(response) {
                    console.log("error ! :'(");
                });
            });
        }
    }
</script>
