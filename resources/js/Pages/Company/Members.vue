<template>
    <DashboardLayout title="Hajir Dashboard">
        <h2>Members</h2>
        <div class="flex flex-col md:flex-row justify-between">
            <div v-if="subgroup">
                <button class=" mt-4" @click="addMemberModal = !addMemberModal">Add Members</button> |
                <Link :href="route('company.attendance.index',{
                    subgroup: subgroup.slug
                })" class="text-primary mt-4">View Attendance</Link>
                <AddMember
                    v-model:is-open="addMemberModal"
                    :subgroup_id="subgroup.id"
                    />
            </div>
            <div>
                <input type="text" class="rounded mt-4" placeholder="Search" v-model="search">
            </div>
        </div>

        <div class="grid-container grid gap-4 grid-cols-dashboard_widget py-3 transition-opacity ease-in duration-1000">

                <Widget v-for="(member, index) in members.data"
                        :key="index" align="center"
                        :subtitle="member.group_name+'<br/>'+member.sub_group_name"
                        :title="member.name"
                        :icon="member.avatar?'/app/'+member.avatar:'/images/icons/group.png'"
                        :view_route="route('company.member.show',{
                            member: member.id
                        })"
                        :delete_route="route('company.member.destroy',{
                            member: member.id
                        })"
                >

                </Widget>


        </div>
        <div class="flex justify-end">
            <Pagination :links="members.links"/>
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


export default {
    name: "Dashboard",
    components: {
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
            addMemberModal: false,
        };
    },
    props: {
        members: {
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
