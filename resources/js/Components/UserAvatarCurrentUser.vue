<script setup >
import { useMainStore } from "../stores/main";
import UserAvatar from "./UserAvatar.vue";
defineProps({
    displayName:Boolean,
    size:{
        type: String,
        default:null,
    }
})
const mainStore = useMainStore();
</script>

<template>
  <UserAvatar :size="size" :displayName="displayName" :username="$page.props.auth.user.name" :avatar="mainStore.userAvatar">
    <slot />
  </UserAvatar>
</template>
