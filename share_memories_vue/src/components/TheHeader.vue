<script setup>
import {RouterLink} from 'vue-router'
import {useUserStore} from "@/stores/user.js";
const userStore = useUserStore()
</script>

<template>
    <header>
        <div class="logoWRP">
            <h1 class="logoName">LOGO</h1>
            <p class="logoText">Мини-текст</p>
        </div>
        <div class="info">
            <h2 class="infoHeader">Какой-то заголовок</h2>
            <p class="infoText">Какой-то текст в шапке сайта с информацией о чем-то самом важном. А еще можно здесь
                разместить анонсы развития приложения или даже рекламу.</p>
            <p class="infoText">Но если лень, то можно ничего не размещать.</p>
        </div>
        <div class="user">
            <div v-if="userStore.getAuth" class="userTrue">
                <router-link to="/profile">{{ userStore.user.name }}</router-link><br/>
                <a href="#" v-on:click="logout(userStore)">выйти</a>
            </div>
            <div v-else class="userFalse">
                <p>вы не авторизованы</p>
                <RouterLink to="/the_login">войти</RouterLink>
            </div>
        </div>
    </header>
</template>

<script>
import axios from "axios";

export default {
    name: "MainHeader",
    // data() {
    //     return {}
    // },
    methods: {
        logout: async function (store) {
            await axios.post('/logout')
                .then((response) => {
                    console.log('LOGOUT OK => ' + response.status)
                    store.setAuth(false)
                    this.$router.push({path: '/'})
                })
                .catch((error) => {
                    console.log('LOGOUT ERROR => ' + error.message)
                })
        }
    }
}
</script>

<style scoped>
/*Стили по умолчанию для экранов 1200px и больше*/
header {
    display: flex;
    box-sizing: border-box;
    border-bottom: 1px solid #bed5ff;
}

.logoWRP {
    display: flex;
    flex-direction: column;
    align-items: center;
    box-sizing: border-box;
    padding: 12px;
}

.logoName {
    font-size: 36px;
    color: #002557;
}

.logoText {
    font-size: 12px;
    color: #002557;
}

.info {
    display: flex;
    flex-direction: column;
    box-sizing: border-box;
    padding: 12px;
    align-items: center;
}

.infoHeader {
    font-size: 24px;
    color: #002557;
    margin-bottom: 6px;
}

.infoText {
    font-size: 14px;
    color: #002557;
}

/*@media (min-width: 1024px) and (max-width: 1199px){ }*/
/*@media (min-width: 768px) and (max-width: 1028px) {}*/
/*@media (min-width: 480px) and (max-width: 767px) {}*/
/*@media (max-width: 479px) {}*/
</style>