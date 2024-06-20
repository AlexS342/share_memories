<template>
    <form>
        <label for="name">Название альбома</label>
        <input type="text" id="name" name="name">
        <br/>
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
        <textarea id="rights5" name="rights1" cols="30" rows="4"></textarea>
        <button>Создать</button>
    </form>
</template>

<script>
// import axios from "axios";
export default {
    name: "FormAlbum",
    // data() {
    //     return {}
    // },
    // created() {},
    // methods: {}
}
</script>

<style scoped>

</style>