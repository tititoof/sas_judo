<template>
    <div>
        <div class="alert alert-danger" v-if="contextError">
            <p>Il y a une erreur, impossible de se connecter avec ces informations.</p>
        </div>
        <form autocomplete="off" v-on:submit="signin">
            <div class="form-group">
                <label for="email">Adresse mail</label>
                <input type="email" id="email" class="form-control" v-model="email" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" class="form-control" v-model="password" required>
            </div>
            <button type="submit" class="btn btn-default">Se connecter</button>
        </form>
    </div>
</template>
<script>
    import { mapGetters }   from 'vuex';
    import { router }       from './../app.js';
    export default {
        data() {
            return {
                email: null,
                password: null
            }
        },
        computed: 
            mapGetters({ contextError: 'contextError' })
        ,
        methods: {
            signin(event) {
                event.preventDefault();
                this.$store.dispatch("signin", {
                    context: this, 
                    email: this.email, 
                    password: this.password,
                    router: router
                })
            }
        }
    }
</script>
