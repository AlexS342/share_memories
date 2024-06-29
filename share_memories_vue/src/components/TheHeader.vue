<template>
    <header class="wrp">
        <div class="logo">
            <div class="logo__logo">
                <img class="logo__logoImg" src="/img/icons/logo.svg" alt="logo">
                <p class="logo__logoName">share memory</p>
            </div>
            <p class="logo__text">Делитесь воспоминаниями с&nbsp;друзьями</p>
        </div>

        <div class="info">
            <h1 class="info__header">Делитесь воспоминаниями</h1>
            <ol class="info__list">
                <li class="info__listItem">
                    <div class="info__listItemImgWRP">
                        <svg class="info__listItemImg" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="m10 3.5c0-.39782.158-.77936.4393-1.06066s.6629-.43934 1.0607-.43934.7794.15804 1.0607.43934.4393.66284.4393 1.06066v.5c0 .26522.1054.51957.2929.70711.1875.18753.4419.29289.7071.29289h3c.2652 0 .5196.10536.7071.29289.1875.18754.2929.44189.2929.70711v3c0 .26522-.1054.51957-.2929.70711-.1875.18753-.4419.29289-.7071.29289h-.5c-.3978 0-.7794.158-1.0607.4393s-.4393.6629-.4393 1.0607.158.7794.4393 1.0607.6629.4393 1.0607.4393h.5c.2652 0 .5196.1054.7071.2929s.2929.4419.2929.7071v3c0 .2652-.1054.5196-.2929.7071s-.4419.2929-.7071.2929h-3c-.2652 0-.5196-.1054-.7071-.2929s-.2929-.4419-.2929-.7071v-.5c0-.3978-.158-.7794-.4393-1.0607s-.6629-.4393-1.0607-.4393-.7794.158-1.0607.4393-.4393.6629-.4393 1.0607v.5c0 .2652-.10536.5196-.29289.7071-.18754.1875-.44189.2929-.70711.2929h-3c-.26522 0-.51957-.1054-.70711-.2929-.18753-.1875-.29289-.4419-.29289-.7071v-3c0-.2652-.10536-.5196-.29289-.7071-.18754-.1875-.44189-.2929-.70711-.2929h-.5c-.39782 0-.77936-.158-1.06066-.4393s-.43934-.6629-.43934-1.0607.15804-.7794.43934-1.0607.66284-.4393 1.06066-.4393h.5c.26522 0 .51957-.10536.70711-.29289.18753-.18754.29289-.44189.29289-.70711v-3c0-.26522.10536-.51957.29289-.70711.18754-.18753.44189-.29289.70711-.29289h3c.26522 0 .51957-.10536.70711-.29289.18753-.18754.29289-.44189.29289-.70711z"/>
                        </svg>
                    </div>
                    <p class="info__listItemText">
                        Нужно перечислить главные цели и преимущества проекта в сжатом формате, но понятном пользователю и не забыть упомянуть о преимуществах.
                    </p>
                </li>
                <li class="info__listItem">
                    <div class="info__listItemImgWRP">
                        <svg class="info__listItemImg" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="m10 3.5c0-.39782.158-.77936.4393-1.06066s.6629-.43934 1.0607-.43934.7794.15804 1.0607.43934.4393.66284.4393 1.06066v.5c0 .26522.1054.51957.2929.70711.1875.18753.4419.29289.7071.29289h3c.2652 0 .5196.10536.7071.29289.1875.18754.2929.44189.2929.70711v3c0 .26522-.1054.51957-.2929.70711-.1875.18753-.4419.29289-.7071.29289h-.5c-.3978 0-.7794.158-1.0607.4393s-.4393.6629-.4393 1.0607.158.7794.4393 1.0607.6629.4393 1.0607.4393h.5c.2652 0 .5196.1054.7071.2929s.2929.4419.2929.7071v3c0 .2652-.1054.5196-.2929.7071s-.4419.2929-.7071.2929h-3c-.2652 0-.5196-.1054-.7071-.2929s-.2929-.4419-.2929-.7071v-.5c0-.3978-.158-.7794-.4393-1.0607s-.6629-.4393-1.0607-.4393-.7794.158-1.0607.4393-.4393.6629-.4393 1.0607v.5c0 .2652-.10536.5196-.29289.7071-.18754.1875-.44189.2929-.70711.2929h-3c-.26522 0-.51957-.1054-.70711-.2929-.18753-.1875-.29289-.4419-.29289-.7071v-3c0-.2652-.10536-.5196-.29289-.7071-.18754-.1875-.44189-.2929-.70711-.2929h-.5c-.39782 0-.77936-.158-1.06066-.4393s-.43934-.6629-.43934-1.0607.15804-.7794.43934-1.0607.66284-.4393 1.06066-.4393h.5c.26522 0 .51957-.10536.70711-.29289.18753-.18754.29289-.44189.29289-.70711v-3c0-.26522.10536-.51957.29289-.70711.18754-.18753.44189-.29289.70711-.29289h3c.26522 0 .51957-.10536.70711-.29289.18753-.18754.29289-.44189.29289-.70711z"/>
                        </svg>
                    </div>
                    <p class="info__listItemText">
                        Красиво рассказать о том, что файлы легко сохранить на сервере и они будут доступны пользователю на любом устройстве, а главное в хорошем качестве
                    </p>
                </li>
            </ol>
        </div>

        <div class="auth">
            <!-- Если авторизирован -->
            <div v-if="userStore.getAuth">
                <a href="#" class="auth__user">
                    <div class="auth__userAva">
                    </div>
                    <router-link class="auth_userName" to="/profile">{{ userStore.user.name }}</router-link>
                </a>
                <div class="auth__action">
                    <a class="auth__actionItem" href="#" v-on:click="logout(userStore)">выйти</a>
                </div>
            </div>
            <!-- Если не авторизирован -->
            <div v-else>
                <h5 class="auth__header">Хотите начать?</h5>
                <div  class="auth__list">
                    <RouterLink class="auth__listLink" to="/the_login">войти</RouterLink>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
