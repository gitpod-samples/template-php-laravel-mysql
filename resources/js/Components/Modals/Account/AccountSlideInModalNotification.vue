<script setup>

import vLazyImage from "v-lazy-image";


const emit = defineEmits(["close"]);

const close = () => {
    emit("close");
};
</script>
<template>
    <div class="hidden sm:block flex-1 w-[300px]">
        <header class="flex items-center justify-between text-white">
            <p>Notifications</p>
        </header>
        <div class="mt-4 h-full space-y-3 overflow-auto overflow-y-auto"
            style="max-height: 89vh"
        >
            <div class="flex h-full flex-col items-center justify-center">
                <vLazyImage
                    src="/images/nothing-to-see-here-account-slideout-icon.webp"
                    alt=""
                    class="mix-blend-luminosity"
                    width="159"
                    height="166"
                />
                <p class="mt-3 text-center text-xs text-white/25">
                    When other Laracasts users mention @abey0457 or respond to
                    forum threads you've created, you'll receive a notification
                    here.
                </p>
            </div>
        </div>
    </div>
</template>
