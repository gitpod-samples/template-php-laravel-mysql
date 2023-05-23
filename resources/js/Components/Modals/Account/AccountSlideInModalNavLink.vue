<script setup>
import BaseIcon from "@/Components/Base/BaseIcon.vue";
import {mdiLogout} from "@mdi/js";
import { computed } from "vue";

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
        default: false,
    },
    lable: {
        type: String,
        required: true,
    },
    description: {
        type: String,
        required: true,
    },
    isLogout: {
        type: Boolean,
        default: false,
    },
});

const classes = computed(() => {
    return props.active
        ? "group ml-8 block sm:text-left text-center text-xl font-medium text-blue"
        : "group ml-8 text-white block text-center sm:text-left text-xl font-medium hover:text-blue";
});
const classesForInner = computed(() => {
    return props.active
        ? "text-3xs text-blue"
        : "text-3xs text-grey-600/30 group-hover:text-blue";
});
</script>

<template>
    <Link v-if="!props.isLogout"
        :class="classes"
        :href="props.href == 'profile.index'? route(props.href, $page.props.auth.user.username): route(props.href)"
    >
        {{ props.lable }}
        <div :class="classesForInner">// {{ props.description }}</div>
    </Link>
    <Link v-else
        class="group ml-8 text-white block text-center sm:text-left text-xl font-medium hover:text-blue"
        :href="route(props.href)"
        as="button"
        method="post"
    >
    <div class="flex gap-1">
        <BaseIcon :path="mdiLogout"/>
        <span>
            {{ props.lable }}
        </span>

    </div>

        <div :class="classesForInner">// {{ props.description }}</div>
    </Link>
</template>
