<script setup>
import {  mdiClose, mdiSquareRoundedBadge } from "@mdi/js";
import BaseButton from "@/Components/Base/BaseButton.vue";
import BaseIcon from "@/Components/Base/BaseIcon.vue";
import UserAvatarCurrentUser from "@/Components/UserAvatarCurrentUser.vue";

const emit = defineEmits(["close"]);

const close = () => {
    emit("close");
};
</script>
<template>
    <header class="mb-6 pt-8">
        <div>
            <div
                class="pin-0 sm:left-0 absolute z-10 flex h-10 w-10 items-center justify-center top-[10px] right-[20px]"
            >
                <BaseButton
                    @click="close"
                    color="contrast"
                    :icon="mdiClose"
                    iconSize="14"

                />
            </div>
            <div class="sm:mt-[30px] flex-shrink-0 flex items-center">
                <Link :href="route('profile.index', $page.props.auth.user.username)">
                    <div class="w-[60px] h-[60px]">
                        <UserAvatarCurrentUser />
                    </div>
                </Link>
                <div class="ml-5">
                    <Link
                        class="block text-2xs font-medium"
                        :href="route('profile.index', $page.props.auth.user.username)"
                    >
                        <h5 class="font-poppins text-[14px] font-medium">
                            @{{ $page.props.auth.user.username }}
                        </h5>
                        <div class=" flex align-middle w-full text-gray-600">
                            <BaseIcon :path="mdiSquareRoundedBadge" :size="14"/>
                            <span class=" text-sm ">
                                Guest
                            </span>
                        </div>


                    </Link>
                </div>
            </div>
        </div>
    </header>
</template>
