<template>
    <div>
        Admin Dashboard
    </div>
</template>
<script>
    import menu from '../v-menu.vue';
    import Keen from 'keen-ui';
    export default {
        data() {
            return {}
        },
        methods: {
            signout() {
                this.$store.dispatch("signout", router)
            }
        },
        components: {
            menu
        },
        ready() {
            _self.$store.dispatch("check",
                { app: _self, router: router }
            )
        }
    }
</script>
