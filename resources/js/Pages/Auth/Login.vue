<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import CardBox from "@/Components/Card/CardBox.vue";
import FormField from "@/Components/Form/FormField.vue";
import FormControl from "@/Components/Form/FormControl.vue";
import FormControlPassword from "@/Components/Form/FormControlPassword.vue";
import FormCheckRadio from "@/Components/Form/FormCheckRadio.vue";
import { required, email, minLength } from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";
import { computed, ref } from "vue";
import { mdiEmail, mdiKey } from "@mdi/js";
import BaseButton from "@/Components/Base/BaseButton.vue";
import vLazyImage from "v-lazy-image";
defineProps({
    canResetPassword: Boolean,
    status: String,
    errors: Object,
});

const loginForm = useForm({
    email: "",
    password: "",
    remember: false,
});
// Form Validation
const formRule = computed(() => {
    return {
        email: { required, email },
        password: { required, minLength: minLength(8) },
    };
});

const vForm$ = useVuelidate(formRule, loginForm);
const formSubmitted = ref(false);
const submit = async () => {
    const result = await vForm$.value.$validate();
    formSubmitted.value = true;
    if (result) {
        loginForm.post(route("login.store"), {
            onSuccess: () => {
                loginForm.reset("password");
            },
        });
    }
};
</script>

<template>
    <GuestLayout v-slot="{ cardClass }" flex-direction="row">
        <Head title="Log in" />
        <CardBox :class="cardClass" is-form>
            <div class=" flex flex-col justify-center items-center text-center mb-2">
                <vLazyImage
                    src="/images/svg/eloquent-performance-patterns.svg"
                    alt="Eloquent Performance Patterns thumbnail"
                    width="95"
                />
            <h2
                class="my-4 text-2xl md:text-3xl font-bold dark:text-white text-slate-800 text-center w-full"
            >
                User Login
            </h2>
            </div>


            <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                {{ status }}
            </div>
            <FormField
                label="Email"
                :help="errors.email"
                :field-errors="vForm$.email.$errors"
            >
                <FormControl
                    v-model="loginForm.email"
                    :icon="mdiEmail"
                    placeholder="Type your email adress"
                    :stat-err="vForm$.email.$errors.length || errors.email"
                    :stat-sec="
                        !errors.email &&
                        formSubmitted &&
                        vForm$.email.$errors.length === 0
                    "
                    name="email"
                />
            </FormField>
            <FormField label="Password" :field-errors="vForm$.password.$errors">
                <FormControlPassword
                    v-model="loginForm.password"
                    :icon="mdiKey"
                    :input-error="
                        vForm$.password.$errors.length || errors.email
                    "
                    name="password"
                    type="password"
                    placeholder="Password"
                    :change-type="true"
                />
            </FormField>

            <div class="flex justify-between">
                <FormCheckRadio
                    v-model="loginForm.remember"
                    type="checkbox"
                    name="remember"
                    label="Remember"
                    :input-value="false"
                />
                <Link :href="route('password.request')" class="text-sm link">
                    Forgot password?
                </Link>
            </div>

            <template #footer>
                <div class="justify-between items-center flex flex-wrap">
                    <BaseButton
                        @click.prevent="submit"
                        type="button"
                        color="info"
                        label="Login"
                        :disabled="loginForm.processing"
                    />
                    <Link
                        :href="route('register')"
                        class="inline-flex justify-center items-center whitespace-nowrap focus:outline-none transition-colors focus:ring duration-150 border cursor-pointer rounded border-blue-600 dark:border-blue-500 ring-blue-300 dark:ring-blue-700 text-blue-600 dark:text-blue-500 hover:bg-blue-600 hover:text-white hover:dark:text-white hover:dark:border-blue-600 py-2 px-3 mr-3 last:mr-0"
                    >
                        <span class="px-2">Sign up</span>
                    </Link>
                </div>
            </template>
        </CardBox>
    </GuestLayout>
</template>
