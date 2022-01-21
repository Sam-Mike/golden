/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import store from './store';
import 'es6-promise/auto'
import { BootstrapVue, FormPlugin, OverlayPlugin, TablePlugin, BootstrapVueIcons   } from 'bootstrap-vue';
import router from './router';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
import vSelect from 'vue-select';
import 'vue-select/dist/vue-select.css';

Vue.use(BootstrapVue, FormPlugin, OverlayPlugin, TablePlugin, BootstrapVueIcons  );

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

async function myApp() {
    try {
        await store.dispatch("auth/getUserInfo");
        const app = new  Vue({
            store,
            el: '#app',
            components: {
                App
            },
            router
        });
        /*can call dispatch
        load all cross component data
        to vuex getters
         */
    } catch (error) {
        console.log(error);
    }

}

myApp();