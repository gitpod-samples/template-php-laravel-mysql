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
    username: user.username,
    email: user.email,
});
</script>

<template>
    <form @submit.prevent="form.patch(route('setting.account.update'))">
        <div class="mb-6 flex items-center">
            <h2 class="text-xl font-semibold text-white md:mr-2">
                Update Your Account
            </h2>
        </div>
        <div class="control">
            <label
                class="block text-xs font-medium text-grey-800 dark:text-grey-600"
                for="username"
                >Username:</label
            >
            <TextInput
                id="username"
                type="text"
                class="input is-minimal h-8 text-sm"
                v-model="form.username"
                required
                autofocus
                autocomplete="username"
            />

            <InputError class="mt-2" :message="form.errors.username" />
        </div>

        <div>
            <label
                class="block text-xs font-medium text-grey-800 dark:text-grey-600"
                for="email"
                >Email:</label
            >

            <TextInput
                id="email"
                type="email"
                class="input is-minimal h-8 text-sm"
                v-model="form.email"
                required
                autocomplete="email"
            />

            <InputError class="mt-2" :message="form.errors.email" />
        </div>

        <div v-if="props.mustVerifyEmail && user.email_verified_at === null">
            <p class="text-sm mt-2 text-gray-800">
                Your email address is unverified.
                <Link
                    :href="route('verification.send')"
                    method="post"
                    as="button"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Click here to re-send the verification email.
                </Link>
            </p>

            <div
                v-show="props.status === 'verification-link-sent'"
                class="mt-2 font-medium text-sm text-green-600"
            >
                A new verification link has been sent to your email address.
            </div>
        </div>

        <div class="flex items-center mt-6 gap-4">
            <PrimaryButton class="btn btn-blue" :disabled="form.processing">Update Account</PrimaryButton>

            <Transition
                enter-from-class="opacity-0"
                leave-to-class="opacity-0"
                class="transition ease-in-out"
            >
                <p v-if="form.recentlySuccessful" class="text-sm text-gray-200">
                    Account updated successfully.
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
