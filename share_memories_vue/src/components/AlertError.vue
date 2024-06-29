<template>
    <div class="wrp danger">
        <div class="icon">
            <img class="img" src="@/../public/img/icons/alert/error.svg" alt="error">
        </div>
        <div class="container">
            <h4 class="title">Error</h4>
            <div class="request">
                <span class="requestCode">{{errorsStore.getCode}}</span>
                <span class="requestMessage">{{errorsStore.getErrors[0]}}</span>
            </div>
            <div class="user">
                <p class="userMessage" v-for="(item, index) in errorsStore.getErrors" :key="index">
                    {{ item }}
                </p>
            </div>
        </div>
        <div class="action">
            <button class="button" type="button" v-on:click="clearErrors">X</button>
        </div>
    </div>
</template>

<script>
import {useErrorsStore} from "@/stores/errors.js";
export default {
    name: "AlertError",
    setup() {
        const errorsStore = useErrorsStore();
        return {errorsStore}
    },
    methods: {
        clearErrors: function () {
            this.errorsStore.clearErrors()
            localStorage.setItem('errorsStatus', 'false')
            localStorage.setItem('errorsCode', '0')
            localStorage.setItem('errorsArray', '[]')
        },
    }
}
</script>

<style scoped>
.wrp{
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
.requestCode{
    font-size: 24px;
    font-weight: 900;
    margin-right: 24px;
}
.requestMessage{
    font-size: 16px;
    font-weight: 700;
    margin-top: 12px;
}
.user{
    width: 100%;
}
.userMessage{
    font-size: 14px;
    font-weight: 300;
    margin: 6px 0;
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

.danger{
    background-color: #ffd8d8;
    color: red;
}

</style>