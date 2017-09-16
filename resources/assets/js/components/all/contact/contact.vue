<template>
    <div class="row">
        <h1>
            Nous contacter
        </h1>
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
                :draggable="true"
                @click="center=m.position"
                >
            </gmap-marker>
        </gmap-map>
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
            ]
        }
    },
    methods: {
        index() {
            
        }
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
