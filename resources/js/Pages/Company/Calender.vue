<template>
    <DashboardLayout title="Calender">
        <div>
            <h2 class="text-3xl">Our Calender</h2>
            <p class="text-lg font-medium text-gray-600 mb-6">
                Company Calender
            </p>
            <div class="flex items-end my-5">
                <div class="flex-1 mt-2 mr-2">
                    <label class="py-2" for="event">Event</label>
                    <input
                        id="event"
                        type="text"
                        class="border-gray-400 rounded mt-1 block w-full"
                        placeholder="Event"
                        v-model="form.event"
                    />
                    <InputError v-if="props.errors.event" :error="props.errors.event" />
                </div>
                <!--                                date and time select-->

                <div class="flex-1 mt-2 ml-2">
                    <label class="py-2" for="date">Date</label>
                    <input
                        id="attendance_name"
                        type="date"
                        class="border-gray-400 rounded mt-1 block w-full"
                        placeholder="Attendance Title"
                        v-model="form.date"
                    />
                    <InputError v-if="props.errors.date" :error="props.errors.date" />
                </div>
                <div class="ml-2">
                    <button
                        class="bg-primary text-white font-bold py-2 px-4 rounded-lg shadow-lg hover:bg-primary-dark"
                        @click="AddEvent"
                    >
                        Add
                    </button>
                </div>
            </div>

            <Calendar
                class="max-w-full"
                :attributes="calAttributes"
                disable-page-swipe
                is-expanded
            >
                <template v-slot:day-content="{ day, attributes }">
                    <div class="flex flex-col h-full z-10 overflow-hidden rounded-xl border m-1">
                        <span
                            class="day-label text-sm text-gray-900 p-5 cursor-pointer"
                        >{{ day.day }}</span>
                        <div class="flex-grow overflow-y-auto overflow-x-auto">
                            <div
                                v-for="(event,index) in attributes"
                                :key="index"
                                class="text-xs leading-tight rounded-lg p-1 mt-0 mb-1 bg-primary text-white flex justify-between"
                            >
                                <span>{{ event.customData.title }}</span>
                                <Link
                                :href="route('company.calender.destroy',{
                                    calender:event.customData.id
                                })"
                                method="delete"
                                 class="p-1 rounded-full bg-red-600">x</Link>
                            </div>
                        </div>
                    </div>
                </template>
            </Calendar>
        </div>

    </DashboardLayout>
</template>


<script setup>
import DashboardLayout from "@/Layouts/DashboardLayout";
import 'v-calendar/dist/style.css';
import {Calendar} from 'v-calendar';
import moment, {now} from "moment";
import {useForm, Link} from "@inertiajs/inertia-vue3";
import {computed, reactive} from "vue";
import InputError from "@/Jetstream/InputError";
import {Inertia} from "@inertiajs/inertia";


// Calender form
const form = useForm({
    event: "",
    date: moment(now()).format('YYYY-MM-DD')
});

const AddEvent= () =>{
    form.post(route('company.calender.store'),{
        onSuccess: () => {
            form.reset();
        },
    });
}


//props
const props = defineProps({
    errors: {
        type: Object,
        default: () => ({})
    },
    calenders: {
        type: Array,
        default: () => []
    },
})

const calAttributes = computed(() => props.calenders.map(calender => {
    return {
        id: calender.id,
        dates: new Date(Date.parse(calender.date)),
        customData: {
            id: calender.id,
            title: calender.event,
        },
    }
}));


// dummey data for calender
// const masks = reactive({
//     weekdays: 'WWW',
// });
// const year = new Date().getFullYear()
// const month = new Date().getMonth()

// const attributes = reactive([
//     {
//         key: 1,
//         customData: {
//             title: 'Lunch with mom.',
//             class: 'bg-red-600 text-white',
//         },
//         dates: new Date(year, month, 1),
//     },
// ]);

</script>
