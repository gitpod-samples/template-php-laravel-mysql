<script setup>
import { computed } from "vue";
import FormCheckRadio from "./FormCheckRadio.vue";

const props = defineProps({
  options: {
    type: [Object, Array],
    default: () => {},
  },
  name: {
    type: String,
    required: true,
  },
  type: {
    type: String,
    default: "checkbox",
    validator: (value) => ["checkbox", "radio", "switch"].includes(value),
  },
  componentClass: {
    type: String,
    default: null,
  },
  isColumn: Boolean,
  modelValue: {
    type: [Array, String, Number, Boolean],
    default: null,
  },
});

const emit = defineEmits(["update:modelValue"]);

const computedValue = computed({
  get: () => props.modelValue,
  set: (value) => {
    emit("update:modelValue", value);
  },
});
</script>

<template>
  <div
    class="flex justify-start flex-wrap -mb-3"
    :class="{ 'flex-col': isColumn }"
  >
    <FormCheckRadio
      v-for="option in options"
      v-model="computedValue"
      :key="option.id ?? option"
      :type="type"
      :name="name"
      :input-value="option.id ?? option"
      :label="option.name ?? option"
      :class="componentClass"
      class="mr-6 mb-3 last:mr-0"
    />
  </div>
</template>
