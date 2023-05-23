<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import CardBox from "@/Components/Card/CardBox.vue";
import FormField from "@/Components/Form/FormField.vue";
import { useVuelidate } from "@vuelidate/core";
import { ref, computed, onMounted } from "vue";

import moment from "moment";
import {
    mdiAccount,
    mdiAccountMultipleCheck,
    mdiPhone,
    mdiEarthPlus,
    mdiEmail,
    mdiAccountKey,
    mdiLockCheck,
    mdiLock,
    mdiChevronRight,
    mdiChevronLeft,
} from "@mdi/js";
import {
    required,
    email,
    maxLength,
    minLength,
    helpers,
    alphaNum,
    sameAs,
} from "@vuelidate/validators";
import axios from "axios";
import FormProgressStep from "@/Components/Form/FormProgressStep.vue";
import FormControl from "@/Components/Form/FormControl.vue";
import FormInputPhone from "@/Components/Form/FormInputPhone.vue";
import FormCheckRadioGroup from "@/Components/Form/FormCheckRadioGroup.vue";
import FormCheckRadio from "@/Components/Form/FormCheckRadio.vue";
import BaseButton from "@/Components/Base/BaseButton.vue";
import BaseButtonIconRigth from "@/Components/Base/BaseButtonIconRigth.vue";

const props = defineProps({
    errors: Object,
    userType: Object,
    genderType: Object,
    country: Object,
    collage: Object,
    userTypeNames: Object,
    academicRank: Object,
    academicProgram: Object,
    academicYear: Object,
    enrollment: Object,
});

// Date Validation
const minYear = moment().subtract(50, "years").format("YYYY-MM-DD");
const maxYear = moment().subtract(15, "years").format("YYYY-MM-DD");
const validDate = (value) => {
    return moment(value).isBetween(minYear, maxYear);
};

// Form Step Constants
const currentStep = ref(1);
const stepOneSucc = ref(false);
const stepTwoSucc = ref(false);
const stepThreeSucc = ref(false);
const stepOneErr = ref(false);
const stepTwoErr = ref(false);
const stepThreeErr = ref(false);
const stepOneSub = ref(false);
const stepTwoSub = ref(false);
const stepThreeSub = ref(false);

// Form Object
const form = useForm({
    first_name: "",
    last_name: "",
    phone_number: "",
    gender_id: "",
    date_of_birth: "",
    user_type: "",
    nationality: "",

    id_number: "",
    department_id: "",
    enrollment_id: "",
    academic_program_id: "",
    academic_year_id: "",

    academic_rank_id: "",
    specialization: "",

    username: "",
    email: "",
    password: "",
    password_confirmation: "",
    term: false,
});

const userTypeName = ref("");
const getUserTypeName = () => {
    switch (form.user_type) {
        case props.userTypeNames.student:
            userTypeName.value = "ST";
            break;
        case props.userTypeNames.acStaff:
            userTypeName.value = "ACS";
            break;
        case props.userTypeNames.adStaff:
            userTypeName.value = "ADS";
            break;
        default:
            userTypeName.value = "";
            break;
    }
};
// Step One Validation
const stepOneRules = computed(() => {
    return {
        first_name: {
            required,
            maxLength: maxLength(50),
        },
        last_name: {
            required,
            maxLength: maxLength(50),
        },
        phone_number: {
            required,
            maxLength: maxLength(18),
            minLength: minLength(11),
        },
        gender_id: {
            required: helpers.withMessage(
                "The gender field is required",
                required
            ),
        },
        date_of_birth: {
            required,
            validDate: helpers.withMessage("Invalid date", validDate),
        },
        user_type: { required },
        nationality: { required },
    };
});
const vOne$ = useVuelidate(stepOneRules, form);

// Step Two Validation
const stepTwoRules = computed(() => {
    const basicCheck = ref({
        id_number: { required },
        department_id: { required },
        specialization: { required },
    });
    switch (userTypeName.value) {
        case "ACS":
            basicCheck.value = {
                id_number: { required },
                department_id: { required },
                specialization: { required },
                academic_rank_id: { required },
            };
            break;
        case "ST":
            basicCheck.value = {
                id_number: { required },
                department_id: { required },
                specialization: { required },
                enrollment_id: { required },
                academic_program_id: { required },
                academic_year_id: { required },
            };
            break;
        case "ADS":
            break;

        default:
            break;
    }

    return basicCheck;
});
const vTwo$ = useVuelidate(stepTwoRules, form);

