<script setup>
defineProps({
    styles: String,
});
</script>
<template>
    <Link
    :href="route('home')"
        class="py-4 px-6 font-poppins font-medium text-[18px] text-primary bg-blue-gradient rounded-[10px] outline-none"
        :class="styles"
    >
        Get Started
    </Link>
</template>
