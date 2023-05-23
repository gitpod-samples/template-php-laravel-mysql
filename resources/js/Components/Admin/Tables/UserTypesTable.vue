<script setup>
import { computed, ref} from "vue";
import {
    mdiAccountBadge,
    mdiAccountBadgeOutline,
    mdiEye,
    mdiPen,
    mdiTrashCan,
} from "@mdi/js";
import CardBoxModal from "@/Components/Card/CardBoxModal.vue";
import TableCheckboxCell from "@/Components/TableCheckboxCell.vue";
import BaseLevel from "@/Components/Base/BaseLevel.vue";
import BaseButtons from "@/Components/Base/BaseButtons.vue";
import BaseButton from "@/Components/Base/BaseButton.vue";
import { useForm } from "@inertiajs/vue3";
import CardBox from "@/Components/Card/CardBox.vue";
import useVuelidate from "@vuelidate/core";
import { required } from "@vuelidate/validators";
import FormField from "@/Components/Form/FormField.vue";
import FormControl from "@/Components/Form/FormControl.vue";

const props = defineProps({
    checkable: Boolean,
    userTypes: Object,
    errors: Object,
});

// Table Data
const items = computed(() => props.userTypes);

const perPage = ref(5);

const currentPage = ref(0);

const checkedRows = ref([]);

const itemsPaginated = computed(() =>
    items.value.slice(
        perPage.value * currentPage.value,
        perPage.value * (currentPage.value + 1)
    )
);

const numPages = computed(() => Math.ceil(items.value.length / perPage.value));

const currentPageHuman = computed(() => currentPage.value + 1);

const pagesList = computed(() => {
    const pagesList = [];

    for (let i = 0; i < numPages.value; i++) {
        pagesList.push(i);
    }

    return pagesList;
});
const remove = (arr, cb) => {
    const newArr = [];

    arr.forEach((item) => {
        if (!cb(item)) {
            newArr.push(item);
        }
    });

    return newArr;
};

const checked = (isChecked, userType) => {
    if (isChecked) {
        checkedRows.value.push(userType);
    } else {
        checkedRows.value = remove(
            checkedRows.value,
            (row) => row.id === userType.id
        );
    }
};
// Form Data Intial
const itemId = ref(0);
const itemName = ref('');
const itemGuardName = ref('');

// Table Modals
const isModalDangerActive = ref(false);
const isUpdateModalActive = ref(false);

const deleteUserType = (iId) => {
    itemId.value = iId;
    isModalDangerActive.value = true;
};
const updateUserType = (iId, iN, iGN) => {
    itemId.value = iId;
    itemName.value = iN;
    itemGuardName.value = iGN;
    isUpdateModalActive.value = true;
};

// const form = useForm({
//     id: itemId,
// });
const deleteConfirmed = () => {
    useForm({
        id:itemId.value
    }).delete(route("admin.user-types.destroy", itemId.value), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
    });
};
const closeModal = () => {
    itemId.value = 0;
    itemName.value = "";
    itemGuardName.value = "";
    isUpdateModalActive.value = false;
    isModalDangerActive.value = false;
};

const userTypeUpdateForm = useForm({
    id: itemId,
    newname: itemName,
    newguard_name: itemGuardName,
});
const formRule = computed(() => {
    return {
        newname: { required },
        newguard_name: { required },
    };
});

const vForm$ = useVuelidate(formRule, userTypeUpdateForm);
const formSubmitted = ref(false);
const formSuccess = ref(false);
const updatesubmit = async () => {
    const result = await vForm$.value.$validate();
    formSubmitted.value = true;
    if (result) {
        userTypeUpdateForm.put(route("admin.user-types.update", itemId.value), {
            preserveScroll: true,
            onSuccess: () => {
                closeModal();
                formSuccess.value = true;
            },
            onError: () => userTypeUpdateForm.newname.focus(),
            onFinish: () => userTypeUpdateForm.reset(),
        });
    }
};
</script>

