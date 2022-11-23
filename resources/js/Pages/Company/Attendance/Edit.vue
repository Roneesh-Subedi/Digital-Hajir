<template>
    <DashboardLayout>
        <div class="my-2">
            <h2 class="text-xl">Edit Attendance</h2>
        </div>
        <div class="flex flex-col md:flex-row">
            <div class="flex-1 mt-2 mr-2">
                <label class="py-2" for="attendance_name">Title</label>
                <input
                    id="attendance_name"
                    type="text"
                    class="border-gray-400 rounded mt-1 block w-full"
                    placeholder="Attendance Title"
                    v-model="form.title"
                />
            </div>
            <!--                                date and time select-->

            <div class="flex-1 mt-2 ml-2">
                <label class="py-2" for="attendance_name">Date</label>
                <input
                    id="attendance_name"
                    type="datetime-local"
                    class="border-gray-400 rounded mt-1 block w-full"
                    placeholder="Attendance Title"
                    v-model="form.date"
                />
            </div>
        </div>


        <div class="grid-container grid gap-4 grid-cols-dashboard_widget mt-6">
            <div v-for="(member, index) in members" :key="index" class="relative">

                <div class="bg-gray-100 rounded-lg shadow-lg p-4"
                     :class="isPresent(member)?'border-2 border-b-4 border-primary shadow-xl':'border-2 border-b-4 border-danger'">
                    <div class="relative flex flex-wrap">
                        <div class="flex-shrink-0 w-full">
                            <div class="flex flex-wrap items-center">
                                <div class="flex-shrink-0">
                                    <object :data="'/app/'+member.avatar" type="image/png"
                                            class="h-16 w-16 object-cover rounded-full">
                                        <img src="/images/icons/group.png" class="h-16 w-16 object-cover rounded-full">
                                    </object>
                                </div>
                                <div class="ml-3 pt-3">
                                    <!--                    total student-->
                                    <h3 class="text-xl font-bold leading-5 font-medium" :class="isPresent(member) ? 'text-primary':'text-danger'">
                                        {{ member.name }}
                                    </h3>
                                    <p class="text-sm leading-5 pt-2">
                                        <!--                                        present absence-->
                                        <span :class="isPresent(member) ? 'text-green-700':'text-danger-light'">
                                            {{ isPresent(member) ? 'Present' : 'Absent' }}
                                        </span>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input
                    :id="member.id"
                    :value="member.id"
                    type="checkbox"
                    class="absolute top-0 left-0 cursor-pointer w-full h-full opacity-0"
                    placeholder="Attendance Title"
                    v-model="form.attendMembers"
                />
            </div>
        </div>

        <div class="mt-6">
            <button
                class="bg-primary text-white font-bold py-2 px-4 rounded-lg shadow-lg hover:bg-primary-dark"
                @click="updateAttendance"
            >
                Update Attendance
            </button>
        </div>

    </DashboardLayout>
</template>

<script setup>

import DashboardLayout from "@/Layouts/DashboardLayout";
import {useForm} from "@inertiajs/inertia-vue3";
import {onMounted, watch} from "vue";
import moment from "moment";

const form = useForm({
    id: null,
    title: '',
    date: '',
    attendMembers: [],
});
const props = defineProps({
    attendance: {
        type: Object,
        default: () => ({}),
        required: true,
    },
    members: {
        type: Array,
        default: () => [],
    },
    attendMembers: {
        type: Array,
        default: () => [],
    },
});

const isPresent = (member) => {
    return form.attendMembers.includes(member.id);
};

const updateAttendance = () => {
    form.patch(route('company.attendance.update', {id: form.id}),{
        onError: (e) => {
            console.log(e);
        },
    });
};

onMounted(() => {
    form.id = props.attendance.id;
    form.title = props.attendance.title;
    form.date = moment(props.attendance.date).format('YYYY-MM-DDTHH:mm');
    form.attendMembers = props.attendMembers;
    console.log(props.attendance);
    console.log(form.data());
});
</script>
