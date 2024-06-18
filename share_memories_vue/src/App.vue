<script setup>
import {RouterView} from 'vue-router';
import {useUserStore} from "@/stores/user.js";
import axios from "axios";

const userStore = useUserStore();

if (localStorage.getItem('isAuth') === 'true') {
    userStore.setAuth(true);
    getDataUser();
} else {
    userStore.setAuth(false);
}

async function getDataUser() {
    await axios.get('/api/user')
        .then((response) => {
            console.log('APP.JS GET USER OK =>' + response.data.name);
            userStore.setUser(response.data);
        })
        .catch((error) => {
            console.log('APP.JS GET USER ERROR => ' + error.message);
            if(error.response.status === 401 || error.response.status === 419 || error.response.status === 422){
                userStore.setAuth(false);
                localStorage.setItem('isAuth', 'false')
                this.$router.push({path: '/login'})
            }
        });
}
</script>

<template>
    <RouterView/>
</template>

<script>

</script>

<style scoped>
/*Стили по умолчанию для экранов 1200px и больше*/

/*@media (min-width: 1024px) and (max-width: 1199px){ }*/
/*@media (min-width: 768px) and (max-width: 1028px) {}*/
/*@media (min-width: 480px) and (max-width: 767px) {}*/
/*@media (max-width: 479px) {}*/
</style>