<template>

    <CardBoxModal
        v-model="isModalDangerActive"
        title="Delete User Type"
        button="danger"
        has-cancel
        @confirm="deleteConfirmed"
        @cancel="closeModal"
    >
        <p class="text-slate-500">
            Once the user type is deleted, all of its resources and data will be
            permanently deleted. Before deleting the user type, please check any
            data or information that you wish to retain.
        </p>
    </CardBoxModal>

    <CardBoxModal
        v-model="isUpdateModalActive"
        button-label="Update"
        title="Update User Type"
        has-cancel
        has-form
        @cancel="closeModal"
    >
        <CardBox
            class="w-full shadow-2xl md:mx-auto"
            is-form
            is-hoverable
        >
            <input v-model="userTypeUpdateForm.id" name="id" hidden />
            <FormField
                label="User Type Name"
                :help="errors.newname"
                :field-errors="formSubmitted ? vForm$.newname.$errors : null"
            >
                <FormControl
                    v-model="userTypeUpdateForm.newname"
                    :icon="mdiAccountBadge"
                    placeholder="User Type"
                    :stat-err="
                        formSubmitted
                            ? errors.newname ||
                              vForm$.newname.$errors.length !== 0
                            : false
                    "
                    :stat-sec="
                        !errors.newname &&
                        formSubmitted &&
                        vForm$.newname.$errors.length === 0
                    "
                    name="newname"
                />
            </FormField>
            <FormField
                label="Gurd Name"
                :help="errors.newguard_name"
                :field-errors="vForm$.newguard_name.$errors"
            >
                <FormControl
                    disabled
                    v-model="userTypeUpdateForm.newguard_name"
                    :icon="mdiAccountBadgeOutline"
                    placeholder="User Type"
                    :stat-err="
                        vForm$.newguard_name.$errors.length !== 0 ||
                        errors.newguard_name
                    "
                    :stat-sec="
                        !errors.newguard_name &&
                        formSubmitted &&
                        vForm$.newguard_name.$errors.length === 0
                    "
                    name="newguard_name"
                />
            </FormField>
            <template #footer>
                <div class="flex justify-between">
                    <BaseButton
                        label="Update"
                        color="success"
                        @click="updatesubmit"
                    />
                    <BaseButton
                        label="Cancel"
                        color="warrning"
                        @click="closeModal"
                    />
                </div>
            </template>
        </CardBox>
    </CardBoxModal>

     <div v-if="checkedRows.length" class="p-3 bg-gray-100/50 dark:bg-slate-800">
        <span
            v-for="checkedRow in checkedRows"
            :key="checkedRow.id"
            class="inline-block px-2 py-1 rounded-sm mr-2 text-sm bg-gray-100 dark:bg-slate-700"
        >
            {{ checkedRow.name }}
        </span>
    </div>

    <table>
        <thead>
            <tr>
                <th v-if="checkable" />
                <th>Name</th>
                <th>Slug</th>
                <th>Type</th>
                <th>Number Of Users</th>
                <th />
            </tr>
        </thead>
        <tbody>
            <tr v-for="userType in itemsPaginated" :key="userType.id">
                <TableCheckboxCell
                    v-if="checkable"
                    @checked="checked($event, userType)"
                />
                <td data-label="Name">
                    {{ userType.name }}
                </td>
                <td data-label="Slug">
                    {{ userType.slug }}
                </td>
                <td data-label="Guard Name">
                    {{ userType.guard_name }}
                </td>
                <td data-label="Number of User">
                    {{ userType.users }}
                </td>
                <td class="before:hidden lg:w-1 whitespace-nowrap">
                    <BaseButtons type="justify-start lg:justify-end" no-wrap>
                        <BaseButton
                            color="danger"
                            :icon="mdiTrashCan"
                            small
                            @click="deleteUserType(userType.id)"
                        />
                        <BaseButton
                            color="success"
                            :icon="mdiPen"
                            small
                            @click="
                                updateUserType(
                                    userType.id,
                                    userType.name,
                                    userType.guard_name
                                )
                            "
                        />
                    </BaseButtons>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="p-3 lg:px-6 border-t border-gray-100 dark:border-slate-800">
        <BaseLevel>
            <BaseButtons>
                <BaseButton
                    v-for="page in pagesList"
                    :key="page"
                    :active="page === currentPage"
                    :label="page + 1"
                    :color="page === currentPage ? 'lightDark' : 'whiteDark'"
                    small
                    @click="currentPage = page"
                />
            </BaseButtons>
            <small>Page {{ currentPageHuman }} of {{ numPages }}</small>
        </BaseLevel>
    </div> -->
</template>
