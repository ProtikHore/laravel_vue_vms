import Vue from "vue";
import routes from './router/index';

require('./bootstrap');

 Vue.component('dashboard-component', require('./components/dashboard/DashboardComponent.vue').default);

const app = new Vue({
    el: '#app',
    router: routes,
});
