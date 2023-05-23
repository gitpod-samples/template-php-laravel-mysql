<script setup>
import { computed, ref, onMounted, watch } from "vue";
import FormControlStatusIcon from "./FormControlStatusIcon.vue";
import BaseIcon from "@/Components/Base/BaseIcon.vue";
import { mdiPhone } from "@mdi/js";

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
        default: mdiPhone,
    },
    icon: {
        type: String,
        default: null,
    },
    options: {
        type: Array,
        default: null,
    },
    type: {
        type: String,
        default: "text",
    },
    modelValue: {
        type: [String, Number, Boolean, Array, Object],
        default: "",
    },
    statSec: Boolean,
    statErr: Boolean,
    required: Boolean,
    borderless: Boolean,
    transparent: Boolean,
});
const emit = defineEmits(["update:modelValue", "setRef", "customChange"]);

// const computedValue = computed({
//   get: () => props.modelValue,
//   set: (value) => {
//     emit("update:modelValue", value);
//   },
// });
const computedValue = ref("");

const inputElClass = computed(() => {
    const base = [
        "px-3  py-2 max-w-full focus:ring focus:outline-none  rounded w-full h-12",
        "dark:placeholder-gray-400",
        props.borderless ? "border-0" : "border",
        props.transparent ? "bg-transparent" : "bg-white dark:bg-slate-800",
        props.statErr
            ? "border-danger-600"
            : props.statSec
            ? "border-emerald-600"
            : "border-gray-600",
    ];

    if (props.icon) {
        base.push("pl-20");
    }
    if (props.statErr || props.statSec) {
        base.push("pr-10");
    }

    return base;
});

const computedType = computed(() => (props.options ? "select" : props.type));

const controlIconH = computed(() =>
    props.type === "textarea" ? "h-full" : "h-12"
);

const inputEl = ref(null);
const format = ref(null);
const regex = ref("^");

onMounted(() => {
    emit("setRef", inputEl.value);
    let X = 1;
    format.value = props.placeholder.replace(/X+/g, () => "$" + X++);
    props.placeholder.match(/X+/g).forEach((char, key) => {
        regex.value += "(\\d{" + char.length + "})?";
    });
});

watch(computedValue, () => {
    computedValue.value = computedValue.value
        .replace(/[^0-9]/g, "")
        .replace(new RegExp(regex.value, "g"), format.value)

        .substring(0, props.placeholder.length);
    emit("update:modelValue", computedValue.value);
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
            :type="computedType"
            :class="inputElClass"
        />
        <div
            class="absolute max-w-[79px] top-0 left-0 z-10 pointer-events-none text-gray-500 dark:text-slate-400"
        >
            <BaseIcon :path="icon" w="w-20" h="h-12">
                <span class=" text-white font-bold text-lg"> +251</span>
            </BaseIcon>
        </div>
        <FormControlStatusIcon
            v-if="statErr"
            :stat-err="statErr"
            :stat-sec="statSec"
            :h="controlIconH"
        />
        <FormControlStatusIcon
            v-if="statSec"
            :stat-err="statErr"
            :stat-sec="statSec"
            :h="controlIconH"
        />
    </div>
</template>
