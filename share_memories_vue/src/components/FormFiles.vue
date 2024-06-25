<template>
    <form v-if="countAlbums > 0" v-on:submit.prevent="submitFiles" enctype="multipart/form-data">
        <label for="album">Выберите альбом</label>
        <select id="album" name="album" v-on:focusin="getAlbums"  v-model="albumId">
            <option v-for="(item, index) in albums" :key="index" :value="item.id">{{item.name}}</option>
        </select>

        <label for="files">Выберите файлы</label>
        <input type="file" id="files" ref="files" multiple v-on:change="handleFilesUpload"><br/>

        <p>Кому будут видны добавляемые файлы</p>
        <label for="rights1">
            Всем посетителям
            <input type="radio" id="rights1" name="rights" value="Всем посетителям" v-model="rights">
        </label><br/>
        <label for="rights2">
            Всем пользователям
            <input type="radio" id="rights2" name="rights" value="Всем пользователям" v-model="rights">
        </label><br/>
        <label for="rights3">
            Друзьям и подписчикам
            <input type="radio" id="rights3" name="rights" value="Друзьям и подписчикам" v-model="rights">
        </label><br/>
        <label for="rights4">
            Только друзьям
            <input type="radio" id="rights4" name="rights" value="Только друзьям" v-model="rights">
        </label><br/>
        <label for="rights5">
            Только мне
            <input type="radio" id="rights5" name="rights" value="Только мне" v-model="rights">
        </label><br/>

        <label for="description">Описание</label>
        <textarea id="description" name="description" cols="30" rows="4" v-model="description"></textarea>

        <button type="submit">Загрузить</button>
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

            //для формы загрузки файлов
            'albumId': '',
            'files': '',
            'rights': '',
            'description': '',
        }
    },
    created(){
        this.getAlbums()
    },
    methods: {
        getAlbums() {
            axios.get('/api/albums/get')
                .then((response) => {
                    this.albums = response.data
                    this.albumId = this.albums[0].id
                    this.countAlbums = this.albums.length
                    this.userStore.setCountAlbums(this.countAlbums)
                })
                .catch((errors) => {
                    console.log(errors)
                })
        },

        handleFilesUpload(){
            this.files = this.$refs.files.files;
        },

        async submitFiles() {
            let formData = new FormData();

            for( let i = 0; i < this.files.length; i++ ){
                let file = this.files[i];
                formData.append('files[' + i + ']', file);
            }
            formData.append('album_id', this.albumId)
            formData.append('description', this.description)
            formData.append('rights', this.rights)

            await axios.post('/api/files/add', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then((response) => {
                    console.log('FormFiles sendData OK => ' + response.status)
                    console.dir(response)
                    //TODO добавить сообщение об успешной загрузке файлов
                })
                .catch((error) => {
                    console.log(error)
                    //TODO добавить сообщение об ошибке при загрузке файлов
                })
        },
    },
}
</script>

<style scoped>

</style>