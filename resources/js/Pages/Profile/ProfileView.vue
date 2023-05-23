<script setup>
import { reactive } from "vue";
import { useMainStore } from "@/stores/main";
import {
    mdiAccount,
    mdiMail,
    mdiAsterisk,
    mdiFormTextboxPassword,
    mdiGithub,
    mdiCloudLock,
    mdiCogOutline,
} from "@mdi/js";
import SectionMain from "@/Components/Section/SectionMain.vue";
import CardBox from "@/Components/Card/CardBox.vue";
import LayoutAuthenticated from "@/Layouts/AuthenticatedLayout.vue";
import BaseDivider from "@/Components/Base/BaseDivider.vue";
import SectionTitleLineWithButton from "@/Components/Section/SectionTitleLineWithButton.vue";
import BaseButton from "@/Components/Base/BaseButton.vue";
import UserCard from "@/Components/UserCard.vue";
import FormField from "@/Components/Form/FormField.vue";
import FormFilePicker from "@/Components/Form/FormFilePicker.vue";
import FormControl from "@/Components/Form/FormControl.vue";
import BaseButtons from "@/Components/Base/BaseButtons.vue";
import FormCheckRadioGroup from "@/Components/Form/FormCheckRadioGroup.vue";
import {Head} from "@inertiajs/vue3";

const props = defineProps({
    user: Object
})
const mainStore = useMainStore();

const profileForm = reactive({
    name: props.username,
    email: props.email,
});

const passwordForm = reactive({
    password_current: "",
    password: "",
    password_confirmation: "",
});

const customElementsForm = reactive({
  checkbox: ["lorem"],
  radio: "one",
  switch: ["one"],
  file: null,
});



const submitProfile = () => {
    mainStore.setUser(profileForm);
};

const submitPass = () => {
    //
};
</script>

<template>
    <Head title="All Books" />
    <LayoutAuthenticated>
        <SectionMain>
            <SectionTitleLineWithButton :icon="mdiAccount" title="Profile" main>
                <BaseButton
                    href="https://github.com/justboil/admin-one-vue-tailwind"
                    target="_blank"
                    :icon="mdiGithub"
                    label="Star on GitHub"
                    color="contrast"
                    rounded-full
                    small
                />
            </SectionTitleLineWithButton>

            <UserCard :username="user.name" class="mb-6" />

            <SectionTitleLineWithButton
                :icon="mdiCloudLock"
                title="Security options"
            >
                <BaseButton
                    href="https://github.com/justboil/admin-one-vue-tailwind"
                    target="_blank"
                    :icon="mdiCogOutline"
                    color="contrast"
                    rounded-full
                    small
                />
            </SectionTitleLineWithButton>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <CardBox is-form @submit.prevent="submitProfile">
                    <FormField label="Avatar" help="Max 500kb">
                        <FormFilePicker label="Upload" />
                    </FormField>

                    <FormField label="Name" help="Required. Your name">
                        <FormControl
                            v-model="profileForm.name"
                            :icon="mdiAccount"
                            name="username"
                            required
                            autocomplete="username"
                        />
                    </FormField>
                    <FormField label="E-mail" help="Required. Your e-mail">
                        <FormControl
                            v-model="profileForm.email"
                            :icon="mdiMail"
                            type="email"
                            name="email"
                            required
                            autocomplete="email"
                        />
                    </FormField>

                    <template #footer>
                        <BaseButtons>
                            <BaseButton
                                color="info"
                                type="submit"
                                label="Submit"
                            />
                            <BaseButton color="info" label="Options" outline />
                        </BaseButtons>
                    </template>
                </CardBox>

                <CardBox is-form @submit.prevent="submitPass">
                    <FormField
                        label="Current password"
                        help="Required. Your current password"
                    >
                        <FormControl
                            v-model="passwordForm.password_current"
                            :icon="mdiAsterisk"
                            name="password_current"
                            type="password"
                            required
                            autocomplete="current-password"
                        />
                    </FormField>

                    <BaseDivider />

                    <FormField
                        label="New password"
                        help="Required. New password"
                    >
                        <FormControl
                            v-model="passwordForm.password"
                            :icon="mdiFormTextboxPassword"
                            name="password"
                            type="password"
                            required
                            autocomplete="new-password"
                        />
                    </FormField>

                    <FormField
                        label="Confirm password"
                        help="Required. New password one more time"
                    >
                        <FormControl
                            v-model="passwordForm.password_confirmation"
                            :icon="mdiFormTextboxPassword"
                            name="password_confirmation"
                            type="password"
                            required
                            autocomplete="new-password"
                        />
                    </FormField>

                    <template #footer>
                        <BaseButtons>
                            <BaseButton
                            href="#0"
                                type="submit"
                                color="info"
                                label="Submit"
                            />
                            <BaseButton color="info" label="Options" outline />
                        </BaseButtons>
                    </template>
                </CardBox>
            </div>
        </SectionMain>
        <SectionMain>
            <CardBox>
                <FormField label="Checkbox">
                    <FormCheckRadioGroup
                        v-model="customElementsForm.checkbox"
                        name="sample-checkbox"
                        :options="{
                            lorem: 'Lorem',
                            ipsum: 'Ipsum',
                            dolore: 'Dolore',
                        }"
                    />
                </FormField>

                <BaseDivider />

                <FormField label="Radio">
                    <FormCheckRadioGroup
                        v-model="customElementsForm.radio"
                        name="sample-radio"
                        type="radio"
                        :options="{ one: 'One', two: 'Two' }"
                    />
                </FormField>
                <BaseDivider />

                <FormField label="Switch">
                    <FormCheckRadioGroup
                        v-model="customElementsForm.switch"
                        name="sample-switch"
                        type="switch"
                        :options="{ one: 'One', two: 'Two' }"
                    />
                </FormField>

                <BaseDivider />

                <FormFilePicker
                    v-model="customElementsForm.file"
                    label="Upload"
                />
            </CardBox>
        </SectionMain>
    </LayoutAuthenticated>
</template>
