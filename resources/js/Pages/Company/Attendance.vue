<template>
    <DashboardLayout title="Hajir Dashboard">
        <h2>Attendance</h2>
        <div class="flex">
            <div class="flex items-center">
                <Link :href="route('company.group.show',{
                   slug: subgroup.group.slug

                })" class="text-primary">{{ subgroup.group.name }}</Link>
                <span class="text-gray-600 mx-2">  >>  </span>
                <Link :href="route('company.subgroup.show',{
                   slug: subgroup.slug

                })" class="text-primary">{{ subgroup.name }}</Link>
            </div>
        </div>
        <div v-if="subgroup" class="flex justify-between">
            <div  >
                <button @click="addAttendanceModal = !addAttendanceModal">New Attendance</button> |
                <Link :href="route('company.subgroup.show',{
                    slug:subgroup.slug,
                })" class="text-primary">View Members</Link>
                <AddAttendance
                    v-model:is-open="addAttendanceModal"
                    :subgroup_id="subgroup.id"
                    />
            </div>
        </div>

        <div class="grid-container grid gap-4 grid-cols-dashboard_widget py-3 transition-opacity ease-in duration-1000">

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <div class="p-4">
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative mt-1">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                        </div>
                        <input type="text" id="table-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2.5" placeholder="Search for items">
                    </div>
                </div>
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
<!--                        <th scope="col" class="p-4">-->
<!--                            <div class="flex items-center">-->
<!--                                <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">-->
<!--                                <label for="checkbox-all-search" class="sr-only">checkbox</label>-->
<!--                            </div>-->
<!--                        </th>-->
                        <th scope="col" class="px-6 py-3">
                            Attendance Title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Attendance Date
                        </th>
                        <th scope="col" class="px-6 py-3 text-success">
                            Total Present
                        </th>
                        <th scope="col" class="px-6 py-3 text-danger">
                            Total Absent
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(attendance, index) in attendances.data" :key="index" class="bg-white border-b hover:bg-gray-50">
<!--                        <td class="w-4 p-4">-->
<!--                            <div class="flex items-center">-->
<!--                                <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">-->
<!--                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>-->
<!--                            </div>-->
<!--                        </td>-->
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ attendance.title}}
                        </th>
                        <td class="px-6 py-4">
                            <span class="text-sm">{{ attendance.date }}</span>
                        </td>
                        <td class="px-6 py-4 text-success">
                            <span class="text-sm">{{ attendance.present_members}}</span>
                        </td>
                        <td class="px-6 py-4 text-danger">
                            <span class="text-sm">{{ subgroup.total_members-attendance.present_members}}</span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <Link :href="route('company.attendance.edit',{
                                id: attendance.id,
                            })" class="font-medium text-primary hover:underline mx-1">View</Link>|
                            <Link
                                method="delete"
                                as="button"
                                type="button"
                                :href="route('company.attendance.destroy', {
                                id: attendance.id,
                            })"  class="font-medium text-danger hover:underline mx-1">Delete</Link>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>


        </div>
        <div class="flex justify-end">
            <Pagination :links="attendances.links"/>
        </div>
    </DashboardLayout>
</template>

<script>
import DashboardLayout from "@/Layouts/DashboardLayout";
import Pagination from "@/Components/Widgets/Pagination";
import WireframeWidgets from "@/Components/Wireframe/WireframeWidgets";
import Widget from "@/Components/Widgets/Widget";
import {Link} from "@inertiajs/inertia-vue3";
import {Inertia} from "@inertiajs/inertia";
import AddMember from "@/Components/Company/Modals/AddMember";
import AddAttendance from "@/Components/Company/Modals/AddAttendance";


export default {
    name: "Dashboard",
    components: {
        AddAttendance,
        AddMember,
        DashboardLayout,
        WireframeWidgets,
        Widget,
        Link,
        Pagination
    },
    data() {
        return {
            search: '',
            addAttendanceModal: false,
        };
    },
    props: {
        attendances: {
            type: Object,
            default: () => ({})
        },
        subgroup: {
            type: Object,
            default: null
        },

    },
    watch: {
        search() {
            // inertia search
            // Inertia.replace(this.route('company.member.index', {
            //     search: this.search
            // }));
            Inertia.reload({
                data: {
                    search: this.search
                }
            })
        }
    },
    created() {
        // this.loading = true;
        setTimeout(() => {
            this.loading = false;
        }, 500);
    }
}
</script>

<style scoped>

</style>
