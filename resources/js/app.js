/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import { BootstrapVue, FormPlugin, OverlayPlugin, TablePlugin } from 'bootstrap-vue';
import VueRouter from 'vue-router';
import routes from './routes';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
import vSelect from 'vue-select';
import 'vue-select/dist/vue-select.css';

Vue.use(VueRouter);
Vue.use(BootstrapVue, FormPlugin, OverlayPlugin, TablePlugin);

Vue.component('v-select', vSelect);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import App from './layout/App.vue';

const app = new Vue({
    el: '#app',
    components: {
        App,
    },
    router: new VueRouter(routes)
});
