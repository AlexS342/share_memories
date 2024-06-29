<template>
    <template v-if="filesStore.getShowFormFiles">
        <FormFiles/>
    </template>
    <div class="wrp">
        <div class="header">
            <h3 class="headerName">Ваши фото: <span>Все фото из всех ваших альбомов, которые вы создали</span></h3>
            <div class="headerAction">
                <div class="headerActionItem">
                    <label class="headerActionItemText" for="pagination">на странице</label>
                    <select class="headerActionItemPagination" name="pagination" id="pagination">
                        <option value="24">24</option>
                        <option value="36">36</option>
                        <option value="48">48</option>
                        <option value="56">56</option>
                        <option value="64">64</option>
                    </select>
                    <span class="headerActionItemText">фото</span>
                </div>
                <div class="headerActionItem" v-on:click="showFormFiles">
                    <img class="headerActionItemImg" src="/img/icons/download.svg" alt="download">
                    <span class="headerActionItemText">Загрузить файлы</span>
                </div>
                <div class="headerActionItem">
                    <img class="headerActionItemImg" src="/img/icons/down.svg" alt="show">
                    <span class="headerActionItemText">показать</span>
                </div>
            </div>
        </div>

        <ol class="list">
            <li class="item">
                <img class="itemImg" src="/img/photo/img1.jpg" alt="img">
                <div class="itemInfo">
                    <span class="itemInfoName">Красивая картинка среднего качества, на которой запечатлены высокие, заросшие березами и море</span>
                </div>
                <div class="itemData">
                    <span class="itemDataItem">584kB</span>
                </div>
            </li>
            <li class="item">
                <img class="itemImg" src="/img/photo/img2.jpg" alt="img">
                <div class="itemInfo">
                    <span class="itemInfoName">Красивая картинка среднего качества, на которой запечатлены высокие, заросшие березами и море</span>
                </div>
                <div class="itemData">
                    <span class="itemDataItem">584kB</span>
                </div>
            </li>
            <li class="item">
                <img class="itemImg" src="/img/photo/img3.jpg" alt="img">
                <div class="itemInfo">
                    <span class="itemInfoName">Красивая картинка среднего качества, на которой запечатлены высокие, заросшие березами и море</span>
                </div>
                <div class="itemData">
                    <span class="itemDataItem">584kB</span>
                </div>
            </li>
            <li class="item">
                <img class="itemImg" src="/img/photo/img11.jpg" alt="img">
                <div class="itemInfo">
                    <span class="itemInfoName">Красивая картинка среднего качества, на которой запечатлены высокие, заросшие березами и море</span>
                </div>
                <div class="itemData">
                    <span class="itemDataItem">584kB</span>
                </div>
            </li>
            <li class="item">
                <img class="itemImg" src="/img/photo/img12.jpg" alt="img">
                <div class="itemInfo">
                    <span class="itemInfoName">Красивая картинка среднего качества, на которой запечатлены высокие, заросшие березами и море</span>
                </div>
                <div class="itemData">
                    <span class="itemDataItem">584kB</span>
                </div>
            </li>
            <li class="item">
                <img class="itemImg" src="/img/photo/img13.jpg" alt="img">
                <div class="itemInfo">
                    <span class="itemInfoName">Красивая картинка среднего качества, на которой запечатлены высокие, заросшие березами и море</span>
                </div>
                <div class="itemData">
                    <span class="itemDataItem">584kB</span>
                </div>
            </li>
            <li class="item">
                <img class="itemImg" src="/img/photo/img21.jpg" alt="img">
                <div class="itemInfo">
                    <span class="itemInfoName">Красивая картинка среднего качества, на которой запечатлены высокие, заросшие березами и море</span>
                </div>
                <div class="itemData">
                    <span class="itemDataItem">584kB</span>
                </div>
            </li>
            <li class="item">
                <img class="itemImg" src="/img/photo/img22.jpg" alt="img">
                <div class="itemInfo">
                    <span class="itemInfoName">Красивая картинка среднего качества, на которой запечатлены высокие, заросшие березами и море</span>
                </div>
                <div class="itemData">
                    <span class="itemDataItem">584kB</span>
                </div>
            </li>
            <li class="item">
                <img class="itemImg" src="/img/photo/img23.jpg" alt="img">
                <div class="itemInfo">
                    <span class="itemInfoName">Красивая картинка среднего качества, на которой запечатлены высокие, заросшие березами и море</span>
                </div>
                <div class="itemData">
                    <span class="itemDataItem">584kB</span>
                </div>
            </li>
            <li class="item">
                <img class="itemImg" src="/img/photo/img31.jpg" alt="img">
                <div class="itemInfo">
                    <span class="itemInfoName">Красивая картинка среднего качества, на которой запечатлены высокие, заросшие березами и море</span>
                </div>
                <div class="itemData">
                    <span class="itemDataItem">584kB</span>
                </div>
            </li>
            <li class="item">
                <img class="itemImg" src="/img/photo/img32.jpg" alt="img">
                <div class="itemInfo">
                    <span class="itemInfoName">Красивая картинка среднего качества, на которой запечатлены высокие, заросшие березами и море</span>
                </div>
                <div class="itemData">
                    <span class="itemDataItem">584kB</span>
                </div>
            </li>
            <li class="item">
                <img class="itemImg" src="/img/photo/img33.jpg" alt="img">
                <div class="itemInfo">
                    <span class="itemInfoName">Красивая картинка среднего качества, на которой запечатлены высокие, заросшие березами и море</span>
                </div>
                <div class="itemData">
                    <span class="itemDataItem">584kB</span>
                </div>
            </li>
            <li class="item">
                <img class="itemImg" src="/img/photo/img41.jpg" alt="img">
                <div class="itemInfo">
                    <span class="itemInfoName">Красивая картинка среднего качества, на которой запечатлены высокие, заросшие березами и море</span>
                </div>
                <div class="itemData">
                    <span class="itemDataItem">584kB</span>
                </div>
            </li>
            <li class="item">
                <img class="itemImg" src="/img/photo/img42.jpg" alt="img">
                <div class="itemInfo">
                    <span class="itemInfoName">Красивая картинка среднего качества, на которой запечатлены высокие, заросшие березами и море</span>
                </div>
                <div class="itemData">
                    <span class="itemDataItem">584kB</span>
                </div>
            </li>
            <li class="item">
                <img class="itemImg" src="/img/photo/img43.jpg" alt="img">
                <div class="itemInfo">
                    <span class="itemInfoName">Красивая картинка среднего качества, на которой запечатлены высокие, заросшие березами и море</span>
                </div>
                <div class="itemData">
                    <span class="itemDataItem">584kB</span>
                </div>
            </li>
        </ol>
    </div>
