<script setup>
import SlideInModal from '../SlideInOutModal.vue';
import settingMenu from '@/Data/menusNavBar';
import SettingsMenuModalNav from './SettingsMenuModalNav.vue';

const emit = defineEmits(['close']);

defineProps({
    show: {
        type: Boolean,
        default: false,
    },
    maxWidth: {
        type: String,
        default: '2xl',
    },
    closeable: {
        type: Boolean,
        default: true,
    },
});

const close = () => {
    emit('close');
};
</script>
<template>
    <SlideInModal slide-direction="left"  :show="show"  :closeable="closeable" @close="close">
        <section class="h-full w-full bg-blue-gradient-radial">
            <div class="flex mx-auto hide-scrollbar h-full flex-col  overflow-y-auto px-4">
                <div class="w-full flex-1 md:px-10">
                    <SettingsMenuModalNav :menu="settingMenu" />
                </div>
            </div>
        </section>

    </SlideInModal>
</template>
