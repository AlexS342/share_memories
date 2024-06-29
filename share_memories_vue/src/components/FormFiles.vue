<template>
    <div class="wrp1">
        <div class="wrp2">
            <h4 class="header">Загрузить файлы</h4>
            <form action="" class="form" v-on:submit.prevent="submitFiles" enctype="multipart/form-data">

                <label for="album" class="label">Выберите альбом</label>
                <select class="select" id="album" name="album" v-on:focusin="getAlbums"  v-model="albumId">
                    <option v-for="(item, index) in albums" :key="index" :value="item.id">{{item.name}}</option>
                </select>

                <label for="files" class="label">Файлы</label>
                <input class="inputFiles" type="file" id="files" ref="files" multiple v-on:change="handleFilesUpload">

                <div class="radioWrp">
                    <h5 class="radioTitle">Кому будут видны файлы</h5>
                    <div class="radioInputWrp">
                        <input class="radioInput" type="radio" id="rights1" name="rights" value="Всем посетителям"
                               v-model="rights">
                        <label for="rights1" class="radioLabel">
                            Все посетителям сайта
                        </label>
                    </div>
                    <div class="radioInputWrp">
                        <input class="radioInput" type="radio" id="rights2" name="rights" value="Всем пользователям"
                               v-model="rights">
                        <label for="rights2" class="radioLabel">
                            Все пользователям сайта
                        </label>
                    </div>
                    <div class="radioInputWrp">
                        <input class="radioInput" type="radio" id="rights3" name="rights" value="Друзьям и подписчикам"
                               v-model="rights">
                        <label for="rights3" class="radioLabel">
                            Друзьям и подписчикам
                        </label>
                    </div>
                    <div class="radioInputWrp">
                        <input class="radioInput" type="radio" id="rights4" name="rights" value="Только друзьям"
                               v-model="rights">
                        <label for="rights4" class="radioLabel">
                            Только друзьям
                        </label>
                    </div>
                    <div class="radioInputWrp">
                        <input class="radioInput" type="radio" id="rights5" name="rights" value="Только мне"
                               v-model="rights">
                        <label for="rights5" class="radioLabel">
                            Только мне
                        </label>
                    </div>
                </div>

                <label class="label" for="description2">Описание файлов (для всех сразу)</label>
                <textarea class="textarea" name="description" id="description2" rows="5" v-model="description">
                </textarea>

                <div class="wrpAction">
                    <button type="button" class="button" v-on:click="hideForm">Отмена</button>
                    <button type="submit" class="button">Создать</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import axios from "axios"
import {useUserStore} from "@/stores/user.js"
import {useFilesStore} from "@/stores/files.js";
export default {
    name: "FormFiles",

    setup() {
        const userStore = useUserStore()
        const filesStore = useFilesStore()
        return {userStore, filesStore}
    },
    data() {
        return {
            'countAlbums': 0,
            'albums': [],
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
        hideForm: function () {
            this.filesStore.setShowFormFiles(false)
        },

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
                    this.filesStore.setShowFormFiles(false)
                    //TODO добавить сообщение об успешной загрузке файлов
                })
                .catch((error) => {
                    console.log(error)
                    this.filesStore.setShowFormFiles(false)
                    //TODO добавить сообщение об ошибке при загрузке файлов
                })
        },
    },
}
</script>

<style scoped>
.wrp1{
    z-index: 1000;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100vh;
    background-color: rgba(59, 167, 255, 0.75);
    position: fixed;
    top: 0;
    left: 0;
}
.wrp2{
    min-width: 300px;
    display: flex;
    flex-direction: column;
    background-color: white;
    padding: 24px;
    border: 1px solid rgb(224, 224, 224);
    border-radius: 6px;
}
.header{
    font-size: 18px;
    font-weight: 700;
    text-transform: uppercase;
    text-align: center;
    margin-bottom: 12px;
}
.form{
    display: flex;
    flex-direction: column;
}
.select{
    margin-bottom: 12px;
}
.label{
    font-size: 14px;
    font-weight: 500;
}
.inputFiles{
    margin-bottom: 12px;
}
.radioWrp{
    margin-bottom: 12px;
}
.radioTitle{
    font-size: 14px;
    font-weight: 500;
}
.radioInputWrp{
    width: 100%;
}
.radioInput{
    margin-right: 6px;
}
.radioLabel{
    font-size: 14px;
    font-weight: 300;
}
.textarea{
    font-size: 12px;
    min-width: 100%;
    box-sizing: border-box;
    margin-bottom: 12px;
}
.wrpAction{
    width: 100%;
    display: flex;
    justify-content: space-between;
    box-sizing: border-box;
    padding: 0 12px;
    margin-bottom: -12px;
}
.button{

}
</style>