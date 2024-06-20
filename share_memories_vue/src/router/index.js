import {createRouter, createWebHistory} from 'vue-router';
import MainView from '../views/MainView.vue';
import LoginView from '../views/LoginView.vue';
import LentaView from '../views/LentaView.vue';

import FilesView from '../views/FilesView.vue';
import PeopleView from '../views/PeopleView.vue';
import AnalysisView from '../views/AnalysisView.vue';
import ProfileView from '../views/ProfileView.vue';

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/',
            name: 'main',
            component: MainView
        },
        {
            path: '/the_login',
            name: 'login',
            component: LoginView
        },
        {
            path: '/lenta',
            name: 'lenta',
            component: LentaView
        },
        {
            path: '/files',
            name: 'files',
            component: FilesView
        },
        {
            path: '/people',
            name: 'peopl',
            component: PeopleView
        },
        {
            path: '/analysis',
            name: 'analysis',
            component: AnalysisView
        },
        {
            path: '/profile',
            name: 'profile',
            component: ProfileView
        },
    ]
})

export default router
