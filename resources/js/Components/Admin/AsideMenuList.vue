<script setup>
import AsideMenuItem from "@/Components/Admin/AsideMenuItem.vue";

defineProps({
    isDropdownList: Boolean,
    menu: {
        type: Array,
        required: true,
    },
});

const emit = defineEmits(["menu-click"]);

const menuClick = (event, item) => {
    emit("menu-click", event, item);
};
</script>

<template>
    <ul class="admin-side-bar-items">
        <AsideMenuItem
            v-for="(item, index) in menu"
            :key="index"
            :item="item"
            :is-dropdown-list="isDropdownList"
            @menu-click="menuClick"
        />
    </ul>
</template>

<style  >
ul.admin-side-bar-items li{
    margin-top: 4px;
    margin-bottom: 4px;

}
ul.admin-side-bar-items li:last-child{
    margin-bottom: 0;
}
ul.admin-side-bar-items li:first-child{
    margin-top: 0;
}


</style>
