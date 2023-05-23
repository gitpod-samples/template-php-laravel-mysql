<script setup>
import {mdiAlertCircle, mdiCheckCircle} from "@mdi/js";
import {computed} from "vue";
import BaseIcon from "@/Components/Base/BaseIcon.vue";

const props = defineProps({

  statErr:{
    type: Boolean,
    default: false,
  },
  statSec:{
    type: Boolean,
    default: false,
  },
  h: {
    type: String,
    default: null,
  },
});
const computedIconType = computed(() => (props.statErr ? mdiAlertCircle : mdiCheckCircle));
const computedIconClass = computed(() => (props.statErr ? ' text-danger-600' : 'text-emerald-600 '));
</script>

<template>
  <BaseIcon
  v-if="props.statSec || props.statErr"
    :path="computedIconType"
    w="w-10"
    :h="props.h"
    :class="computedIconClass"
    class="absolute top-0 right-0 z-10 pointer-events-none "
  />
</template>
