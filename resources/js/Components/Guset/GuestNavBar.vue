<script setup>
import AuthLink from './AuthLink.vue';
</script>
<template>
    <div class="hidden lg:block">
        <div class="flex items-center justify-center flex-wrap -mb-3">
            <AuthLink :href="route('login')" :active="$page.component === 'Auth/Login'">Login</AuthLink>
            <AuthLink :href="route('register')" :active="$page.component === 'Auth/Register'">Signup</AuthLink>
        </div>
    </div>
</template>

