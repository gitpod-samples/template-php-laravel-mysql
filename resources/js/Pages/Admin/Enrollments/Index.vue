<script setup>
import { computed, ref, onMounted } from "vue";
import {
    mdiAccountBadge,
    mdiAccountMultiple,
} from "@mdi/js";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import SectionMain from "@/Components/Section/SectionMain.vue";
import SectionTitleLineWithButton from "@/Components/Section/SectionTitleLineWithButton.vue";
import CardBox from "@/Components/Card/CardBox.vue";
import { Head, useForm } from "@inertiajs/vue3";
import FormField from "@/Components/Form/FormField.vue";
import FormControl from "@/Components/Form/FormControl.vue";
import BaseButton from "@/Components/Base/BaseButton.vue";
import FormStatusNotification from "@/Components/FormStatusNotification.vue";
import EnrollmentsTable from "@/Components/Admin/Tables/EnrollmentsTable.vue";

defineProps({
    enrollments: Object,
    errors: Object,
});

const enrollmentsForm = useForm({
    name: "",
});


const formSubmitted = ref(false);
const formSuccess = ref(false);
const submitenrollmentsForm = () => {
    formSubmitted.value = true;
    enrollmentsForm.post(route("admin.enrollment-types.store"), {
            onSuccess: () => {
                formSuccess.value = true;
                setTimeout(()=>{
                    formSuccess.value = false;
                },5000);
                formSuccess.value = true;
                formSubmitted.value = false;
            },
            onFinish:() => enrollmentsForm.reset()
        });
};
</script>

<template>
    <AdminLayout>
        <Head title="Enrollments" />

        <SectionMain>

            <SectionTitleLineWithButton main
                :icon="mdiAccountMultiple"
                title="Enrollments">

            </SectionTitleLineWithButton>
            <Transition name="form-statuss">
                <FormStatusNotification v-if="formSuccess"  :icon="mdiAccountBadge" color="success" >
                <span class=" text-lg">
                    New enrollment type added successfully!!
                </span>
            </FormStatusNotification>
            </Transition>

            <CardBox
                class=" w-full md:w-[450px] shadow-2xl md:mx-auto"
                is-form
                is-hoverable
            >
                <div class="md:flex md:gap-8">
                    <FormField
                        label="Enrollment"
                        :help="errors.name"
                    >
                        <FormControl
                            v-model="enrollmentsForm.name"
                            :icon="mdiAccountBadge"
                            placeholder="Enrollment"
                            :stat-err=" formSubmitted ? errors.name !== '': false"
                            :stat-sec=" errors.name === '' && formSubmitted"
                            name="name"
                        />
                    </FormField>

                    <div class=" ml-8 flex-grow-0 self-center">
                        <BaseButton
                            @click.prevent="submitenrollmentsForm"
                            type="button"
                            color="info"
                            label="Add"
                            :disabled="enrollmentsForm.processing"
                        />
                    </div>
                </div>
            </CardBox>
            <SectionTitleLineWithButton
                :icon="mdiAccountMultiple"
                title="Enrollments List"
            />


            <CardBox has-table>
                <EnrollmentsTable :errors="errors"  :enrollments="enrollments" />
            </CardBox>
        </SectionMain>
    </AdminLayout>
</template>

