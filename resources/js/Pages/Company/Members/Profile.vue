<template>
    <DashboardLayout>
        <div>
            <div class="flex flex-col md:flex-row">
               <div>
                   <object :data="'/app/'+member.avatar" type="image/png" class="h-52 w-52 object-cover rounded-full border-b-2 border-primary shadow-lg">
                       <img src="/images/icons/group.png" class="h-52 w-52 object-cover rounded-full">
                   </object>
               </div>
                <div class="ml-9 flex-1">
                    <h1 class="text-primary text-2xl font-bold">{{ member.name }}</h1>
                    <div class="py-4">
                        <div>{{ member.group_name}}</div>
                        <div>-> {{ member.sub_group_name}}</div>
                    </div>

                    <div>
                        <span class="text-gray-400">{{ member.details }}</span>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="p-4 bg-primary text-white text-xl w-full rounded-2xl mt-12 shadow-lg text-center">
                            <div class="font-semibold mb-2">
                                {{ member.total_attendances }} Days
                            </div>
                            <div class="text-xl">
                                Total Attendance
                            </div>
                        </div>
                        <div class="p-4 bg-green-700 text-white text-xl w-full rounded-2xl mt-12 shadow-lg text-center">
                            <div class="font-semibold mb-2">
                                {{  member.attendances_count }} Days
                            </div>
                            <div class="text-xl">
                                Present
                            </div>

                        </div>
                        <div class="p-4 bg-danger text-white text-xl w-full rounded-2xl mt-12 shadow-lg text-center">
                            <div class="font-semibold mb-2">
                                {{ member.total_attendances - member.attendances_count }} Days
                            </div>
                            <div class="text-xl">
                                Absence
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </DashboardLayout>
</template>
<script setup>

import DashboardLayout from "@/Layouts/DashboardLayout";
//props member
defineProps({
    member: {
        type: Object,
        required: true
    }
});
</script>
