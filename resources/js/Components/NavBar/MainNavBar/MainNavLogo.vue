
<script setup>
import {logo} from "../../../../assets/WelcomePage/index.js";

</script>
<template>
    <div
        class="has-animation mr-4 flex lg:mr-8 xl:mr-0 xl:w-1/4"
        id="header-logo-arrow"
    >
        <Link class=" flexStart" :href="route('home')">
            <img width="180"
   height="38" :src="logo" class="object-cover " />
        </Link>
    </div>
</template>
