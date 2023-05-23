<script setup>
import SkillCard from "@/Components/Card/SkillCard.vue";
import vLazyImage from "v-lazy-image";
</script>
<template>
    <section id="home-skills" class="hidden md:block lg:mb-8">
        <div class="container">
            <div class="home-skill-bg absolute inset-0 hidden w-full lg:block"
            ></div>
            <vLazyImage
                src="/images/svg/light-lines.svg"
                class="absolute hidden top-[100px] w-[82%] lext-[9%] opacity-75 lg:inline-block"
            />
            <div
                class="flex flex-wrap justify-center gap-10 lg:flex-nowrap xl:justify-between"
            >
                <SkillCard card-is="frameworks" />
                <SkillCard card-is="languages" />
                <SkillCard card-is="techniques" />
                <SkillCard card-is="testing" />
                <SkillCard card-is="tooling" />
            </div>
        </div>
    </section>
</template>

<style>
.home-skill-bg {
    height: 700px;
    background: linear-gradient(transparent, rgb(29, 46, 74) 80%, transparent);
}
</style>
