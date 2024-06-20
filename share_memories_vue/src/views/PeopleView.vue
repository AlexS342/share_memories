<script setup>
import TheHeader from '../components/TheHeader.vue'
import TheMenu from '../components/TheMenu.vue'

// import {useUserStore} from "@/stores/user.js";
// const userStore = useUserStore()
</script>

<template>
    <TheHeader/>
    <TheMenu/>
    <main class="main">
        <p>Здесь будет отношениями с людьми</p>
        <ol>
            <li>Добавление и просмотр друзей</li>
            <li>Просмотр подписчиков</li>
            <li>Управление подписками</li>
        </ol>
    </main>
</template>

<script>
export default {
    name: "PeopleView"
}
</script>

<style scoped>

</style>