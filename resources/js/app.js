/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */



require('./bootstrap');
import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import router from './routes'
import VueToastr from '@deveodk/vue-toastr'
import '@deveodk/vue-toastr/dist/@deveodk/vue-toastr.css'

Vue.use(VueToastr, {
    defaultPosition: "toast-bottom-left",
    defaultType: "info",
    defaultTimeout: 1000
  });

Vue.config.productionTip = false
Vue.use(BootstrapVue)
window.Vue = require('vue');


Vue.component('app-component', require('./components/AppComponent.vue').default);
Vue.component('video-component', require('./components/VideoComponent.vue').default);
Vue.component('loading-component', require('vue-infinite-loading').default);
Vue.component('sidebar-component', require('./components/SidebarComponent.vue').default);
Vue.component('jumbotron-component', require('./components/JumbotronComponent.vue').default);
Vue.component('new-component', require('./components/NewComponent.vue').default);


const app = new Vue({
    el: '#app',
    router
});
