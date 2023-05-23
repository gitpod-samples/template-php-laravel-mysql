<script setup>
import LazyImage from 'v-lazy-image'
import { ref } from 'vue';
const captionShow = ref(false);

</script>
<template>
    <div class="book-card-container h-auto">
        <div id="book-cover-container" class="book-cover-container flex-shrink-0 ">
            <!--Book Caption-->
            <div>
                <Link v-on:mouseenter="captionShow = true" v-on:mouseleave="captionShow = false" id="book-cover-anchor"
                    class="cursor-pointer transition-all duration-300 mx-auto w-full rounded-2xl overflow-y-hidden">
                    <div class="book-cover-image-container">
                        <LazyImage alt="Photo of Jack McDade" class="rounded-2xl object-cover  object-top mx-auto"
                            src="/images/book-media-grid-09.jpg" />
                    </div>
                    <!-- <div v-if="captionShow" class="mobile:hidden block">
                        <div class="book-cover-figure-caption z-20">
                            <div class="py-4 space-y-2">
                                <div>
                                    <p class=" inline-flex align-baseline space-x-2">
                                        <span class="caption-title">Book Title: </span>
                                        <span class="clamp one-line text-lg font-serif font-bold">The Golden Ages</span>
                                    </p>
                                </div>
                                <div>
                                    <p class=" inline-flex align-baseline space-x-2">
                                        <span class="caption-title">Uploaded By: </span>
                                        <span class="clamp one-line text-lg font-serif font-bold">Abebe Belete</span>
                                    </p>
                                </div>
                                <div class="flex space-x-4">
                                    <span class="caption-title">Authors: </span>
                                    <ul id="book-authors-list" class="flex space-x-2">
                                        <li>
                                            <p class=" font-light text-sm">Abey Lulseged</p>
                                        </li>
                                        <li>
                                            <p class="font-light text-sm">Abey Lulseged</p>
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <p
                                        class=" mt-2 font-poppins inline-flex align-baseline items-center gap-x-3 font-semibold text-grey-800">
                                        <span class="caption-title">ISBN 13: </span>
                                        <span class=" text-white text-base font-light">1245665841</span>
                                    </p>
                                </div>
                                <div class="fiex flex-col space-y-2">
                                    <p class="font-poppins flex items-center font-semibold text-grey-800"><span
                                            class="caption-title">Summary:</span></p>
                                    <p class="px-2 clamp three-lines mb-2 text-xs text-grey-800"> Lorem ipsum dolor sit
                                        amet
                                        consectetur
                                        adipisicing elit. Rem ea voluptates quae eius voluptatibus aliquid laboriosam,
                                        porro
                                        nesciunt
                                        doloremque, quo eum nulla quia quis itaque similique dolorum deserunt,
                                        voluptatum
                                        dicta?
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div> -->

                </Link>
            </div>


        </div>
        <div class="book-info-section -mt-[60px] pt-[80px]  py-2 px-3 ">
            <div class="mb-2 font-medium font-serif text-xs text-white">
                <span class="book-title clamp one-line">
                    The Grate gatesbi rr rrrrfsdfsfsf
                </span>
            </div>
            <!--Uploaded By-->
            <div id="book-uploader-info" class=" inline-flex space-x-2">
                <!-- <div class=" flex-shrink">
                    <div class=" grid rounded-full">
                        <LazyImage alt="Photo of Jack McDade" width="42" class=" self-center aspect-square rounded-full"
                            src="/images/book-media-grid-09.jpg" />
                    </div>
                </div> -->
                <div class="  flex flex-col space-y-1">
                    <div class=" font-medium text-gray-300 font-serif text-2xs">
                        <span class=" clamp-one one-line text-2xs">
                            Engineering and Technology
                        </span>
                    </div>
                    <div class=" flex space-x-2 font-medium font-sans text-2xs ">
                        <span class=" clamp two-lines">
                            Abey Lulseged
                        </span>
                    </div>

                </div>

            </div>
        </div>

    </div>
</template>

<style >
.book-card-container {
    width: var(--book-grid-medium, 170px);
    margin: 0 auto;
    display: block;
    /* padding: 8px; */
    margin: 0 auto;
}

@media (max-width: 680px) {
    .book-card-container {
        width: 100%;
    }
}

.book-cover-container {
    position: relative;
    width: 100%;
    /* padding: 0 8px; */
}

.caption-title {
    font-size: small;
    font-weight: 600;
    color: rgba(12, 12, 12, 0.836);
    flex-shrink: 0;
    display: contents;
    font-family: Georgia, 'Times New Roman', Times, serif;
}

#book-authors-list li p {
    padding: 3px 10px;
    border-radius: 6px;
    background-color: rgba(11, 2, 29, 0.705);
    max-width: 20rem;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;

}

.book-cover-figure-caption {
    position: absolute;
    top: 4rem;
    left: 80px;
    border-radius: 1rem;
    background-color: rgb(33, 54, 82);
    width: 450px;
    display: flex;
    flex-direction: column;
    margin: 0 auto;
    padding: 1rem;
    box-shadow: 0 0 15px 3px #0d141ae0;

}

@media (max-width: 680px) {
    .book-cover-figure-caption {
        width: 100%;
    }
}

#book-cover-anchor:hover>.book-cover-figure-caption {
    display: flex;
}

.book-title {
    font-family: "Roboto", "Arial", sans-serif;
    font-size: 1rem;
    line-height: 1.5rem;
    font-weight: 600;
}

#book-uploader-info span {
    color: #938f8fdb;
    font-size: 14px;
    font-weight: 500;
    font-family: "Roboto", "Arial", sans-serif;
}

.book-info-section {
    background: linear-gradient(to top, hsl(0, 0%, 5.9%) 30%,rgba(33, 33, 33, 0.27) 80%);
    border-radius: 0 0 20px 20px;
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
    border-bottom-right-radius: 20px;
    border-bottom-left-radius: 20px;
}


</style>
