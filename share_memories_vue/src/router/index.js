import {createRouter, createWebHistory} from 'vue-router';
import MainView from '../views/MainView.vue';
import LoginView from '../views/LoginView.vue';
import LentaView from '../views/LentaView.vue';

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/',
            name: 'main',
            component: MainView
        },
        {
            path: '/login',
            name: 'login',
            component: LoginView
        },
        {
            path: '/lenta',
            name: 'lenta',
            component: LentaView
        },
    ]
})

export default router