</template>

<script>
import FormFiles from "@/components/FormFiles.vue";
import {useFilesStore} from "@/stores/files.js";

export default {
    name: "FilesContent",
    components: {
        FormFiles,
    },
    setup() {
        const filesStore = useFilesStore()
        return {filesStore}
    },
    data() {
        return {
            // 'isShowForm': false
        }
    },
    methods: {
        showFormFiles: function () {
            this.filesStore.setShowFormFiles(true)
        },
    }
}
</script>

<style scoped>
.wrp{
    width: 1024px;
    display: flex;
    flex-direction: column;
}
.header{
    width: 100%;
    display: flex;
    align-items: center;
    flex-direction: row;
    justify-content: space-between;
    box-sizing: border-box;
    padding: 6px 24px;
    border-top: 1px solid rgb(230, 230, 230);
    border-bottom: 1px solid rgb(230, 230, 230);
    background-color: rgb(238, 238, 238);
    box-shadow: inset -10px 0 20px -5px white;
}
.headerName{
    font-size: 16px;
    font-weight: 700;
    text-transform: uppercase;
    display: flex;
    align-items: center;
}
.headerName>span{
    font-size: 14px;
    font-weight: 300;
    color: rgb(52, 52, 52);
    text-transform: none;
    max-width: 200px;
    max-height: 14px;
    box-sizing: border-box;
    padding-left: 6px;

    margin: 0;
    -webkit-line-clamp: 1;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.headerAction{
    display: flex;
    align-items: center;
}
.headerActionItem{
    box-sizing: border-box;
    padding: 3px 12px;
    cursor: pointer;
    display: flex;
    align-items: center;
}
.headerActionItemPagination{
    font-size: 12px;
    border-radius: 6px;
    border: 1px solid #bfbfbf;
    color: rgb(85 85 85);
    font-weight: 300;
    background: #f7f7f7;
    margin: 0 4px;

}
.headerActionItemImg{
    width: 20px;
    margin-right: 3px;
}
.headerActionItemText{
    font-size: 12px;
    font-weight: 300;
    text-transform: lowercase;
}

.list{
    width: 100%;
    box-sizing: border-box;
    padding: 6px 24px;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center;
}
.item{
    width: 180px;
    height: 180px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-shrink: 0;
    overflow: hidden;
    object-fit: cover;
    margin: 1px;
    position: relative;
}
.itemImg{
    min-height: 180px;
    min-width: 180px;
    overflow: hidden;
    object-fit: cover;
}
.itemInfo{
    display: none;
    background-color: rgba(255, 255, 255, 0.6);
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    box-sizing: border-box;
    padding: 4px;
}
.itemInfoName{
    font-size: 10px;

    margin: 0;
    -webkit-line-clamp: 2;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.itemData{
    display: block;
    background-color: rgba(255, 255, 255, 0.6);
    position: absolute;
    right: 0;
    bottom: 0;
    box-sizing: border-box;
    padding: 2px 6px 6px;
    margin: 4px;
    border-radius: 10px;
}
.itemDataItem{
    font-size: 10px;
    line-height: 10px;
}
.item:hover>.itemInfo{
    display: block;
}
.item:hover>.itemData{
    display: none;
}

</style>