<template>
    <div class="col-xs-12">
        <h1>
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
                label="Prénom" name="firstname" type="text" placeholder="Entrer votre prénom"
                v-model="firstname"
        ></ui-textbox>
        <ui-textbox
                label="Nom" name="lastname" type="text" placeholder="Entrer votre nom"
                v-model="lastname"
        ></ui-textbox>

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

        },
        methods: {
            update() {

            }
        }
    }
</script>