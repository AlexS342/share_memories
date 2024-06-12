<script setup>
import TheHeader from '../components/TheHeader.vue'
import TheMenu from '../components/TheMenu.vue'
</script>

<template>
    <TheHeader/>
    <TheMenu/>
    <main class="main">
        <h1>Главная</h1>
        <p>Красивая страничка с компактным описанием ресурса и небольшими инструкциями по использованию</p>
    </main>
</template>

<script>
export default {
    name: "MainView"
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