import axios from "axios";
import {useUserStore} from "@/stores/user.js"

export default {
    name: "MainHeader",
    // data() {
    //     return {}
    // },
    setup() {
        const userStore = useUserStore()
        return {userStore}
    },
    methods: {
        logout: async function (store) {
            await axios.post('/logout')
                .then((response) => {
                    console.log('LOGOUT OK => ' + response.status)
                    store.setAuth(false)
                    this.$router.push({path: '/'})
                })
                .catch((error) => {
                    console.log('LOGOUT ERROR => ' + error.message)
                })
        }
    }
}
</script>

<style scoped>
/*Стили по умолчанию для экранов 1024px и больше*/
.wrp{
    width: 1024px;
    display: flex;
    background-color: #bedbff;
    box-sizing: border-box;
    padding: 16px 24px;
    z-index: 1000;
}

.logo{
    width: 175px;
}
.logo__logo{
    display: flex;
}
.logo__logoImg{
    width: 50px;
}
.logo__logoName{
    width: 125px;
    font-size: 28px;
    font-weight: 700;
    text-transform: uppercase;
}
.logo__text{
    text-align: center;
    font-size: 12px;
}
.info{
    width: 100%;
    box-sizing: border-box;
    padding: 0 36px;
    display: flex;
    flex-direction: column;
    align-items: center;
}
.info__header{
    font-size: 18px;
    font-weight: 700;
    text-transform: uppercase;
    margin-bottom: 6px;
}
.info__list{
    display: flex;
    flex-direction: column;
}
.info__listItem{
    display: flex;
    align-items: center;
    margin-bottom: 8px;
}
.info__listItem:last-child{
    margin-bottom: 0;
}
.info__listItemImgWRP{
    min-width: 16px;
    min-height: 16px;
    max-width: 16px;
    max-height: 16px;
    margin-right: 6px;
}
.info__listItemImg{
    width: 16px;
    height: 16px;
    fill: #5588f1;
}
.info__listItemText{
    font-size: 12px;
    font-weight: 200;
}
.auth{
    min-width: 200px;
    max-width: 200px;
    display: flex;
    flex-direction: column;
    align-items: center;
}
.auth__header{
    font-size: 14px;
    font-weight: 700;
    margin-bottom: 12px;
}
.auth__list{
    display: flex;
    flex-direction: column;
    align-items: center;
}
.auth__listLink{
    font-size: 14px;
    text-decoration: none;
    margin-bottom: 6px;
}
.auth__listLink:last-child{
    margin-bottom: 0;
}
.auth__user{
    display: flex;
    align-items: center;
    text-decoration: none;
    color: rgb(52, 52, 52);
}
.auth__userAva{
    min-width: 36px;
    max-width: 36px;
    height: 36px;
    border-radius: 50%;
    background-image: url('@/../public/img/avatars/ava.jpg');
    background-size: contain;
}
.auth_userName{
    max-width: 158px;
    padding-left: 6px;
    font-size: 14px;
    text-transform: capitalize;

    margin: 0;
    -webkit-line-clamp: 1;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.auth__action{
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: flex-end;
    flex-wrap: wrap;
}
.auth__actionItem{
    margin: 4px;
    font-size: 12px;
    text-transform: lowercase;
    text-decoration: none;
    color: #2c77ff;
}

/*@media (min-width: 1024px) and (max-width: 1199px){ }*/
/*@media (min-width: 768px) and (max-width: 1028px) {}*/
/*@media (min-width: 480px) and (max-width: 767px) {}*/
/*@media (max-width: 479px) {}*/
</style>