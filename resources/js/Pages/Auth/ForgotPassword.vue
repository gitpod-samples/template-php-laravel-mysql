<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';

import PageStatus from '@/Components/PageStatus.vue';
import { mdiEmail } from "@mdi/js";

import { Head, useForm } from '@inertiajs/vue3';
import CardBox from '@/Components/Card/CardBox.vue';
import FormField from '@/Components/Form/FormField.vue';
import FormControl from '@/Components/Form/FormControl.vue';
import BaseButton from '@/Components/Base/BaseButton.vue';
import {computed, ref} from 'vue';
import useVuelidate from '@vuelidate/core';
import { required, email} from "@vuelidate/validators";


defineProps({
    errors: Object,
    status: String,
});

const forgorPasswordForm = useForm({
    email: '',
});
// Form Validation
const formRule = computed(() => {
    return {
        email: { required, email },
    };
});

const vForm$ = useVuelidate(formRule, forgorPasswordForm);
const formSubmitted = ref(false);
const submit = async () => {
    const result = await vForm$.value.$validate();
    formSubmitted.value = true;
    if (result) {
        forgorPasswordForm.post(route("password.email"), {
            onSuccess: () => {
                form.reset();
            },
        });
    }
};

</script>

<template>
    <GuestLayout v-slot="{ cardClass }" flex-direction="row">
        <Head title="Forgot Password" />
            <CardBox :class="cardClass" is-form>
                <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                    Forgot your password? No problem. Just let us know your
                    email address and we will email you a password reset link
                    that will allow you to choose a new one.
                </div>

                <PageStatus :status="status"/>
                <FormField
                    label="Email"
                    :help="errors.email"
                    :field-errors="vForm$.email.$errors"
                >
                    <FormControl
                        v-model="forgorPasswordForm.email"
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

                <template #footer>
                    <div class=" justify-center md:justify-end items-center flex w-full">
                        <BaseButton
                            @click.prevent="submit"
                            type="button"
                            color="info"
                            label="Email Password Reset Link"
                            :disabled="forgorPasswordForm.processing"
                        />
                    </div>
                </template>
            </CardBox>
        </GuestLayout>

</template>
