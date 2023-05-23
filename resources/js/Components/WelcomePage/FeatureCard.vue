<script setup>
defineProps({
    lastItem: Boolean,
    item: {
        type: Object,
        required: true,
    },
});
</script>
<template>
    <div id="about_feature_payment" class="feature">
        <a :href="route('about.index')">
            <div class="about_feature_icon">
                <img :src="item.icon" />
            </div>
            <div class="about_feature_content">
                <h3 class="feature_title">{{ item.title }}</h3>
                <div class="feature_text">
                    {{ item.content }}
                </div>
                <div class="feature_btn">Learn More</div>
            </div>
        </a>
    </div>
</template>
