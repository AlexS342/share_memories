<template>
    <MainInfo/>
    <MainRandPhotos/>
</template>

<script>
import MainInfo from "@/components/MainInfo.vue";
import MainRandPhotos from "@/components/MainRandPhotos.vue";

export default {
    name: "MainView",
    components: {
        MainInfo,
        MainRandPhotos,
    },
}
</script>

<style scoped>


/*Стили по умолчанию для экранов 1200px и больше*/


/*@media (min-width: 1024px) and (max-width: 1199px){ }*/
/*@media (min-width: 768px) and (max-width: 1028px) {}*/
/*@media (min-width: 480px) and (max-width: 767px) {}*/
/*@media (max-width: 479px) {}*/
</style>