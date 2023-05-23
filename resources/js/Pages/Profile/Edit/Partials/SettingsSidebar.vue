<script setup>
import SettingsSideBarLink from './SettingsSideBarLink.vue';
</script>

<template>
    <aside class=" menu">
        <img src="/images/svg/pages/setting/lary-head.svg" alt="" class="-mb-6 translate-x-1/4 -translate-y-1/2" aria-hidden="true">
            <ul
                class="hide-scrollbar flex flex-col gap-y-2 text-white lg:max-h-[80vh] lg:overflow-y-auto mobile:hidden">
                <li class="list-none">
                    <SettingsSideBarLink :href="route('setting.account')" :active="$page.component === 'Profile/Edit/Index'" title="Account" :have-bage="false" bage-value="" />
                </li>
                <li class="list-none">
                    <SettingsSideBarLink :href="route('setting.profile')" :active="$page.component === 'Profile/Edit/Profile'" title="Profile" :have-bage="false" bage-value="" />
                </li>
                <li class="list-none">
                    <SettingsSideBarLink :href="route('setting.notification')" :active="$page.component === 'Profile/Edit/Notification'" title="Notifications" :have-bage="false" bage-value="" />
                </li>
                <li class="list-none">
                    <SettingsSideBarLink :href="route('setting.status')" :active="$page.component === 'Profile/Edit/Status'" title="Status" :have-bage="false" bage-value="" />
                </li>
                <li class="list-none">
                    <SettingsSideBarLink :href="route('setting.groups')" :active="$page.component === 'Profile/Edit/Feed'" title="Feeds" :have-bage="false" bage-value="" />
                </li>

            </ul>
    </aside>
</template>