// Step Three Validation
const stepThreeRules = computed(() => {
    return {
        username: { required, alphaNum },
        email: { required, email },
        password: { required },
        password_confirmation: {
            required,
            sameAsPassword: sameAs(form.password),
        },
        term: { required },
    };
});
const vThree$ = useVuelidate(stepThreeRules, form);

const nextStep = async () => {
    if (currentStep.value == 1) {
        const stepOneResult = await vOne$.value.$validate();
        if (stepOneResult) {
            stepOneSub.value = true;
            stepOneSucc.value = true;
            currentStep.value++;
        } else {
            stepOneSub.value = true;
            stepOneErr.value = true;
        }
    } else if (currentStep.value == 2) {
        const stepTwoResult = await vTwo$.value.$validate();

        if (stepTwoResult) {
            stepTwoSucc.value = true;
            currentStep.value++;
        } else {
            stepTwoErr.value = true;
        }
        stepTwoSub.value = true;
    }
};

const departmentList = ref([]);
const collageId = ref(1);

const getDepartmentList = () => {
    axios
        .get("/api/general-data/department?collage_id=" + collageId.value)
        .then((response) => (departmentList.value = response.data));
};

onMounted(() => {
    collageId.value = 1;
    axios
        .get("/api/general-data/department?collage_id=" + collageId.value)
        .then((response) => (departmentList.value = response.data));
});

function prevStep() {
    currentStep.value--;
}
const submit = async () => {
    if (currentStep.value == 3) {
        const stepThreeResult = await vThree$.value.$validate();
        if (stepThreeResult) {
            stepThreeSub.value = true;
            stepThreeSucc.value = true;
            form.post(route("register.store"), {
                onSuccess: () => {
                    form.reset("password", "password_confirmation"),
                        currentStep.value == 1;
                },
                onError: () => {
                    currentStep.value == 1;
                },
            });
        } else {
            stepThreeSub.value = true;
            stepThreeErr.value = true;
        }
    }
};

const progressValue = computed(() => {
    switch (currentStep.value) {
        case 1:
            return 0;
        case 2:
            return 50;
        case 3:
            return 100;
    }
    return 0;
});

const GenderSelectOptions = ["Male", "Female"];
const userTypeSelectOptions = props.userType;
</script>

