<template>
    <div>
        Admin Dashboard
        {{ auth.user.profile.name }}
    </div>
</template>
<script>
    import auth from '../../auth';
    import menu from '../v-menu.vue';
    import Keen from 'keen-ui';
    export default {
        data() {
            return {
                auth: auth
            }
        },
        methods: {
            signout() {
                auth.signout()
            }
        },
        components: {
            menu
        },
        ready() {
            auth.check()
        }
    }
</script>