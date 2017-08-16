import {router} from './../../app.js';
export default {
    methods: {
        back() {
            router.go(-1)
        }
    },
}