<template>
    <footer>
        <ol class="wrp">
            <li class="item">
                <RouterLink class="itemLink" to="/">Главная</RouterLink>
            </li>
            <li class="item" v-if="userStore.getAuth">
                <RouterLink class="itemLink" to="/lenta">Лента</RouterLink>
            </li>
            <li class="item" v-if="userStore.getAuth">
                <RouterLink class="itemLink" to="/files">Мои файлы</RouterLink>
            </li>
            <li class="item" v-if="userStore.getAuth">
                <RouterLink class="itemLink" to="/people">Люди</RouterLink>
            </li>
            <li class="item" v-if="userStore.getAuth">
                <RouterLink class="itemLink" to="/analysis">Анализ</RouterLink>
            </li>
        </ol>
    </footer>
</template>

<script>
import {useUserStore} from "@/stores/user.js";
export default {
    name: "TheFooter",
    setup() {
        const userStore = useUserStore()
        return {userStore}
    },
}
</script>

<style scoped>
.wrp{
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
    animation: footerTextViewNo  500ms 1 ease-in-out forwards;
}
.itemLink:hover{
    animation: footerTextViewYes  500ms 1 ease-in-out forwards;
}

@keyframes footerTextViewYes {
    from {
        color: #676767;
    }
    to {
        color: #CCC;
    }
}
@keyframes footerTextViewNo {
    from {
        color: #CCC;
    }
    to {
        color: #676767;
    }
}

</style>