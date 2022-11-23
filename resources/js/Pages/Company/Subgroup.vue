<template>
    <DashboardLayout title="Hajir Dashboard">
        <h2> {{ group.name??'Nrn' }}'s Group</h2>

        <button @click="addSubGroupModal = !addSubGroupModal">Add Sub Group</button>
        <AddSubGroup
            v-model:isOpen="addSubGroupModal"
            :group_id="group.id"
        />
        <WireframeWidgets v-if="loading"/>
        <!--        dashboard widgets-->

        <div v-else class="grid-container grid gap-4 grid-cols-dashboard_widget py-3 transition-opacity ease-in duration-1000">
            <Widget
                v-for="(sub_group, index) in group.subgroups" :key="index"
                :subtitle="sub_group.members_count+' Members'"
                :title="sub_group.name"
                icon="/images/icons/group.png"
                :view_route="route('company.subgroup.show',{
                        subgroup: sub_group.slug
                    })"
                :edit_route="route('company.subgroup.edit',{
                        subgroup: sub_group.slug
                    })"
                :delete_route="route('company.subgroup.destroy',{
                        subgroup: sub_group.slug
                    })"
            />
        </div>

    </DashboardLayout>
</template>

<script>
import DashboardLayout from "@/Layouts/DashboardLayout";
import WireframeWidgets from "@/Components/Wireframe/WireframeWidgets";
import Widget from "@/Components/Widgets/Widget";
import {Link} from "@inertiajs/inertia-vue3";
import AddSubGroup from "@/Components/Company/Modals/AddSubGroup";

export default {
    name: "Dashboard",
    components: {
        AddSubGroup,
        DashboardLayout,
        WireframeWidgets,
        Widget,
        Link
    },
    data() {
        return {
            loading: false,
            addSubGroupModal: false,
        };
    },
    props: {
        group: {
            type: Object,
            default: () => ({})
        }
    },
    created() {
        this.loading = true;
        setTimeout(() => {
            this.loading = false;
        }, 200);
    }
}
</script>

<style scoped>

</style>
