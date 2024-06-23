<template>
    <form v-if="countAlbums > 0">
        <label for="album">Выберите альбом</label>
        <select id="album" name="album" v-on:focusin="getAlbums">
            <option v-for="(item, index) in albums" :key="index" :value="item.id">{{item.name}}</option>
        </select>
        <label for="files">Выберите файлы</label>
        <input type="file" id="files" name="files[]">
        <br/>
        <p>Кому будут видны добавляемые файлы</p>
        <label for="rights1">
            Всем посетителям
            <input type="radio" id="rights1" name="rights" value="guest">
        </label><br/>
        <label for="rights2">
            Всем пользователям
            <input type="radio" id="rights2" name="rights" value="users">
        </label><br/>
        <label for="rights3">
            Друзьям и подписчикам
            <input type="radio" id="rights3" name="rights" value="friends-subscribers">
        </label><br/>
        <label for="rights4">
            Только друзьям
            <input type="radio" id="rights4" name="rights" value="friends">
        </label><br/>
        <label for="rights5">
            Только мне
            <input type="radio" id="rights5" name="rights" value="private">
        </label><br/>
        <label for="description">Описание</label>
        <textarea id="description" name="description" cols="30" rows="4"></textarea>
        <button>Загрузить</button>
    </form>
    <div v-else>
        У вас нет ни одного альбома. Чтобы добавлять файлы, сначала создайте новый альбом.
    </div>
</template>

<script>
import axios from "axios"
import {useUserStore} from "@/stores/user.js"
export default {
    name: "FormFiles",

    setup() {
        const userStore = useUserStore()
        return {userStore}
    },
    data() {
        return {
            'countAlbums': 0,
            'albums': [],
        }
    },
    created(){
        this.getAlbums()
    },
    methods: {
        getAlbums() {
            console.log('Получаю альбомы')
            axios.get('/api/albums/get')
                .then((response) => {
                    this.albums = response.data

                    this.countAlbums = this.albums.length
                    this.userStore.setCountAlbums(this.countAlbums)
                })
                .catch((errors) => {
                    console.log(errors)
                })
        },
    },
}
</script>

<style scoped>

</style>