<template>
    <Head title="Log in" />
        <GuestLayout v-slot="{ cardClassWide}" flex-direction="col">
            <div
                :class="cardClassWide"
                class="relative flex justify-between mb-4"
            >
            <FormProgressStep
                    :step-number="1"
                    :step-err="stepOneErr"
                    :step-succ="stepOneSucc"
                    :icon="mdiAccountMultipleCheck"
                />
                <FormProgressStep
                    :step-number="2"
                    :step-err="stepTwoSucc"
                    :step-succ="stepTwoSucc"
                    :icon="mdiAccountMultipleCheck"
                />
                <FormProgressStep
                    :step-number="3"
                    :step-err="stepThreeSucc"
                    :step-succ="stepThreeSucc"
                    :icon="mdiAccountMultipleCheck"
                />

                <div class="absolute top-0 bottom-0 left-0 right-0 h-14">
                    <progress
                        max="100"
                        :value="progressValue"
                        class="h-1 w-full align-middle absolute top-[50%]"
                    ></progress>
                </div>
        </div>

        <CardBox :class="cardClassWide" is-form>
            <div class="w-full overflow-hidden">
                    <Transition>
                        <div v-show="currentStep == 1" class="mx-2">
                            <div
                                class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6"
                            >
                                <FormField
                                    label="First Name"
                                    :help="props.errors.first_name"
                                    :field-errors="vOne$.first_name.$errors"
                                >
                                    <FormControl
                                        v-model="form.first_name"
                                        :icon="mdiAccount"
                                        :stat-err="
                                            vOne$.first_name.$errors.length
                                                ? true
                                                : false
                                        "
                                        :stat-sec="
                                            !vOne$.first_name.$errors.length &&
                                            stepOneSub
                                                ? true
                                                : false
                                        "
                                        name="first_name"
                                    />
                                </FormField>
                                <FormField
                                    label="Last Name"
                                    :field-errors="vOne$.last_name.$errors"
                                    :help="props.errors.last_name"
                                >
                                    <FormControl
                                        v-model="form.last_name"
                                        :stat-err="
                                            vOne$.last_name.$errors.length
                                                ? true
                                                : false
                                        "
                                        :stat-sec="
                                            !vOne$.last_name.$errors.length &&
                                            stepOneSub
                                                ? true
                                                : false
                                        "
                                        :icon="mdiAccount"
                                        name="last_name"
                                    />
                                </FormField>
                                <FormField
                                    label="Phone Number"
                                    :field-errors="vOne$.phone_number.$errors"
                                    :help="props.errors.phone_number"
                                >
                                    <FormInputPhone
                                        placeholder="XXX-XXX-XXX"
                                        v-model="form.phone_number"
                                        :stat-err="
                                            vOne$.phone_number.$errors.length
                                                ? true
                                                : false
                                        "
                                        :stat-sec="
                                            !vOne$.phone_number.$errors
                                                .length && stepOneSub
                                                ? true
                                                : false
                                        "
                                        :icon="mdiPhone"
                                        name="last_name"
                                    />
                                </FormField>
                                <FormField
                                    label="Date of Birth"
                                    :field-errors="vOne$.date_of_birth.$errors"
                                    :help="props.errors.date_of_birth"
                                >
                                    <FormControl
                                        type="date"
                                        :stat-err="
                                            vOne$.date_of_birth.$errors.length
                                                ? true
                                                : false
                                        "
                                        :stat-sec="
                                            !vOne$.date_of_birth.$errors
                                                .length && stepOneSub
                                                ? true
                                                : false
                                        "
                                        v-model="form.date_of_birth"
                                        name="date_of_birth"
                                    />
                                </FormField>
                                <FormField
                                    label="Your Nationality"
                                    :help="props.errors.nationality"
                                    :field-errors="vOne$.nationality.$errors"
                                >
                                    <FormControl
                                        v-model="form.nationality"
                                        :stat-err="
                                            vOne$.nationality.$errors.length
                                                ? true
                                                : false
                                        "
                                        :stat-sec="
                                            !vOne$.nationality.$errors.length &&
                                            stepOneSub
                                                ? true
                                                : false
                                        "
                                        :icon="mdiEarthPlus"
                                        type="text"
                                        name="nationality"
                                        :options="props.country"
                                    />
                                </FormField>
                                <FormField
                                        label="Gender"
                                        :field-errors="vOne$.gender_id.$errors"
                                        :help="props.errors.gender_id"
                                    >
                                        <FormCheckRadioGroup
                                            v-model="form.gender_id"
                                            :stat-err="
                                                vOne$.gender_id.$errors.length
                                                    ? true
                                                    : false
                                            "
                                            :stat-sec="
                                                !vOne$.gender_id.$errors
                                                    .length && stepOneSub
                                                    ? true
                                                    : false
                                            "
                                            name="gender_id"
                                            type="radio"
                                            :options="props.genderType"
                                        />
                                    </FormField>
                                <div class="col-span-full">
                                    <FormField
                                        label="You are ?"
                                        :help="props.errors.user_type"
                                        :field-errors="vOne$.user_type.$errors"
                                    >
                                        <FormCheckRadioGroup
                                            @change="getUserTypeName"
                                            v-model="form.user_type"
                                            :stat-err="
                                                vOne$.user_type.$errors.length
                                                    ? true
                                                    : false
                                            "
                                            :stat-sec="
                                                !vOne$.user_type.$errors
                                                    .length && stepOneSub
                                                    ? true
                                                    : false
                                            "
                                            name="user_type"
                                            type="radio"
                                            :options="props.userType"
                                        />
                                    </FormField>
                                </div>
                            </div>
                        </div>
                    </Transition>
                    <Transition>
                        <div v-show="currentStep == 2" class="mx-2">
                            <div
                                class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6"
                            >
                                <FormField
                                    label="University ID Number"
                                    :help="props.errors.id_number"
                                    :field-errors="vTwo$.id_number.$errors"
                                >
                                    <FormControl
                                        v-model="form.id_number"
                                        :icon="mdiAccount"
                                        :stat-err="
                                            vTwo$.id_number.$errors.length
                                                ? true
                                                : false
                                        "
                                        :stat-sec="
                                            !vTwo$.id_number.$errors.length &&
                                            stepTwoSub
                                                ? true
                                                : false
                                        "
                                        name="id_number"
                                    />
                                </FormField>
                                <FormField
                                    :label="(userTypeName == 'ACS')? 'Specialization': 'Stream'"
                                    :help="props.errors.specialization"
                                    :field-errors="vTwo$.specialization.$errors"
                                >
                                    <FormControl
                                        v-model="form.specialization"
                                        :icon="mdiAccount"
                                        :stat-err="
                                            vTwo$.specialization.$errors.length
                                                ? true
                                                : false
                                        "
                                        :stat-sec="
                                            !vTwo$.specialization.$errors.length &&
                                            stepTwoSub
                                                ? true
                                                : false
                                        "
                                        name="specialization"
                                    />
                                </FormField>
                                <FormField label="Collage">
                                    <FormControl
                                        @change="getDepartmentList"
                                        v-model="collageId"
                                        :icon="mdiEarthPlus"
                                        type="text"
                                        name="collage_id"
                                        :options="props.collage"
                                    />
                                </FormField>
                                <FormField
                                    label="Department"
                                    :help="props.errors.department_id"
                                    :field-errors="vTwo$.department_id.$errors"
                                >
                                    <FormControl
                                        v-model="form.department_id"
                                        :stat-err="
                                            vTwo$.department_id.$errors.length
                                                ? true
                                                : false
                                        "
                                        :stat-sec="
                                            !vTwo$.department_id.$errors
                                                .length && stepTwoSub
                                                ? true
                                                : false
                                        "
                                        :icon="mdiEarthPlus"
                                        type="text"
                                        name="department_id"
                                        :options="departmentList"
                                    />
                                </FormField>
                                <div
                                    v-if="userTypeName == 'ACS'"
                                    class="col-span-full"
                                >
                                    <div
                                        class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6"
                                    >
                                        <FormField
                                            label="Acadamic Rank"
                                            :help="
                                                props.errors.academic_rank_id
                                            "
                                            :field-errors="
                                                vTwo$.academic_rank_id.$errors
                                            "
                                        >
                                            <FormControl
                                                v-model="form.academic_rank_id"
                                                :stat-err="
                                                    vTwo$.academic_rank_id
                                                        .$errors.length
                                                        ? true
                                                        : false
                                                "
                                                :stat-sec="
                                                    !vTwo$.academic_rank_id
                                                        .$errors.length &&
                                                    stepTwoSub
                                                        ? true
                                                        : false
                                                "
                                                :icon="mdiEarthPlus"
                                                type="text"
                                                name="academic_rank_id"
                                                :options="academicRank"
                                            />
                                        </FormField>

                                    </div>
                                </div>
                                <div
                                    v-if="userTypeName == 'ST'"
                                    class="col-span-full"
                                >
                                    <div
                                        class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6"
                                    >
                                        <FormField
                                            label="Acadamic Program"
                                            :help="
                                                props.errors.academic_program_id
                                            "
                                            :field-errors="
                                                vTwo$.academic_program_id.$errors
                                            "
                                        >
                                            <FormControl
                                                v-model="form.academic_program_id"
                                                :stat-err="
                                                    vTwo$.academic_program_id
                                                        .$errors.length
                                                        ? true
                                                        : false
                                                "
                                                :stat-sec="
                                                    !vTwo$.academic_program_id
                                                        .$errors.length &&
                                                    stepTwoSub
                                                        ? true
                                                        : false
                                                "
                                                :icon="mdiEarthPlus"
                                                type="text"
                                                name="academic_program_id"
                                                :options="academicProgram"
                                            />
                                        </FormField>
                                        <FormField
                                            label="Acadamic Year"
                                            :help="
                                                props.errors.academic_year_id
                                            "
                                            :field-errors="
                                                vTwo$.academic_year_id.$errors
                                            "
                                        >
                                            <FormControl
                                                v-model="form.academic_year_id"
                                                :stat-err="
                                                    vTwo$.academic_year_id
                                                        .$errors.length
                                                        ? true
                                                        : false
                                                "
                                                :stat-sec="
                                                    !vTwo$.academic_year_id
                                                        .$errors.length &&
                                                    stepTwoSub
                                                        ? true
                                                        : false
                                                "
                                                :icon="mdiEarthPlus"
                                                type="text"
                                                name="academic_year_id"
                                                :options="academicYear"
                                            />
                                        </FormField>
                                        <FormField
                                            label="Enrollment"
                                            :help="
                                                props.errors.enrollment_id
                                            "
                                            :field-errors="
                                                vTwo$.enrollment_id.$errors
                                            "
                                        >
                                            <FormControl
                                                v-model="form.enrollment_id"
                                                :stat-err="
                                                    vTwo$.enrollment_id
                                                        .$errors.length
                                                        ? true
                                                        : false
                                                "
                                                :stat-sec="
                                                    !vTwo$.enrollment_id
                                                        .$errors.length &&
                                                    stepTwoSub
                                                        ? true
                                                        : false
                                                "
                                                :icon="mdiEarthPlus"
                                                type="text"
                                                name="enrollment_id"
                                                :options="enrollment"
                                            />
                                        </FormField>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </Transition>
                    <Transition>
                        <div v-show="currentStep == 3" class="mx-2">
                            <div
                                class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6"
                            >
                                <FormField
                                    label="User Name"
                                    :help="props.errors.username"
                                    :field-errors="vThree$.username.$errors"
                                >
                                    <FormControl
                                        v-model="form.username"
                                        :icon="mdiAccountKey"
                                        :stat-err="
                                            vThree$.username.$errors.length
                                                ? true
                                                : false
                                        "
                                        :stat-sec="
                                            !vThree$.username.$errors.length &&
                                            stepThreeSub
                                                ? true
                                                : false
                                        "
                                        name="username"
                                    />
                                </FormField>
                                <FormField
                                    label="Email"
                                    :help="props.errors.email"
                                    :field-errors="vThree$.email.$errors"
                                >
                                    <FormControl
                                        v-model="form.email"
                                        :icon="mdiEmail"
                                        :stat-err="
                                            vThree$.email.$errors.length
                                                ? true
                                                : false
                                        "
                                        :stat-sec="
                                            !vThree$.email.$errors.length &&
                                            stepThreeSub
                                                ? true
                                                : false
                                        "
                                        name="email"
                                    />
                                </FormField>
                                <FormField
                                    label="Password"
                                    :help="props.errors.password"
                                    :field-errors="vThree$.password.$errors"
                                >
                                    <FormControl
                                        v-model="form.password"
                                        :icon="mdiLock"
                                        :stat-err="
                                            vThree$.password.$errors.length
                                                ? true
                                                : false
                                        "
                                        :stat-sec="
                                            !vThree$.password.$errors.length &&
                                            stepThreeSub
                                                ? true
                                                : false
                                        "
                                        type="password"
                                        name="password"
                                    />
                                </FormField>
                                <FormField
                                    label="Confirm Password"
                                    :help="props.errors.password_confirmation"
                                    :field-errors="
                                        vThree$.password_confirmation.$errors
                                    "
                                >
                                    <FormControl
                                        v-model="form.password_confirmation"
                                        :icon="mdiLockCheck"
                                        :stat-err="
                                            vThree$.password_confirmation.$errors
                                                .length
                                                ? true
                                                : false
                                        "
                                        :stat-sec="
                                            !vThree$.password_confirmation
                                                .$errors.length && stepThreeSub
                                                ? true
                                                : false
                                        "
                                        type="password"
                                        name="password_confirmation"
                                    />
                                </FormField>
                                <div class="col-span-full">
                                    <FormField
                                        label="Term of Service"
                                        :help="props.errors.term"
                                        :field-errors="vThree$.term.$errors"
                                    >
                                        <div class="flex ">
                                            <div
                                                class=" flex-shrink-0"
                                            >
                                                <FormCheckRadio
                                                type="radio"
                                                    v-model="form.term"
                                                    name="term"
                                                    :input-value="true"
                                                />
                                            </div>
                                            <div class=" flex-1">
                                                <div>
                                                    <p
                                                        class="inline text-base text-white "
                                                    >
                                                        <span class="mr-1"
                                                            >I agree to
                                                            the</span
                                                        >
                                                        <a
                                                            target="_blank"
                                                            :href="
                                                                route(
                                                                    'login'
                                                                )
                                                            "
                                                            class="link mr-2"
                                                        >
                                                            <span>
                                                                Terms of Service
                                                            </span>
                                                        </a>
                                                        <a
                                                            target="_blank"
                                                            :href="
                                                                route(
                                                                    'login'
                                                                )
                                                            "
                                                            class="link"
                                                        >
                                                            <span>
                                                                Privacy Policy
                                                            </span>
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </FormField>
                                </div>
                            </div>
                        </div>
                    </Transition>
                </div>

            <template #footer>
                <div
                        :class="{ 'justify-end': currentStep == 1 },
                        { 'justify-between': currentStep != 1 }
                        "
                        class="flex items-center"
                    >
                        <BaseButton
                            v-if="currentStep != 1"
                            type="button"
                            @click.prevent="prevStep"
                            color="info"
                            label="Previous"
                            :icon="mdiChevronLeft"
                        />
                        <BaseButtonIconRigth
                            v-if="currentStep != 3"
                            preserveScroll
                            type="button"
                            @click.prevent="nextStep"
                            color="success"
                            label="Next"
                            :icon="mdiChevronRight"
                        />

                        <BaseButton
                            v-if="currentStep == 3"
                            type="button"
                            @click.prevent="submit"
                            color="info"
                            label="Register"
                            :disabled="form.processing"
                        />
                    </div>
            </template>
        </CardBox>
    </GuestLayout>

</template>
