/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import { BootstrapVue, FormPlugin} from 'bootstrap-vue';
import {VuejsDatatableFactory} from 'vuejs-datatable';
import VueRouter from 'vue-router';
import routes from './routes';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';

Vue.use(VueRouter);
Vue.use(BootstrapVue);
Vue.use(FormPlugin);
Vue.use(Loading);
Vue.use(VuejsDatatableFactory);

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
