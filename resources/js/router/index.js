import Vue from "vue";
import VueRouter from "vue-router";
import Login from '../components/login/LoginComponent';

Vue.use(VueRouter);

const routes = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'login',
            component: Login,
        }
    ]
});

export default routes;
