<script setup>
import vLazyImage from "v-lazy-image";
import {
    cta_community,

} from "../../../assets/WelcomePage/index.js";
import {ref} from 'vue';

const members=ref('1000')

</script>
<template>
    <section id="communities" class="sectionHome relative z-5">
        <div class="sectionInfo">
            <h2 class="heading2">
                Join the <br class="hsm:block hidden" />
                Community.
            </h2>
            <p class="max-w-[470px] mt-5 paragraph">
                Meet new people, join groups, form clans, chat and more!
                With over {{ members }} potential friends , the fun
                never stops.
            </p>
            <div class="cta_btn">
                <a :href="route('discuss.index')"> Visit the Community </a>
            </div>
        </div>

        <div class="sectionImg">
            <div class="relative">
                <vLazyImage
                    id="hero_community"
                    class="hero_complete"
                    :src="cta_community"
                />
            </div>
        </div>
    </section>
</template>
