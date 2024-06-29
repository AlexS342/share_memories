<template>
    <template v-if="albumsStore.getShowFormAlbums">
        <FormAlbum/>
    </template>
    <div class="wrp">
        <div class="header">
            <h3 class="headerName">Ваши альбомы</h3>
            <div class="headerAction">
                <div class="headerActionItem" v-on:click="showFormAlbums">
                    <img class="headerActionItemImg" src="/img/icons/create.svg" alt="create">
                    <span class="headerActionItemText">Новый альбом</span>
                </div>
                <div class="headerActionItem">
                    <img class="headerActionItemImg" src="/img/icons/down.svg" alt="show">
                    <span class="headerActionItemText">показать</span>
                </div>
            </div>
        </div>

        <ol class="list">
            <li class="listItem">
                <a class="listItemLink" href="#">Все фото</a>
            </li>
            <li class="listItem">
                <a class="listItemLink" href="#">лето 2018</a>
            </li>
            <li class="listItem">
                <a class="listItemLink" href="#">Выпускной</a>
            </li>
            <li class="listItem">
                <a class="listItemLink" href="#">Армия</a>
            </li>
            <li class="listItem">
                <a class="listItemLink" href="#">Море 2020</a>
            </li>
            <li class="listItem">
                <a class="listItemLink" href="#">Теплоход 2017</a>
            </li>
            <li class="listItem">
                <a class="listItemLink" href="#">Юбилей Юли 30 лет</a>
            </li>
            <li class="listItem">
                <a class="listItemLink" href="#">День города 2023</a>
            </li>
            <li class="listItem">
                <a class="listItemLink" href="#">лето 2018</a>
            </li>
            <li class="listItem">
                <a class="listItemLink" href="#">Выпускной</a>
            </li>
            <li class="listItem">
                <a class="listItemLink" href="#">Армия</a>
            </li>
            <li class="listItem">
                <a class="listItemLink" href="#">Море 2020</a>
            </li>
            <li class="listItem">
                <a class="listItemLink" href="#">Теплоход 2017</a>
            </li>
        </ol>
    </div>
</template>

<script>
import FormAlbum from "@/components/FormAlbum.vue";
import {useAlbumsStore} from "@/stores/albums.js";

export default {
    name: "TheFilesAlbums",
    components: {
        FormAlbum,
    },
    setup() {
        const albumsStore = useAlbumsStore()
        return {albumsStore}
    },
    data() {
        return {}
    },
    methods: {
        showFormAlbums: function () {
            this.albumsStore.setShowFormAlbums(true)
        },
    }
}
</script>

<style scoped>
.wrp{
    width: 1024px;
    display: flex;
    flex-direction: column;
}
.header{
    width: 100%;
    display: flex;
    align-items: center;
    flex-direction: row;
    justify-content: space-between;
    box-sizing: border-box;
    padding: 6px 24px;
    border-top: 1px solid rgb(230, 230, 230);
    border-bottom: 1px solid rgb(230, 230, 230);
    background-color: rgb(238, 238, 238);
    box-shadow: inset -10px 0 20px -5px white;
}
.headerName{
    font-size: 16px;
    font-weight: 700;
    text-transform: uppercase;
}
.headerAction{
    display: flex;
    align-items: center;
}
.headerActionItem{
    box-sizing: border-box;
    padding: 3px 12px;
    cursor: pointer;
    display: flex;
    align-items: center;
}
.headerActionItemImg{
    width: 20px;
    margin-right: 3px;
}
.headerActionItemText{
    font-size: 12px;
    font-weight: 300;
    text-transform: lowercase;
}
.list{
    width: 100%;
    box-sizing: border-box;
    padding: 6px 24px;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
}
.listItem{
    box-sizing: border-box;
    padding: 3px 12px;
}
.listItemLink{
    text-decoration: none;
    color: rgb(125 125 125);
}
.listItemLink:hover{
    color: rgb(52, 52, 52);
    text-decoration: underline;
}

</style>