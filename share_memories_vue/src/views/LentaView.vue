<script setup>
import TheHeader from '../components/TheHeader.vue'
import TheMenu from '../components/TheMenu.vue'
</script>

<template>
    <TheHeader />
    <TheMenu />
    <main class="main">
        <h1>Лента</h1>
        <p>Здесь будут отображаться новые файлы других пользователей и попасть сюда можно будет только после авторизации</p>
    </main>
</template>

<script>
export default {
    name: "LentaView"
}
</script>

<style scoped>
/*Стили по умолчанию для экранов 1200px и больше*/
.main{
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 36px;
}

/*@media (min-width: 1024px) and (max-width: 1199px){ }*/
/*@media (min-width: 768px) and (max-width: 1028px) {}*/
/*@media (min-width: 480px) and (max-width: 767px) {}*/
/*@media (max-width: 479px) {}*/
</style>