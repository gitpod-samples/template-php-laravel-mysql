<script setup>
import BookCardLg from "@/Components/Card/BookCard/BookCardLg.vue";
import BookCardSm from "@/Components/Card/BookCard/BookCardSm.vue";
</script>

<template>
    <section class="!max-w-none md:pt-[20px] md:pb-[35px]">
        <div class="featured-series mx-auto overflow-hidden">
            <div
                class="mb-4 flex justify-center text-center md:mx-auto md:w-2/3 xl:w-1/2"
            >
                <header
                    class="container mx-auto mb-4 max-w-[650px] pb-4 text-center text-white"
                >
                    <h3
                        class="inherits-color text-5xl font-medium leading-tight relative z-10"
                    >
                        A stream of endless knowledge.
                    </h3>
                    <p class="inherits-color font-medium mt-4">
                        There's no shortage of content at BHUDiL. Push your skills to the next level, through discussion and reading and so much more.
                    </p>
                </header>
            </div>
            <div
                class="mx-auto md:flex md:justify-center md:gap-5 mt-4"
                style="max-width: 1350px"
            >
                <div
                    class="mb-4 flex flex-1 flex-col gap-4 md:mb-0 lg:max-w-[370px]"
                >
                    <div class="flex gap-4">
                        <BookCardSm card-is="tooling" size="sm" />
                        <BookCardSm card-is="tooling" size="sm" />
                    </div>
                    <div class="group relative flex-1">
                        <BookCardLg card-is="frameworks" />
                    </div>
                    <div class="group relative flex-1">
                        <BookCardLg card-is="testing" />
                    </div>
                </div>
                <div class="flex flex-1 flex-col gap-4 lg:max-w-[370px]">
                    <BookCardSm card-is="tooling" size="md" />

                    <div
                        class="flex flex-col justify-between gap-4"
                        style="height: 309px"
                    >
                        <BookCardSm card-is="tooling" size="md" />

                        <div class="flex gap-4">
                            <BookCardSm card-is="tooling" size="sm" />
                            <BookCardSm card-is="language" size="sm" />
                        </div>
                    </div>
                    <div class="group relative flex-1">
                        <BookCardLg card-is="testing" />
                    </div>
                </div>
                <div
                    class="hidden flex-1 flex-col gap-4 xl:flex xl:max-w-[370px] widescreen:hidden"
                >
                    <div class="group relative flex-1">
                        <BookCardLg card-is="language" />
                    </div>
                    <div class="group relative flex-1">
                        <BookCardLg card-is="testing" />
                    </div>
                    <div class="flex gap-4">
                        <BookCardSm card-is="tooling" size="sm" />
                        <BookCardSm card-is="tooling" size="sm" />
                    </div>
                </div>
                <div
                    class="hidden flex-1 flex-col gap-4 widescreen:flex widescreen:max-w-[550px]"
                >
                    <div class="flex gap-4">
                        <div class="group relative flex-1">
                            <BookCardLg card-is="testing" />
                        </div>
                        <div class="flex flex-col gap-4">
                            <BookCardSm card-is="tooling" size="sm" />
                            <BookCardSm card-is="tooling" size="sm" />
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="group relative flex-1">
                            <BookCardLg card-is="testing" />
                        </div>
                        <div class="flex flex-col gap-4">
                            <BookCardSm card-is="tooling" size="sm" />
                            <BookCardSm card-is="tooling" size="sm" />
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <BookCardSm card-is="tooling" size="sm" />
                        <BookCardSm card-is="tooling" size="md" />
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
