<script setup>
import BookSideBarLink from './BookSideBarLink.vue';


</script>

<template>
    <aside class=" ml-4  hidden flex-none lg:sticky lg:block lg:self-start"
        style="width: 190px; top:40px; margin-top: 40px;">
        <div class=" lg:sticky lg:text-center">
            <ul
                class="hide-scrollbar flex flex-col gap-y-2 text-white lg:max-h-[80vh] lg:overflow-y-auto mobile:hidden">
                <li class="list-none">
                    <BookSideBarLink href="#0" :active="true" title="All Books" :have-bage="false" bage-value="" />
                </li>
                <li class="list-none">
                    <BookSideBarLink href="#0" :active="false" title="My Books" :have-bage="true" bage-value="20" />
                </li>
                <li class="list-none">
                    <BookSideBarLink href="#0" :active="false" title="My Favorite Books" :have-bage="false" bage-value="" />
                </li>
                <li class="list-none">
                    <BookSideBarLink href="#0" :active="false" title="Popular This Week" :have-bage="false" bage-value="" />
                </li>
                <li class="list-none">
                    <BookSideBarLink href="#0" :active="false" title="Popular All Time" :have-bage="false" bage-value="" />
                </li>
                <li class="list-none">
                    <BookSideBarLink href="#0" :active="false" title="Pined" :have-bage="false" bage-value="" />
                </li>

            </ul>
        </div>
    </aside>
</template>
