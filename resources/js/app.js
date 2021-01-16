/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

const { default: VueRouter } = require('vue-router');

require('./bootstrap');

window.Vue = require('vue');

// import Vuex from 'vuex'
import 'es6-promise/auto'
import { BootstrapVue, FormPlugin, OverlayPlugin, TablePlugin } from 'bootstrap-vue';
import router from './router';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
import vSelect from 'vue-select';
import 'vue-select/dist/vue-select.css';

// Vue.use(Vuex);
Vue.use(BootstrapVue, FormPlugin, OverlayPlugin, TablePlugin);

Vue.component('v-select', vSelect);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import App from './layout/App.vue';

const app = new Vue({
    el: '#app',
    components: {
        App
    },
    router
});
