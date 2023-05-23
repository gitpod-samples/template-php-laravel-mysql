<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";

const passwordInput = ref(null);
const currentPasswordInput = ref(null);

const form = useForm({
    current_password: "",
    password: "",
    password_confirmation: "",
});

const updatePassword = () => {
    form.put(route("password.update"), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.password) {
                form.reset("password", "password_confirmation");
                passwordInput.value.focus();
            }
            if (form.errors.current_password) {
                form.reset("current_password");
                currentPasswordInput.value.focus();
            }
        },
    });
};
</script>

<template>
    <form @submit.prevent="updatePassword">
        <div class="mb-6 flex items-center">
            <h2 class="text-xl font-semibold text-white md:mr-2">
                Update Password
            </h2>
        </div>
        <div class="control">
            <label
                class="block text-xs font-medium text-grey-800 dark:text-grey-600"
                for="current_password"
            >
                Current Password:
            </label>
            <TextInput
                id="current_password"
                ref="currentPasswordInput"
                v-model="form.current_password"
                type="password"
                class="input is-minimal h-8 text-sm"
                autocomplete="current-password"
            />

            <InputError :message="form.errors.current_password" class="mt-2" />
        </div>

        <div>
            <label
                class="block text-xs font-medium text-grey-800 dark:text-grey-600"
                for="password"
            >
                New Password:
            </label>
            <TextInput
                id="password"
                ref="passwordInput"
                v-model="form.password"
                type="password"
                class="input is-minimal h-8 text-sm"
                autocomplete="new-password"
            />

            <InputError :message="form.errors.password" class="mt-2" />
        </div>

        <div>
            <label
                class="block text-xs font-medium text-grey-800 dark:text-grey-600"
                for="password_confirmation"
            >
                Confirm Password:
            </label>
            <TextInput
                id="password_confirmation"
                v-model="form.password_confirmation"
                type="password"
                class="input is-minimal h-8 text-sm"
                autocomplete="new-password"
            />
            <InputError
                :message="form.errors.password_confirmation"
                class="mt-2"
            />
        </div>

        <div class="flex items-center mt-6 gap-4">
            <PrimaryButton class="btn btn-blue" :disabled="form.processing"
                >Update Password</PrimaryButton
            >

            <Transition
                enter-from-class="opacity-0"
                leave-to-class="opacity-0"
                class="transition ease-in-out"
            >
                <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">
                    Password updated successfully.
                </p>
            </Transition>
        </div>
    </form>
</template>
