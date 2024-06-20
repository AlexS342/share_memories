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
        <p>Здесь будет личными данными</p>
        <ol>
            <li>Изменение личных данных</li>
            <li>Изменение пароля</li>
            <li>Управление приватностью</li>
        </ol>
    </main>
</template>

<script>
export default {
    name: "ProfileView"
}
</script>

<style scoped>

</style>