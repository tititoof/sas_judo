<style>
.sidenav-right {
    height: 100%;
    width: 250px;
    position: fixed;
    z-index: 1000;
    top: 0;
    right: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav-right a {
    padding: 8px 8px 8px 12px;
    text-decoration: none;
    font-size: 15px;
    color: #818181;
    display: block;
    width: 250px;
    /*transition: 0.3s;*/
}

.sidenav-right a:hover, .offcanvas a:focus{
    background: #006428;
    color: #f1f1f1;
}

.sidenav-right .closebtn {
    position: absolute;
    top: 5px;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

.sidenav-right ul li {
    float: left;
    min-height: 1px;
    line-height: 1em;
    /*line-height: 60px;*/
    vertical-align: middle;
    text-decoration: none;
    list-style-type: none;
    display: block;
}

.sidenav-right ul li img {
    float: left;
    margin: 0 0 10px 0;
    padding: 2px;
}

@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
}
</style>
<template>
    <div>
        <transition
            name="slideRight"
            >
            <nav class="sidenav-right"
                 v-show="visible">
                <button class="ui-icon-button closebtn ui-icon-button--type-primary ui-icon-button--color-green ui-icon-button--size-small"
                        @click.prevent="toggle">
                    <i class="ui-icon material-icons ui-icon-button-icon clear" aria-hidden="true">clear</i>
                </button>
                <ul class="">
                    <li v-for="item in menu" class="">
                        <img src="/api/visitor/menu/picture/logo_judo.png" height="30px"/>
                        <p>
                            <a @click.prevent="getPage(item.id)" href="#"> {{ item.text }}</a>
                        </p>
                    </li>
                </ul>
            </nav>
        </transition>
    </div>
</template>
<script>
    import {app}    from './../../app.js';
    import {router} from './../../app.js';
    export default {
        name: "sidebar-right",
        props: {
            menu: Array
        },
        data() {
            return {
                visible: false
            }
        },
        methods: {
            index() {
            },
            toggle() {
                const _self = this;
                _self.visible = !_self.visible;
            },
            getPage(link) {
                const _self = this;
                router.push({ name: link });
                _self.toggle();
            }
        },
        mounted() {
            this.$nextTick(function() {
               const _self = this;
               this.$root.$on('v-sidebar-right-toggle', this.toggle);
               _self.index();
            });
        }
    }
</script>
