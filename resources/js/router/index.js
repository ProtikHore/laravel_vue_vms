import Vue from "vue";
import VueRouter from "vue-router";
import Login from '../components/login/LoginComponent';

import Dashboard from '../components/dashboard/DashboardComponent';

import Visitor from "../components/visitor/VisitorComponent";
import VisitorEdit from "../components/visitor/VisitorEditComponent";
import VisitorAdd from "../components/visitor/VisitorAddComponent";

import VisitorCard from "../components/visitorCard/VisitorCardComponent";

Vue.use(VueRouter);

const routes = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'login',
            component: Login,
        },
        {
            path: '/dashboard',
            name: 'dashboard',
            component: Dashboard,
        },
        {
            path: '/visitor',
            name: 'visitor',
            component: Visitor,
        },
        {
            path: 'visitor/add',
            name: 'visitor_add',
            component: VisitorAdd
        },
        {
            path: '/visitor/edit/:id',
            name: 'visitor_edit',
            component: VisitorEdit,
        },
        {
            path: '/visitor/card',
            name: 'visitorCard',
            component: VisitorCard,
        }
    ]
});

export default routes;
