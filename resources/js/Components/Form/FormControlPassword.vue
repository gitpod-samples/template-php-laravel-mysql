<script setup>
import { computed, ref, onMounted} from "vue";

import FormControlIcon from "./FormControlIcon.vue";

import { mdiEye, mdiEyeOff, mdiKey } from "@mdi/js";

const props = defineProps({
    name: {
        type: String,
        default: null,
    },
    id: {
        type: String,
        default: null,
    },
    autocomplete: {
        type: String,
        default: null,
    },
    placeholder: {
        type: String,
        default: null,
    },
    inputmode: {
        type: String,
        default: null,
    },
    icon: {
        type: String,
        default: null,
    },
    options: {
        type: [Array, Object],
        default: null,
    },
    type: {
        type: String,
        default: "password",
    },
    modelValue: {
        type: [String, Number, Boolean, Array, Object],
        default: "",
    },
    changeType:{
        type: Boolean,
        default:true,
    },
    inputSuccess: Boolean,
    inputError: Boolean,
    required: Boolean,
    borderless: Boolean,
    transparent: Boolean,
});
const emit = defineEmits(["update:modelValue", "setRef"]);

const computedValue = computed({
    get: () => props.modelValue,
    set: (value) => {
        emit("update:modelValue", value);
    },
});

const visibility = ref("password");

const showPassword = () => {
    visibility.value = "text";
};

const hidePassword = () => {
    visibility.value = "password";
};

const inputElClass = computed(() => {
    const base = [
        "px-3 py-2 max-w-full focus:ring focus:outline-none  rounded w-full pr-10 h-12",
        "dark:placeholder-gray-400 ",
        props.borderless ? "border-0" : "border",
        props.transparent ? "bg-transparent" : "bg-white dark:bg-slate-800",
        props.inputError
            ? "border-danger-600"
            : props.inputSuccess
            ? "border-emerald-600"
            : "border-gray-600",
    ];

    if (props.icon) {
        base.push("pl-10");
    }

    return base;
});


const visibilityStatus = computed(() =>
    visibility.value === "password" ? false : true
);

const inputEl = ref(null);

onMounted(() => {
    emit("setRef", inputEl.value);
});
</script>

<template>
    <div class="relative">
        <input
            :id="id"
            ref="inputEl"
            v-model="computedValue"
            :name="name"
            :inputmode="inputmode"
            :autocomplete="autocomplete"
            :required="required"
            :placeholder="placeholder"
            :type="visibility"
            :class="inputElClass"
        />
        <FormControlIcon
            v-if="icon"
            :icon-error="props.inputError"
            :icon-success="props.inputSuccess"
            :icon="icon"
            h="h-12"
            position="left"
        />
        <div v-if="props.changeType">
            <FormControlIcon
            v-if="visibilityStatus"
            :icon-error="props.inputError"
            :icon-success="props.inputSuccess"
            @click="hidePassword()"
            :icon="mdiEyeOff"
            h="h-12"
            position="right"
            :pointer-eve="true"
        />
        <FormControlIcon
            v-else
            :icon-error="props.inputError"
            :icon-success="props.inputSuccess"
            @click="showPassword()"
            :icon="mdiEye"
            h="h-12"
            position="right"
            :pointer-eve="true"
        />
        </div>



    </div>
</template>
