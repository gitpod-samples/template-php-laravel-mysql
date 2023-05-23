<script setup>
import { ref, computed, useSlots } from "vue";
import { mdiClose } from "@mdi/js";
import { colorsBgLight, colorsOutline } from "@/Data/colors.js";
import BaseLevel from "@/Components/Base/BaseLevel.vue";
import BaseIcon from "@/Components/Base/BaseIcon.vue";
import BaseButton from "./Base/BaseButton.vue";


const props = defineProps({
    show:Boolean,
  icon: {
    type: String,
    default: null,
  },
  outline: Boolean,
  color: {
    type: String,
    required: true,
  },
});

const componentClass = computed(() =>{
    const base = [
       "absolute top-0 right-0 border-2  border-purple-800 md:min-w-[300px]  max-w-lg rounded-l-2xl px-4 py-4 md:py-4 ",
       props.outline ? colorsOutline[props.color] : colorsBgLight[props.color],
    ]
    // if( props.show){
    //     base.push('active')
    // }
    // if(props.color && !props.outline){
    //     base.push()
    // }
    // if(){
    //     base.push()
    // }

    return base;
}

);


</script>

<template>

  <div :class="componentClass">
    <BaseLevel>
      <div class="flex  flex-col md:flex-row  items-center">
        <BaseIcon
          v-if="icon"
          :path="icon"
          w="w-10 md:w-5"
          h="h-10 md:h-5"
          size="30"
          class="md:mr-2"
        />
        <span class="text-center md:text-left md:py-2">
            <slot />
        </span>
      </div>

    </BaseLevel>
  </div>
</template>
<!-- <style>
.form-status{
    transform: translateX(100%);
    animation-duration: 5s;
    animation-fill-mode: forwards;
    animation-name: fadeInFadeOut;
    display: none;
}
.form-status.active{
    display: block;
}

@keyframes fadeInFadeOut {
    0% {
        transform: translateX(100%);
    }
    15%,
    90%
    {
        transform: translateX(0);
    }
    100%{
        transform: translateX(100%);
    }


}
</style> -->
