<script setup>

</script>
<template>
    <div class=" mb-2  py-4 flex flex-wrap justify-center gap-x-4 md:justify-between">
        <div class="flex flex-1 gap-x-4">
            <div class="md:hidden">
                <div class="select-wrap">
                    <select
                        class="flex cursor-pointer items-center rounded-full bg-blue/13 px-5 py-3 text-xs leading-none"
                        style="width: 111px;">
                        <option value="">Latest</option>
                        <option value="/channels">
                            Discussion Channels</option>
                        <option value="?trending=1">
                            Popular This Week</option>
                        <option value="?popular=1">
                            Popular All Time</option>

                    </select><svg class="fill-current text-grey-600" height="16" viewBox="0 0 10 16" width="20">
                        <path d="M5 11L0 6l1.5-1.5L5 8.25 8.5 4.5 10 6z"></path>
                    </svg>
                </div>
            </div>
            <div>
                <div class="select-wrap">
                    <select class="cursor-pointer rounded-full bg-blue/13 px-5 text-xs text-grey-600">
                        <option value="all">All</option>
                        <option value="all">Engineering
                        </option>
                    </select>
                    <svg class="fill-current text-grey-600" height="16" viewBox="0 0 10 16" width="20">
                        <path d="M5 11L0 6l1.5-1.5L5 8.25 8.5 4.5 10 6z"></path>
                    </svg>
                </div>
            </div>
        </div>
        <!---->
        <div class="hidden gap-x-3 md:flex md:items-center">
            <button class="not-expert-toggle forum-excerpt-toggle bg-blue/4">
                <svg class="mx-2" height="15" viewBox="0 0 15 15" width="15">
                    <g class="forum-excerpt-toggle-lines fill-current text-grey-600" fill-rule="evenodd">
                        <rect class="forum-excerpt-toggle-line" height="6" rx="2" width="15"></rect>
                        <rect class="forum-excerpt-toggle-line" height="6" rx="2" width="15" y="9"></rect>
                    </g>
                </svg>
            </button>
            <button class="expert-toggle is-active forum-excerpt-toggle bg-blue/10 hover:bg-blue/10" disabled><svg
                    class="mx-2" height="15" viewBox="0 0 15 15" width="15">
                    <g class="forum-excerpt-toggle-lines fill-current text-grey-600" fill-rule="evenodd">
                        <rect class="forum-excerpt-toggle-line" height="4" rx="2" width="15"></rect>
                        <rect class="forum-excerpt-toggle-line" height="4" rx="2" width="8" y="11"></rect>
                        <rect class="forum-excerpt-toggle-line" height="4" rx="2" width="15" y="5.5"></rect>
                    </g>
                </svg>
            </button>
        </div>
        <form action="https://laracasts.com/discuss" autocomplete="off"
            class="search-form mt-5 flex h-[40px] w-full rounded-full bg-blue/13 md:mt-0 md:w-52">
            <label class="flex px-4" for="q">
                <svg class="text-grey-800 dark:text-grey-600" viewBox="0 0 15 15" width="16">
                    <g fill-rule="evenodd" fill="none">
                        <path d="M-2-2h20v20H-2z"></path>
                        <path class="fill-current"
                            d="M10.443 9.232h-.638l-.226-.218A5.223 5.223 0 0 0 10.846 5.6 5.247 5.247 0 1 0 5.6 10.846c1.3 0 2.494-.476 3.414-1.267l.218.226v.638l4.036 4.028 1.203-1.203-4.028-4.036zm-4.843 0A3.627 3.627 0 0 1 1.967 5.6 3.627 3.627 0 0 1 5.6 1.967 3.627 3.627 0 0 1 9.232 5.6 3.627 3.627 0 0 1 5.6 9.232z">
                        </path>
                    </g>
                </svg>
                <input class=" focus:border-0 focus:ring-offset-0 ml-3 h-full w-full pt-0 text-xs dark:text-grey-600 dark:placeholder:text-grey-600" id="q"
                    name="q" placeholder="Begin your search...">
            </label>
        </form>
    </div>
</template>
<style scoped>
.select-wrap {
    position: relative
}

.select-wrap select {
    -webkit-appearance: none;
    height: 40px;
    padding-right: 50px;
    background-image: none;
}

.select-wrap svg {
    pointer-events: none;
    position: absolute;
    right: 20px;
    top: 13px
}
.select-wrap option{
    @apply  text-grey-800 dark:bg-blue-1000 dark:text-grey-600;
    @layer bg-grey-400
}
input[name=q]:focus::-moz-placeholder {
    opacity: .1
}

input[name=q]:focus:-ms-input-placeholder {
    opacity: .1
}

input[name=q]:focus::placeholder {
    opacity: .1
}

</style>
