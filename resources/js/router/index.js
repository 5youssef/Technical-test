import {createWebHistory, createRouter} from "vue-router";

import Home from '../pages/Home';
import About from '../pages/About';
import Register from '../pages/Register';
import Login from '../pages/Login';
import Dashboard from '../pages/Dashboard';

import Projects from '../components/Projects/Projects';
import AddProject from '../components/Projects/AddProject';
import EditProject from '../components/Projects/EditProject';

import Statuses from '../components/Statuses/Statuses';
import AddStatus from '../components/Statuses/AddStatus';
import EditStatus from '../components/Statuses/EditStatus';


export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'about',
        path: '/about',
        component: About
    },
    {
        name: 'register',
        path: '/register',
        component: Register
    },
    {
        name: 'login',
        path: '/login',
        component: Login
    },
    {
        name: 'dashboard',
        path: '/dashboard',
        component: Dashboard
    },

    {
        name: 'projects',
        path: '/projects',
        component: Projects
    },
    {
        name: 'addproject',
        path: '/projects/add',
        component: AddProject
    },
    {
        name: 'editproject',
        path: '/projects/edit/:id',
        component: EditProject
    },
    {
        name: 'statuses',
        path: '/statuses',
        component: Statuses
    },
    {
        name: 'addstatus',
        path: '/statuses/add',
        component: AddStatus
    },
    {
        name: 'editstatus',
        path: '/statuses/edit/:id',
        component: EditStatus
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
