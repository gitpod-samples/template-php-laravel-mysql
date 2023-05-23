<script setup>

import AccountSlideInModalNavList from './AccountSlideInModalNavList.vue';

defineProps({
    menu: {
    type: Array,
    required: true,
  },
})
</script>

<template>
    <nav class="mt-10">
        <ul class="-ml-8 flex h-full flex-col space-y-7">
            <AccountSlideInModalNavList :menu="menu" />
        </ul>
    </nav>
</template>
