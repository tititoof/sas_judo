<style>
    .sidenav {
        height: 100%;
        width: 250px;
        position: fixed;
        z-index: 1000;
        top: 0;
        left: 0;
        /*background-color: #f4f4f4;*/
        background-color: #FFFFFF;
        overflow-x: hidden;
        padding-top: 60px;
        text-decoration: none;
    }

    .sidenav a {
        padding: 8px 8px 8px 12px;
        text-decoration: none;
        font-size: 15px;
        color: #000000;
        display: block;
        width: 250px;
        /*transition: 0.3s*/
    }

    .sidenav li a:hover, .offcanvas a:focus{
        color: #FFFFFF;
        /*font-family: 'Lato', sans-serif;*/
        background: #006428;
        font-size: 15px;
        width: 250px;
        font-weight: bold;
    }

    .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
        text-decoration: none;
    }
    .sidenav > ul > li > a {
        padding: 10px 20px;
    }
    .sidenav ul {
        text-decoration: none;
        padding-left: 0;
    }
    .sidenav ul li {
        float: left;
        min-height: 1px;
        line-height: 1em;
        /*line-height: 60px;*/
        vertical-align: middle;
        text-decoration: none;
        list-style-type: none;
        display: block;
    }

    .sidenav ul li img {
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
            name="slideLeft"
            >
            <nav class="sidenav"
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
    import {app}    from './../app.js';
    import {router} from './../app.js';
    export default {
        name: "sidebar",
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
                const _self = this;
                _self.$http.get('api/visitor/menu').then(
                    (response) => {
                        let data = response.data.entities;
                        data.forEach(function(element) {
                            _self.menu.push({ id: element.id, text: element.name });
                        });
                        _self.menu.push({ id: 'calendriers', text: 'Calendrier' });
                        _self.menu.push({ id: 'plannings_des_cours', text: 'Planning des cours' });
                    },
                    (response) => {
                        _self.$emit('sas-snackbar', 'Une erreur est survenue');
                    }
                );
            },
            toggle() {
                const _self = this;
                _self.visible = !_self.visible;
            },
            getPage(link) {
                const _self = this;
                router.push({ name: 'visitor_news', params: {'menu': link} });
                _self.toggle();
            }
        },
        mounted() {
            this.$nextTick(function() {
               const _self = this;
               this.$root.$on('v-sidebar-toggle', this.toggle);
               _self.index();
            });
        }
    }
</script>
