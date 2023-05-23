<script setup>
import { ref } from "vue";
import AccountSlideInModal from "@/Components/Modals/Account/AccountSlideInModal.vue";
import UserAvatarCurrentUser from "../UserAvatarCurrentUser.vue";


const emit = defineEmits(["close"]);
const accountSlideOutMenu = ref(false);
const showAccountSlideOutMenu = () => {
    accountSlideOutMenu.value = true;
};

const close = () => {
    accountSlideOutMenu.value = false;
};
</script>
<template>
    <div>
        <button @click="showAccountSlideOutMenu" class="block leading-none">
            <UserAvatarCurrentUser :displayName="true" />
        </button>

        <AccountSlideInModal :show="accountSlideOutMenu" @close="close" />
    </div>
</template>
