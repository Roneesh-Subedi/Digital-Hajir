<template>
    <DashboardLayout title="Hajir Dashboard">
        <WireframeWidgets v-if="loading"/>
<!--        dashboard widgets-->

        <div
            v-else
            class="grid-container grid gap-4 grid-cols-dashboard_widget py-3 transition-opacity ease-in duration-1000"
        >

            <Widget
                :title="$page.props.groups_count"
                subtitle="Total Group"
                icon="/images/icons/group.png"
                :view_route="route('company.group.index')"
            />
<!--            <Widget :title="$page.props.groups_count" subtitle="Total Managers" icon="/images/icons/manager.png"></Widget>-->
            <Widget :title="$page.props.subgroups_count" subtitle="Total Sub Group" icon="/images/icons/subgroup.png"></Widget>

            <Widget :title="$page.props.members_count"
                    subtitle="Total Members"
                    icon="/images/icons/manager.png"
                    :view_route="route('company.member.index')"
            />
        </div>

    </DashboardLayout>
</template>

<script>
import DashboardLayout from "@/Layouts/DashboardLayout";
import WireframeWidgets from "@/Components/Wireframe/WireframeWidgets";
import Widget from "@/Components/Widgets/Widget";
import {Link} from "@inertiajs/inertia-vue3";
import draggable from 'vuedraggable'


export default {
    name: "Dashboard",
    components: {
        DashboardLayout,
        WireframeWidgets,
        Widget,
        Link,
        draggable
    },
    data() {
        return {
            loading: false,
        };
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
