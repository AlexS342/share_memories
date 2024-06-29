<template>
    <div class="wrp">
        <div class="header">
            <h3 class="headerName">Свежие фото наших пользователей</h3>
            <p class="headerText">доступные для просмотра всем посетителям сайта.</p>
        </div>
        <div class="content">
            <div class="contentItem">
                <img class="contentItemImg" src="/img/photo/img1.jpg" alt="img">
            </div>
            <div class="contentItem">
                <img class="contentItemImg" src="/img/photo/img2.jpg" alt="img">
            </div>
            <div class="contentItem">
                <img class="contentItemImg" src="/img/photo/img3.jpg" alt="img">
            </div>
            <div class="contentItem">
                <img class="contentItemImg" src="/img/photo/img11.jpg" alt="img">
            </div>
            <div class="contentItem">
                <img class="contentItemImg" src="/img/photo/img12.jpg" alt="img">
            </div>
            <div class="contentItem">
                <img class="contentItemImg" src="/img/photo/img13.jpg" alt="img">
            </div>
            <div class="contentItem">
                <img class="contentItemImg" src="/img/photo/img21.jpg" alt="img">
            </div>
            <div class="contentItem">
                <img class="contentItemImg" src="/img/photo/img22.jpg" alt="img">
            </div>
            <div class="contentItem">
                <img class="contentItemImg" src="/img/photo/img23.jpg" alt="img">
            </div>
            <div class="contentItem">
                <img class="contentItemImg" src="/img/photo/img31.jpg" alt="img">
            </div>
            <div class="contentItem">
                <img class="contentItemImg" src="/img/photo/img32.jpg" alt="img">
            </div>
            <div class="contentItem">
                <img class="contentItemImg" src="/img/photo/img33.jpg" alt="img">
            </div>
            <div class="contentItem">
                <img class="contentItemImg" src="/img/photo/img41.jpg" alt="img">
            </div>
            <div class="contentItem">
                <img class="contentItem" src="/img/photo/img42.jpg" alt="img">
            </div>
            <div class="contentItem">
                <img class="contentItemImg" src="/img/photo/img43.jpg" alt="img">
            </div>
        </div>

        <div class="action">
            <p class="actionText">Чтобы начать пользоваться нашим сайтом, вам нужно
                <a class="actionTextLink" href="#">войти</a> в свой аккаунт или
                <a class="actionTextLink" href="#">зарегистрироваться</a>!
            </p>
        </div>
    </div>
</template>

<script>
export default {
    name: "MainRandPhotos"
}
</script>

<style scoped>
.wrp{
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    box-sizing: border-box;
}
.header{
    background-color: #d9efff;
    padding: 12px 24px;
}
.headerName{
    text-align: center;
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 8px;
}
.headerText{
    text-align: center;
    font-size: 14px;
    font-weight: 300;
}
.content{
    width: 100%;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center;
    box-sizing: border-box;
    padding: 12px 24px;
}
.contentItem{
    width: 180px;
    height: 180px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-shrink: 0;
    overflow: hidden;
    object-fit: cover;
    margin: 1px;
}
.contentItemImg{
    min-height: 180px;
    min-width: 180px;
    overflow: hidden;
    object-fit: cover;
}
.action{
    width: 100%;
    box-sizing: border-box;
    padding: 12px 24px;
}
.actionText{
    text-align: center;
    font-size: 14px;
    font-weight: 300;
}
.actionTextLink{
    text-decoration: none;
    font-weight: 500;
    color: rgb(25, 105, 255);
}
</style>