<template>
    <nav class="wrp">
        <ol class="list">
            <li class="item">
                <RouterLink class="itemLink" to="/">Главная</RouterLink>
            </li>
            <li class="item" v-if="userStore.getAuth">
                <RouterLink class="itemLink" to="/lenta">Лента</RouterLink>
            </li>
            <li class="item" v-if="userStore.getAuth">
                <RouterLink class="itemLink" to="/files">Мои файлы</RouterLink>
                <ol class="itemList">
                    <li class="itemListItem">
                        <a class="itemListItemLink" href="#">Море 2017</a>
                    </li>
                    <li class="itemListItem">
                        <a class="itemListItemLink" href="#">Выпускной</a>
                    </li>
                    <li class="itemListItem">
                        <a class="itemListItemLink" href="#">Юбилей клавы</a>
                    </li>
                    <li class="itemListItem">
                        <a class="itemListItemLink" href="#">Личное</a>
                    </li>
                </ol>
            </li>
            <li class="item" v-if="userStore.getAuth">
                <RouterLink class="itemLink" to="/people">Люди</RouterLink>
                <ol class="itemList">
                    <li class="itemListItem">
                        <a class="itemListItemLink" href="#">Друзья</a>
                    </li>
                    <li class="itemListItem">
                        <a class="itemListItemLink" href="#">Подписчики</a>
                    </li>
                    <li class="itemListItem">
                        <a class="itemListItemLink" href="#">Подписки</a>
                    </li>
                </ol>
            </li>
            <li class="item" v-if="userStore.getAuth">
                <RouterLink class="itemLink" to="/analysis">Анализ</RouterLink>
                <ol class="itemList">
                    <li class="itemListItem">
                        <a class="itemListItemLink" href="#">Файлы</a>
                    </li>
                    <li class="itemListItem">
                        <a class="itemListItemLink" href="#">Просмотры</a>
                    </li>
                    <li class="itemListItem">
                        <a class="itemListItemLink" href="#">Комментарии</a>
                    </li>
                    <li class="itemListItem">
                        <a class="itemListItemLink" href="#">Реакции</a>
                    </li>
                </ol>
            </li>
        </ol>
    </nav>
</template>

<script>
import {useUserStore} from "@/stores/user.js";

export default {
    name: "TheMenu",
    setup() {
        const userStore = useUserStore()
        return {userStore}
    },
}
</script>

<style scoped>
/*Стили по умолчанию для экранов 1024px и больше*/
.wrp{
    width: 1024px;
    background-color: #7ec3ff;
}
.list{
    display: flex;
    margin-top: -12px;
    box-sizing: border-box;
    padding: 16px 16px 4px 16px ;
}
.item{
    padding: 6px 12px;
    position: relative;
}
.itemLink{
    font-size: 16px;
    font-weight: 700;
    text-decoration: none;
    text-transform: uppercase;
    animation: textViewNo  500ms 1 ease-in-out forwards;
}
.itemList{
    position: absolute;
    top: 24px;
    left: 10px;
    background-color: #7ec3ff;
    padding: 6px 18px 12px 12px;
    flex-direction: column;
    box-shadow: 2px 2px 4px -3px black;

    animation: viewNo  500ms 1 ease-in-out forwards;
}
.item:hover>.itemLink{
    animation: textViewYes  500ms 1 ease-in-out forwards;
    text-decoration: underline;
}
.item:hover>.itemList{
    display: flex;
    opacity: 1;

    animation: viewYes  500ms 1 ease-in-out forwards;
}
.itemListItem{
    margin-bottom: 6px;
}
.itemListItem:last-child{
    margin-bottom: 0;
}
.itemListItemLink{
    font-size: 14px;
    font-weight: 300;
    text-decoration: none;
    text-transform: lowercase;
    color: #676767;
}
.itemListItem:hover>.itemListItemLink{
    color: #304071;
    text-decoration: underline;
}

@keyframes viewYes {
    from {
        opacity: 0;
        display: none;
    }
    1%{
        opacity: 0.01;
        display: flex;
    }
    to {
        opacity: 1;
        display: flex;
    }
}
@keyframes viewNo {
    from {
        opacity: 1;
        display: flex;
    }
    99%{
        opacity: 0.01;
        display: flex;
    }
    to {
        opacity: 0;
        display: none;
    }
}

@keyframes textViewYes {
    from {
        color: #676767;
    }
    to {
        color: #304071;
    }
}
@keyframes textViewNo {
    from {
        color: #304071;
    }
    to {
        color: #676767;
    }
}

/*@media (min-width: 1024px) and (max-width: 1199px){ }*/
/*@media (min-width: 768px) and (max-width: 1028px) {}*/
/*@media (min-width: 480px) and (max-width: 767px) {}*/
/*@media (max-width: 479px) {}*/
</style>