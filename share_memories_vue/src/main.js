import './assets/main.css'

import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from './App.vue'
import router from './router'

import axios from "axios";

axios.defaults.withCredentials = true;
axios.defaults.withXSRFToken = true;

const app = createApp(App)
const pinia = createPinia()


app.use(router)
app.use(pinia)

app.mount('#app')

// createApp(App).use(createPinia()).use(router).mount('#app')
