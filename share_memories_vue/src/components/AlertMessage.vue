<template>
    <div class="wrp ok">
        <div class="icon">
            <img class="img" src="@/../public/img/icons/alert/checked.svg" alt="checked">
        </div>
        <div class="container">
            <h4 class="title">Успех</h4>
            <div class="request">
                <span class="requestMessage" v-for="(item, index) in messagesStore.getMessages" :key="index">
                    {{ item }}
                </span>
            </div>
        </div>
        <div class="action">
            <button class="button" type="button" v-on:click="clearMessages">X</button>
        </div>
    </div>
</template>

<script>
import {useMessagesStore} from "@/stores/messages.js";

export default {
    name: "AlertMessage",
    setup() {
        const messagesStore = useMessagesStore();
        return {messagesStore}
    },
    methods: {
        clearMessages: function () {
            this.messagesStore.clearMessages()
            localStorage.setItem('messagesStatus', 'false')
            localStorage.setItem('messagesArray', '[]')
        },
    }
}
</script>

<style scoped>
.wrp{
    z-index: 1000;
    width: 100%;
    box-sizing: border-box;
    padding: 12px 24px;
    display: flex;
    justify-content: center;
}
.icon{
    width: 100px;
    display: flex;
    align-items: center;
    justify-content: flex-start;
}
.img{
    width: 36px;
}
.title{
    width: 600px;
    font-size: 18px;
    font-weight: 500;
    text-transform: uppercase;
    margin-bottom: 12px;
}
.request{
    width: 100%;
    /* margin-bottom: 12px; */
}
.requestMessage{
    font-size: 16px;
    font-weight: 700;
    margin-top: 12px;
}
.action{
    width: 100px;
    display: flex;
    justify-content: flex-end;
    align-items: flex-start
}
.button{
    padding: 0 4px;
    font-size: 14px;
    font-weight: 200;
    text-transform: uppercase;
    color: rgb(75, 70, 64);
}

.ok{
    background-color: #86ff96;
    color: rgb(0, 128, 6);
}

</style>