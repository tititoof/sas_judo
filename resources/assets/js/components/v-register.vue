<template>
    <div>
        <div class=" alert alert-danger" v-if="error && !success">
            <p>There was an error, unable to complete registration</p>
        </div>
        <div class="alert alert-success" v-if="success">
            <p>Registration complete</p>
        </div>
        <form autocomplete="off" v-on:submit="register" v-if="!success">
            <div class="form-group" v-bind:class=" { 'has-error': error && response.name }">
                <label for="name">Nom</label>
                <input type="text" id="name" class="form-control" v-model="name" required>
                <span class="help-block" v-if="error && response.name"> {{ response.name }}</span>
            </div>
            <div class="form-group" v-bind:class=" { 'has-error': error && response.email }">
                <label for="email">Adresse mail</label>
                <input type="email" id="email" class="form-control" v-model="email" required>
                <span class="help-block" v-if="error && response.email"> {{ response.email }}</span>
            </div>
            <div class="form-group" v-bind:class=" { 'has-error': error && response.password }">
                <label for="password">Mot de passe</label>
                <input type="password" name="paswword" id="password" class="form-control" v-model="password" required>
                <span class="help-block" v-if="error && response.password">{{ response.password }}</span>
            </div>
            <div class="form-group" v-bind:class=" { 'has-error': error && response.password-confirm }">
                <label for="passwordconfirm">Confirmer le mot de passe</label>
                <input type="password" name="passwordconfirm" id="passwordconfirm" class="form-control" v-model="password_confirm" required>
                <span class="help-block" v-if="error && response.password-confirm">{{ response.password-confirm }}</span>
            </div>
            <button type="submit" class="btn btn-default">S'enregistrer</button>
        </form>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                name: null,
                email: null,
                password: null,
                password_confirm: null,
                success: false,
                error: false,
                response: null
            }
        },
        methods: {
            register(event) {
                const _self = this;
                event.preventDefault();
                _self.$store.dispatch("register", 
                    { context: _self, name: _self.name, email: _self.email, password: _self.password, password_confirm: _self.password_confirm }
                )
            }
        }
    }
</script>
