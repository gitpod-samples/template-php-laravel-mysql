<script setup>
import { computed, ref, onMounted } from "vue";
import {
    mdiAccount,
    mdiAccountBadge,
    mdiAccountMultiple,
    mdiMonitorCellphone,
} from "@mdi/js";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import SectionMain from "@/Components/Section/SectionMain.vue";
import SectionTitleLineWithButton from "@/Components/Section/SectionTitleLineWithButton.vue";
import CardBox from "@/Components/Card/CardBox.vue";
import UserTypesTable from "@/Components/Admin/Tables/UserTypesTable.vue";
import { Head, useForm } from "@inertiajs/vue3";

import FormField from "@/Components/Form/FormField.vue";
import FormControl from "@/Components/Form/FormControl.vue";
import BaseButton from "@/Components/Base/BaseButton.vue";
import FormStatusNotification from "@/Components/FormStatusNotification.vue";

defineProps({
    userTypes: Object,
    errors: Object,
});

const userTypeForm = useForm({
    name: "",
    guard_name: "web",
});

const formSubmitted = ref(false);
const formSuccess = ref(false);

const submitUserTypeForm = () => {
    formSubmitted.value = true
    userTypeForm.post(route("admin.user-types.store"), {
            onSuccess: () => {
                formSuccess.value = true;
                setTimeout(()=>{
                    formSuccess.value = false;
                },5000);
                userTypeForm.reset();
                formSubmitted.value = false;
            },

        });
};
</script>

<template>
    <AdminLayout>
        <Head title="User Types" />

        <SectionMain>

            <SectionTitleLineWithButton main
                :icon="mdiAccountMultiple"
                title="User Types">

            </SectionTitleLineWithButton>
            <Transition name="form-statuss">
                <FormStatusNotification v-if="formSuccess"  :icon="mdiAccountBadge" color="success" >
                <span class=" text-lg">
                    User type added successfully!!
                </span>
            </FormStatusNotification>
            </Transition>


            <CardBox
                class=" w-full shadow-2xl md:mx-auto"
                is-form
                is-hoverable
            >
                <div class="flex flex-wrap justify-between">
                    <FormField
                        label="User Type Name"
                        :help="errors.name"
                    >
                        <FormControl
                            v-model="userTypeForm.name"
                            :icon="mdiAccountBadge"
                            placeholder="User Type"
                            :stat-err=" formSubmitted && errors.name !==''"
                            :stat-sec=" errors.name ==='' && formSubmitted "
                            name="name"
                        />
                    </FormField>
                    <FormField
                        label="Gurd Name"
                        :help="errors.guard_name"
                    >
                        <FormControl
                        disabled
                            v-model="userTypeForm.guard_name"
                            :icon="mdiAccountBadge"
                            placeholder="User Type"
                            :stat-err="errors.guard_name !=='' && formSubmitted"
                            :stat-sec=" errors.guard_name === '' && formSubmitted "
                            name="guard_name"
                        />
                    </FormField>
                    <div class="flex-grow-0 self-center">
                        <BaseButton
                            @click.prevent="submitUserTypeForm"
                            type="button"
                            color="success"
                            label="Add"
                            :disabled="userTypeForm.processing"
                        />
                    </div>
                </div>
            </CardBox>
            <SectionTitleLineWithButton
                :icon="mdiAccountMultiple"
                title="User Type List"
            />


            <CardBox has-table>
                <UserTypesTable :errors="errors" :checkable="true" :userTypes="userTypes" />
            </CardBox>
        </SectionMain>
    </AdminLayout>
</template>

