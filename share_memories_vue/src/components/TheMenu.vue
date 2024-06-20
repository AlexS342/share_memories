<script setup>
import {RouterLink} from 'vue-router'
import {useUserStore} from "@/stores/user.js";
const userStore = useUserStore()
</script>

<template>
    <nav>
        <ol>
            <li><RouterLink to="/">Главная</RouterLink></li>
            <li v-if="userStore.getAuth"><RouterLink to="/lenta">Лента</RouterLink></li>
            <li v-if="userStore.getAuth"><RouterLink to="/files">Мои файлы</RouterLink></li>
            <li v-if="userStore.getAuth"><RouterLink to="/people">Люди</RouterLink></li>
            <li v-if="userStore.getAuth"><RouterLink to="/analysis">Анализ</RouterLink></li>
        </ol>
    </nav>
</template>

<script>
export default {
    name: "TheMenu"
}
</script>

<style scoped>
/*Стили по умолчанию для экранов 1200px и больше*/
nav{
    width: 100%;
    box-sizing: border-box;
    padding: 12px;
    background: #569eff;
}
ol{
    display: flex;
}
li{

}
li>a{
    box-sizing: border-box;
    padding: 6px;
    text-decoration: none;
    color: #bed5ff;
}
li>a:hover{
    color: #ff9f32;
}
/*@media (min-width: 1024px) and (max-width: 1199px){ }*/
/*@media (min-width: 768px) and (max-width: 1028px) {}*/
/*@media (min-width: 480px) and (max-width: 767px) {}*/
/*@media (max-width: 479px) {}*/
</style>