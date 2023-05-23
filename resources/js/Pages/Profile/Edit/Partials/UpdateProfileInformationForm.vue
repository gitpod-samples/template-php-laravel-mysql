<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Link, useForm, usePage } from "@inertiajs/vue3";

const props = defineProps({
    mustVerifyEmail: Boolean,
    status: String,
});

const user = usePage().props.auth.user;

const form = useForm({
    first_name: user.first_name,
    last_name: user.last_name,
});
</script>

<template>
    <form @submit.prevent="form.patch(route('setting.profile.update'))">
        <div class="mb-6 flex items-center">
            <h2 class="text-xl font-semibold text-white md:mr-2">
                Update Your Profile
            </h2>
        </div>
        <div class="control">
            <label
                class="block text-xs font-medium text-grey-800 dark:text-grey-600"
                for="first_name"
                >First Name:</label
            >
            <TextInput
                id="first_name"
                type="text"
                class="input is-minimal h-8 text-sm"
                v-model="form.first_name"
                required
                autofocus
                autocomplete="first_name"
            />

            <InputError class="mt-2" :message="form.errors.first_name" />
        </div>

        <div class="control">
            <label
                class="block text-xs font-medium text-grey-800 dark:text-grey-600"
                for="last_name"
                >Last Name:</label
            >

            <TextInput
                id="last_name"
                type="last_name"
                class="input is-minimal h-8 text-sm"
                v-model="form.last_name"
                required
                autocomplete="last_name"
            />

            <InputError class="mt-2" :message="form.errors.last_name" />
        </div>


        <div class="flex items-center mt-6 gap-4">
            <PrimaryButton class="btn btn-blue" :disabled="form.processing">Update Profile</PrimaryButton>

            <Transition
                enter-from-class="opacity-0"
                leave-to-class="opacity-0"
                class="transition ease-in-out"
            >
                <p v-if="form.recentlySuccessful" class="text-sm text-gray-200">
                    Profile updated successfully.
                </p>
            </Transition>
        </div>
    </form>
</template>
<style>
.control > :not([hidden]) ~ :not([hidden]) {
    --tw-space-y-reverse: 0;
    margin-top: calc(1.25rem * calc(1 - var(--tw-space-y-reverse)));
    margin-bottom: calc(1.25rem * var(--tw-space-y-reverse));
}

.control:not(:last-child) {
    margin-bottom: 1.3em;
}

input {
    width: 100%;
    max-width: 100%;
}

</style>
