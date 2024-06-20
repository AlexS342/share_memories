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
        <p>Здесь будет информация об аккаунте</p>
        <ol>
            <li>Количество файлов</li>
            <li>Количество коментарием и лайков</li>
            <li>Статистика просмотров</li>
        </ol>
    </main>
</template>

<script>
export default {
    name: "AnalysisView"
}
</script>

<style scoped>

</style>