<script setup>
import TheHeader from '../components/TheHeader.vue'
import TheMenu from '../components/TheMenu.vue'
import FormAlbum from "@/components/FormAlbum.vue";
import FormFiles from "@/components/FormFiles.vue";

// import {useUserStore} from "@/stores/user.js";
// const userStore = useUserStore()
</script>

<template>
    <TheHeader/>
    <TheMenu/>
    <main class="main">
        <hr/>
        <div>
            <p>Форма для создания нового альбома</p>
            <FormAlbum/>
        </div>
        <hr/>
        <div>
            <p>Загрузить новые файлы</p>
            <FormFiles/>
        </div>
    </main>
</template>

<script>
export default {
    name: "FilesView"
}
</script>

<style scoped>

</style>