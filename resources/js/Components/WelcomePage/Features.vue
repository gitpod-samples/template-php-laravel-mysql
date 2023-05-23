<script setup>
import { iconWorkshop } from "../../../assets/WelcomePage/index.js";
import FeatureCard from "./FeatureCard.vue";
defineProps({
    features: Object,
});
</script>
<template>
    <div class="about_area_inner_wrapper relative">
    <div class="bg_gradient z-0  right-[50%] -left-[50%] -top-[50%] bottom-0 rounded-full blue__gradient " ></div>

        <div id="features" class="text-center">
            <h1 id="about_steam_feature_title">Features</h1>
            <div id="about_steam_feature_subtitle">
                We are constantly working to bring new updates and features to
                BHUDiL, such as:
            </div>
            <div id="about_steam_features_grid" class="features_grid relative z-5">

                <FeatureCard
                    v-for="(feature, index) in features"
                    :item="feature"
                    :key="feature.id"
                    :last-item="index !== features.length - 1"
                />
            </div>

        </div>
    </div>
</template>

