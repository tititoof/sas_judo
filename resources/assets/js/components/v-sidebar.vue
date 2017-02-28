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
        background: #99c9a2;
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
        vertical-align: middle;
        text-decoration: none;
        list-style-type: none;
        display: block;
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
                <button class="closebtn ui-icon-button ui-icon-button-flat color-success"
                        @click.prevent="toggle">
                    <i class="ui-icon material-icons ui-icon-button-icon clear" aria-hidden="true">clear</i>
                </button>
                <ul class="">
                    <li v-for="item in menu" class="">
                        <a @click.prevent="getPage(item.link)" href="#"> {{ item.text }}</a>
                    </li>
                </ul>
            </nav>
        </transition>
    </div>
</template>
<script>
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
            toggle: function() {
                const _self = this;
                _self.visible = !_self.visible;
            },
            getPage: function(link) {
                this.$emit('v-sidebar-click', link);
            }
        },
        mounted() {
            this.$root.$on('v-sidebar-toggle', this.toggle);
        }
    }
</script>