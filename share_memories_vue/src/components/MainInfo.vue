<template>
    <div class="listWRP">
        <ol class="list">
            <li class="listItem">
                <div class="listItemImgWRP">
                    <img class="listItemImg" src="/img/icons/email.svg" alt="email">
                </div>
                <p class="listItemText">
                    Нужно перечислить главные цели и преимущества проекта в сжатом формате, но понятном пользователю и не забыть упомянуть о преимуществах.
                </p>
            </li>
            <li class="listItem">
                <div class="listItemImgWRP">
                    <img class="listItemImg" src="/img/icons/geolocalization.svg" alt="geo">
                </div>
                <p class="listItemText">
                    Красиво рассказать о том, что файлы легко сохранить на сервере и они будут доступны пользователю на любом устройстве, а главное в хорошем качестве
                </p>
            </li>
            <li class="listItem">
                <div class="listItemImgWRP">
                    <img class="listItemImg" src="/img/icons/present.svg" alt="present">
                </div>
                <p class="listItemText">
                    Для просмотра не требуется много трафика, так как приложение будет оптимизировать изображение.
                </p>
            </li>
            <li class="listItem">
                <div class="listItemImgWRP">
                    <img class="listItemImg" src="/img/icons/shield.svg" alt="shield">
                </div>
                <p class="listItemText">
                    Рассказать о том, что в приложении можно настроить права на просмотр и на скачивание файла.
                </p>
            </li>
        </ol>
    </div>
</template>

<script>
export default {
    name: "MainInfo"
}
</script>

<style scoped>

.listWRP{
    display: flex;
    flex-direction: column;
    justify-items: center;
    box-sizing: border-box;
    padding: 16px 24px;
}
.list{
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: space-around;
}
.listItem{
    width: 40%;
    display: flex;
    align-items: center;
    margin-bottom: 16px;
    border: 1px solid #CCCCCC;
    border-radius: 8px;
    box-sizing: border-box;
    padding: 16px;
}
.listItem:last-child{
    margin-bottom: 0;
}
.listItemImgWRP{
    min-width: 60px;
    min-height: 60px;
    max-width: 60px;
    max-height: 60px;
    margin-right: 24px;
}
.listItemImg{
    width: 60px;
    height: 60px;
    fill: #5588f1;
}
.listItemText{
    font-size: 18px;
    font-weight: 700;
}
</style>