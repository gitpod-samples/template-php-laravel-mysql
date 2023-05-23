<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    LinkTitle: String,
    LinkRoute: String,
    LinkISAuth: Boolean,    
})
</script>
<template>
    
    <Link v-if="$page.props.auth.user && !LinkISAuth && LinkTitle !=='Logout' " :href="route(LinkRoute)">{{ LinkTitle }} </Link>
    <Link v-if="$page.props.auth.user && !LinkISAuth && LinkTitle ==='Logout' " as="button" method="post" :href="route(LinkRoute)">{{ LinkTitle }} </Link>
    <Link v-if="!($page.props.auth.user) && LinkTitle !=='Logout' " :href="route(LinkRoute)">{{ LinkTitle }} </Link>
    
        
</template>
