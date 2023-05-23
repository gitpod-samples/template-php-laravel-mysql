<script setup>
import BaseIcon from "@/Components/Base/BaseIcon.vue";
import vLazyImage from "v-lazy-image";
import { computed,ref  } from "vue";
import { mdiClock, mdiEye, mdiHeart, mdiPlay } from "@mdi/js";

const props = defineProps({
    cardIs: {
        type: String,
        default: null,
    },
});
const bookHref= ref('eloquent-performance-patterns');
const baseClass = computed(() => {
    const base = [
        "book-card-lg is-incomplete flex h-[309px] w-full border-none pr-4 text-white xl:w-[370px]",
    ];
    switch (props.cardIs) {
        case "techniques":
            base.push("bg-gradient-left-techniques");
            break;
        case "languages":
            base.push("bg-gradient-left-languages");
            break;
        case "frameworks":
            base.push("bg-gradient-left-frameworks");
            break;
        case "tooling":
            base.push("bg-gradient-left-tooling");
            break;
        case "testing":
            base.push("bg-gradient-left-testing");
            break;
        default:
            base.push("bg-gradient-left-primary");
            break;
    }
    return base;
});
</script>

<template>
    <div :class="baseClass">
        <div
            class="mr-4 flex flex-shrink-0 flex-col items-center justify-between rounded-xl px-4 pt-5 pb-6 lg:mr-0"
        >
            <Link
                class="card-thumbnail relative left-0 my-4 flex translate-x-[-75%] scale-[2.5] items-center md:my-0"
                :href="route('books.show', bookHref)"
                style="top: 16%; width: 96px"
            >
                <vLazyImage
                    src="/images/svg/eloquent-performance-patterns.svg"
                    alt="Eloquent Performance Patterns thumbnail"
                    width="235"
                />
            </Link>
            <div class="w-full text-center">
                <div class="mb-2 text-2xs font-semibold text-white">
                    Advanced<br />Difficulty
                </div>
                <div
                    class="difficulty-meter mx-4 flex justify-center space-x-1 is-advanced"
                >
                    <span
                        class="inline-block h-1 w-2 flex-1 rounded bg-white"
                    ></span
                    ><span
                        class="inline-block h-1 w-2 flex-1 rounded bg-white"
                    ></span
                    ><span
                        class="inline-block h-1 w-2 flex-1 rounded bg-white"
                    ></span>
                </div>
            </div>
        </div>
        <div
            class="relative flex w-full flex-col justify-around pt-8 pb-6 pr-4 md:pt-5"
        >
            <h3
                class="link inline-flex items-start text-[22px] font-semibold leading-tight text-white lg:mt-3 lg:h-12 lg:items-center"
            >
                <Link
                    class="lg:line-clamp-2 inherits-color"
                    title="Eloquent Performance Patterns"
                    :href="route('books.show', bookHref)"
                >
                    Eloquent Performance Patterns
                </Link>
            </h3>
            <div class="generic-content mt-8 mb-auto text-xs">
                <p class="line-clamp-5">
                    In this series, you'll learn how to drastically improve the
                    performance of your Laravel applications by pushing more
                    work to the database, all while still using the Eloquent
                    ORM.This course is a culmination of everything I've learned
                    along my journey, distilled into a single course. We're
                    going to dig deep into advanced real world problems.
                </p>
            </div>
            <div
                class="series-card-meta flex items-end gap-x-4 text-2xs lg:mt-auto"
            >
                <div
                    class="flex items-center font-semibold lg:group-hover:invisible"
                >
                    <BaseIcon size="13" :path="mdiEye" />
                    <span class="no-transition">20 Views</span>
                </div>
                <div
                    class="flex items-center font-semibold lg:group-hover:invisible"
                >
                    <BaseIcon size="13" :path="mdiHeart" />
                    <span class="no-transition">20 Likes</span>
                </div>

                <div class="ml-auto lg:group-hover:invisible"></div>
            </div>
            <Link
                class="card-play-button absolute mb-1 hidden w-full max-w-xs rounded-full border border-white/25 bg-grey-400 py-2 text-sm font-bold text-black hover:border-blue hover:text-blue group-hover:translate-y-0 group-hover:opacity-100 lg:flex lg:items-center lg:justify-center"
                :href="route('books.show', bookHref)"
                style="bottom: 18px"
            >
                <BaseIcon size="15" :path="mdiPlay" />
                Play
            </Link>
        </div>
    </div>
</template>

<style>
.book-card-lg {
    --tw-bg-opacity: 1;
    background-color: rgb(255 255 255 / var(--tw-bg-opacity));
    border-color: rgba(120, 144, 156, 0.07);
    border-radius: 0.934rem;
    border-width: 1px;
    max-width: 100%;
    overflow: hidden;
    position: relative;
}

@media (min-width: 992px) {
    .card-play-button {
        opacity: 0;
        transform: translateY(15px);
        transition: opacity 0.2s, transform 0.4s, border-color 0.2s;
        transition-timing-function: ease-in-out;
        will-change: transform;
    }

    .book-card-lg:hover .card-play-button,
    .skill-card:hover .card-play-button {
        opacity: 1;
        transform: translateY(0);
    }
}
.book-card-lg {
    -webkit-mask-image: -webkit-radial-gradient(center, white, black);
    mask-image: -webkit-radial-gradient(center, white, black);
}
</style>
