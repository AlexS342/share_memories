<template>
    <FilesAlbums/>
    <FilesContent/>
    <ThePagination/>
</template>

<script>
import FilesAlbums from "@/components/FilesAlbums.vue";
import FilesContent from "@/components/FilesContent.vue";
import ThePagination from "@/components/ThePagination.vue";

export default {
    name: "FilesView",
    components: {
        FilesAlbums,
        FilesContent,
        ThePagination,
    },
}
</script>

<style scoped>

</style>