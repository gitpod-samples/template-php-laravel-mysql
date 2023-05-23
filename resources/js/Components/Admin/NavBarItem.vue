<script setup>
import { mdiChevronUp, mdiChevronDown } from "@mdi/js";
import { computed, ref, onMounted, onBeforeUnmount } from "vue";
import { useStyleStore } from "@/stores/style.js";
import { useMainStore } from "@/stores/main.js";
import BaseIcon from "@/Components/Base/BaseIcon.vue";
import UserAvatarCurrentUser from "@/Components/UserAvatarCurrentUser.vue";
import NavBarMenuList from "@/Components/Admin/NavBarMenuList.vue";
import BaseDivider from "@/Components/Base/BaseDivider.vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    item: {
        type: Object,
        required: true,
    },
});

const emit = defineEmits(["menu-click"]);

const is = computed(() => {
    if (props.item.href) {
        return Link;
    }

    if (props.item.to) {
        return Link;
    }

    return "div";
});

const styleStore = useStyleStore();

const componentClass = computed(() => {
    const base = [
        isDropdownActive.value
            ? `${styleStore.navBarItemLabelActiveColorStyle} dark:text-slate-400`
            : `${styleStore.navBarItemLabelStyle} dark:text-white dark:hover:text-slate-400 ${styleStore.navBarItemLabelHoverStyle}`,
        props.item.menu ? "lg:py-2 lg:px-3" : "py-2 px-3",
    ];

    if (props.item.isDesktopNoLabel) {
        base.push("lg:w-16", "lg:justify-center");
    }

    return base;
});

const itemLabel = computed(() =>
    props.item.isCurrentUser ? useMainStore().userName : props.item.label
);

const isDropdownActive = ref(false);

const menuClick = (event) => {
    emit("menu-click", event, props.item);

    if (props.item.menu) {
        isDropdownActive.value = !isDropdownActive.value;
    }
};

const menuClickDropdown = (event, item) => {
    emit("menu-click", event, item);
};

const root = ref(null);

const forceClose = (event) => {
    if (root.value && !root.value.contains(event.target)) {
        isDropdownActive.value = false;
    }
};

onMounted(() => {
    if (props.item.menu) {
        window.addEventListener("click", forceClose);
    }
});

onBeforeUnmount(() => {
    if (props.item.menu) {
        window.removeEventListener("click", forceClose);
    }
});
</script>

<template>
    <BaseDivider v-if="item.isDivider" nav-bar />

    <Link
        v-else-if="item.isLogout"
        :href="route(item.href ?? 'logout')"
        as="button"
        method="post"
        class="block lg:flex items-center relative cursor-pointer"
    >
        <div class="flex items-center">
            <BaseIcon
                v-if="item.icon"
                :path="item.icon"
                class="transition-colors"
            />
            <span
                class="px-2 transition-colors whitespace-nowrap"
                :class="{ 'lg:hidden': item.isDesktopNoLabel && item.icon }"
            >
                {{ itemLabel }}
            </span>
        </div>
    </Link>
    <component
        :is="is"
        v-else
        ref="root"
        class="block lg:flex items-center relative cursor-pointer"
        :class="componentClass"
        :to="item.to ?? null"
        :href="item.href ?? null"
        :target="item.target ?? null"
        @click="menuClick"
    >
        <div
            class="flex items-center"
            :class="{
                'bg-gray-100 dark:bg-slate-800 lg:bg-transparent lg:dark:bg-transparent p-3 lg:p-0':
                    item.menu,
            }"
        >
            <UserAvatarCurrentUser
                v-if="item.isCurrentUser"
                :display-name="true"
                size="6"
                class="mr-1 inline-flex"
            />
            <BaseIcon
                v-if="item.icon"
                :path="item.icon"
                class="transition-colors"
            />
            <span
                class="px-2 transition-colors whitespace-nowrap"
                :class="{ 'lg:hidden': item.isDesktopNoLabel && item.icon }"
                >{{ itemLabel }}</span
            >
            <BaseIcon
                v-if="item.menu"
                :path="isDropdownActive ? mdiChevronUp : mdiChevronDown"
                class="hidden lg:inline-flex transition-colors"
            />
        </div>
        <div
            v-if="item.menu"
            class="text-sm border-b border-gray-100 lg:border lg:bg-white lg:absolute lg:top-full lg:left-0 lg:min-w-full lg:z-20 lg:rounded-lg lg:shadow-lg lg:dark:bg-slate-800 dark:border-slate-700"
            :class="{ 'lg:hidden': !isDropdownActive }"
        >
            <NavBarMenuList :menu="item.menu" @menu-click="menuClickDropdown" />
        </div>
    </component>
</template>
