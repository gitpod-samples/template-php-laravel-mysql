<script setup>
import PagesLayout from '@/Layouts/AuthenticatedLayout.vue';
import BooksSidebar from './Partials/BooksSidebar.vue';
import TagHead from './Partials/TagHead.vue';
import BookFilter from './Partials/BookFilter.vue';
import BookCardMD from './Partials/BookCardMD.vue';
import { Head } from "@inertiajs/vue3";

</script>
<template>
    <Head title="All Books" />
    <PagesLayout>
        <div class="wrapper dark dark:text-white" id="forum">
            <div class="mx-auto px-4 py-4 max-w-[1700px] md:px-2 md:pt-8">
                <div>
                    <div class="mx-auto flex flex-col justify-between md:flex-row lg:gap-x-10" id="forum-wrapper"
                        style="max-width: 1500px;">

                        <BooksSidebar />
                        <div class=" px-4 forum-main xl:max-w-auto  mx-auto w-full md:flex-1 overflow-x-auto"
                            id="forum-main">
                            <div class="text-white">
                                <!-- filter-->
                                <BookFilter />
                                <!-- Tag list-->
                                <!-- <TagHead /> -->

                                <div class=" bg  flex flex-col justify-start py-4 px-2 w-full">
                                    <div class="container">
                                        <div class="mx-auto max-w-[1500px]">
                                            <div class="book-collection-grid">
                                                <BookCardMD />
                                                <BookCardMD />
                                                <BookCardMD />
                                                <BookCardMD />
                                                <BookCardMD />

                                            </div>

                                        </div>

                                    </div>
                                </div>


                                <!---->

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!---->
        </div>
    </PagesLayout>
</template>
<style>
:root {
    --book-grid-small: 100px;
    --book-grid-medium: 170px;
    --book-grid-large: 500px;
}

.book-collection-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(var(--book-grid-medium), 1fr));
    gap: 10px;
    /* overflow-x: scroll; */
    max-width: 100%;
}
</style>
