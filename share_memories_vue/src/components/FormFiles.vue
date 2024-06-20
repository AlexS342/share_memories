<template>
    <form>
        <label for="album">Выберите альбом</label>
        <select>
            <option value="1">Лето 2018</option>
            <option value="2">Выпускной</option>
            <option value="3">Юбилей Вити</option>
            <option value="4">Свадьба сестры</option>
            <option value="6">Армия</option>
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
        <textarea id="rights5" name="rights1" cols="30" rows="4"></textarea>
        <button>Загрузить</button>
    </form>
</template>

<script>
export default {
    name: "FormFiles"
}
</script>

<style scoped>

</style>