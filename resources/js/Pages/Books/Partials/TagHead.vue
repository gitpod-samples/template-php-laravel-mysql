<script setup>

</script>

<template>

    <div class=" flex-1 basis-[.0000001px]">
        <div class="flex items-center">
            <div id="tag-header" class=" relative flex max-w-7xl w-full h-[56px] ">
                <div id="left-arrow" class="left-arrow-container bg-blue-900 absolute  ">
                    <div class="flex h-full">
                        <button class=" inline-block" aria-label="Previous">
                            <div class="yt-spec-button-shape-next__icon" aria-hidden="true">
                                <div class="yt-icon-container" style="width: 24px; height: 24px;">
                                    <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false"
                                        style="pointer-events: none; display: block; width: 100%; height: 100%;"
                                        class="style-scope yt-icon">
                                        <g mirror-in-rtl="" class="style-scope yt-icon">
                                            <path d="M14.6,18.4L8.3,12l6.4-6.4l0.7,0.7L9.7,12l5.6,5.6L14.6,18.4z"
                                                class="style-scope yt-icon">
                                            </path>
                                        </g>
                                    </svg>
                                </div>
                            </div>

                        </button>
                    </div>
                </div>
                <div id="tag-container" class=" overflow-x-auto  hide-scrollbar book-filter-chip-bar-renderer bg-blue-1000/50 w-full">
                    <div id="chip" class="book-fillter-chip">
                        <span id="text" class="book-chip-text">
                            Abebe Beso Bela dsadsasdads
                        </span>
                    </div>
                    <div id="chip" class="book-fillter-chip">
                        <span id="text" class="book-chip-text">
                            Abebe
                        </span>
                    </div>
                    <div id="chip" class="book-fillter-chip">
                        <span id="text" class="book-chip-text">
                            Abebe Beso Bela dsadsasdads
                        </span>
                    </div>
                    <div id="chip" class="book-fillter-chip">
                        <span id="text" class="book-chip-text">
                            Abebe
                        </span>
                    </div>
                    <div id="chip" class="book-fillter-chip">
                        <span id="text" class="book-chip-text">
                            Abebe Beso Bela dsadsasdads
                        </span>
                    </div>
                    <div id="chip" class="book-fillter-chip">
                        <span id="text" class="book-chip-text">
                            Abebe
                        </span>
                    </div>
                    <div id="chip" class="book-fillter-chip">
                        <span id="text" class="book-chip-text">
                            Abebe Beso Bela dsadsasdads
                        </span>
                    </div>
                    <div id="chip" class="book-fillter-chip">
                        <span id="text" class="book-chip-text">
                            Abebe
                        </span>
                    </div>
                    <div id="chip" class="book-fillter-chip">
                        <span id="text" class="book-chip-text">
                            Abebe Beso Bela dsadsasdads
                        </span>
                    </div>
                    <div id="chip" class="book-fillter-chip">
                        <span id="text" class="book-chip-text">
                            Abebe
                        </span>
                    </div>

                </div>
                <div id="right-arrow" class=" right-arrow-container bg-blue-900 absolute ">
                    <div class="flex h-full">
                        <button class=" inline-block" aria-label="Previous">
                            <div class="yt-spec-button-shape-next__icon" aria-hidden="true">
                                <div class="yt-icon-container" style="width: 24px; height: 24px;">
                                    <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false"
                                        style="pointer-events: none; display: block; width: 100%; height: 100%;"
                                        class="style-scope yt-icon rotate-180">
                                        <g mirror-in-rtl="" class="style-scope yt-icon">
                                            <path d="M14.6,18.4L8.3,12l6.4-6.4l0.7,0.7L9.7,12l5.6,5.6L14.6,18.4z"
                                                class="style-scope yt-icon">
                                            </path>
                                        </g>
                                    </svg>
                                </div>
                            </div>

                        </button>
                    </div>
                </div>
            </div>



        </div>
    </div>
</template>

<style>
#left-arrow.left-arrow-container,
#right-arrow.right-arrow-container {
    height: 56px;
    width: 32px;
    display: flexbox;
    display: flex;
    align-items: center;
    justify-content: center;
    text-transform: uppercase;
    vertical-align: middle;
    position: absolute;
    z-index: 10;
}

.right-arrow-container {

    right: 0;
}

.left-arrow-container {

    left: 0;
}
.yt-icon-container {
    display: inline-flexbox;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    position: relative;
    vertical-align: middle;
    fill: currentcolor;
    stroke: none;
    width: 24px;
    height: 24px;
    animation: ease-in-out 300ms;
}

.yt-icon-container svg {
    fill: currentColor;
    stroke: none;
}


#tag-container.book-filter-chip-bar-renderer {
    transition-duration: 0.15s;
    transition-timing-function: cubic-bezier(0.05, 0, 0, 1);
    will-change: transform;
    display: inline-block;
    white-space: nowrap;
}

#text.book-chip-text {
    max-width: 10rem;
    display: block;
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
}

#tag-container.book-filter-chip-bar-renderer .book-fillter-chip:first-of-type {
    margin-left: 24px;
}

.book-fillter-chip {
    margin: 12px;
    border-radius: 8px;
    border: none;
    background-color: rgba(255, 255, 255, 0.1);
    color: var(--yt-spec-text-primary);
    padding: 0 var(--ytd-margin-3x);
    transition: background-color 0.5s cubic-bezier(0.05, 0, 0, 1);
    white-space: nowrap;
}

.book-fillter-chip {
    height: 32px;
    min-width: 12px;
    padding: 0 10px;
    border-radius: 16px;
    box-sizing: border-box;
    outline: none;
    overflow: hidden;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    position: relative;
    display: flex;
    flex-direction: row;
    align-items: center;
    display: inline-flex;
    font-size: 1rem;
    font-weight: 400;
    line-height: 2.1rem;
    letter-spacing: normal;
    font-family: Roboto, Arial, sans-serif;

}

.search-form input {
    background: 0 0
}

.forum-excerpt-toggle {
    align-items: center;
    border-radius: .5rem;
    cursor: pointer;
    display: flex;
    padding-bottom: .5rem;
    padding-top: .5rem
}

.forum-excerpt-toggle.is-active .forum-excerpt-toggle-lines,
.forum-excerpt-toggle.is-active .forum-excerpt-toggle-lines .forum-excerpt-toggle-line,
.forum-excerpt-toggle:hover .forum-excerpt-toggle-lines,
.forum-excerpt-toggle:hover .forum-excerpt-toggle-lines .forum-excerpt-toggle-line {
    opacity: 1
}

.forum-excerpt-toggle .forum-excerpt-toggle-lines {
    opacity: .402
}

.forum-excerpt-toggle .forum-excerpt-toggle-lines .forum-excerpt-toggle-line {
    opacity: .5
}
</style>
