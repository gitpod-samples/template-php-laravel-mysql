<script setup>
import { computed } from "vue";

const props = defineProps({
    username: {
        type: String,
        required: true,
    },
    avatar: {
        type: String,
        default: null,
    },
    api: {
        type: String,
        default: "avataaars",
    },
    size: {
        type: String,
        default: null,
    },
    displayName: Boolean,
});

const avatarSize = computed(() =>
    props.size ? `h-${props.size} w-${props.size} ` : "h-10 w-10"
);
const avatar = computed(
    () =>
        props.avatar ??
        `https://avatars.dicebear.com/api/${props.api}/${props.username.replace(
            /[^a-z0-9]+/i,
            "-"
        )}.svg`
);

const username = computed(() => props.username);
</script>

<template>
    <div>
        <img
            v-if="avatar"
            :src="avatar"
            :alt="username"
            class="rounded-full block h-auto w-full max-w-full bg-gray-100 dark:bg-slate-800"
        />
        <div v-else class="inline-flex h-auto  align-middle">
            <span v-if="displayName" class="self-center hidden mr-1 sm:block whitespace-nowrap">
                {{ props.username }}
            </span>
            <div :class="avatarSize"
                class="rounded-full flex mx-auto bg-gray-100 dark:bg-purple-700"
            >
                <span
                    class="self-center w-full h-auto text-white text-center text-[90%] font-bold"
                >
                    AL
                </span>
            </div>
        </div>

        <slot />
    </div>
</template>
