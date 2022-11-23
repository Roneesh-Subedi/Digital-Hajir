<template>
    <DashboardLayout title="Hajir Dashboard">
        <h2>Groups</h2>
        <WireframeWidgets v-if="loading"/>
        <!--        dashboard widgets-->

        <div
            v-else
            class="grid-container grid gap-4 grid-cols-dashboard_widget py-3 transition-opacity ease-in duration-1000">
                <Widget
                    v-for="(group, index) in $page.props.groups" :key="index"
                    :subtitle="group.subgroups_count+' Department'"
                    :title="group.name"
                    icon="/images/icons/group.png"
                    :view_route="route('company.group.show',{
                        group: group.slug
                    })"
                    :edit_route="route('company.group.edit',{
                        group: group.slug
                    })"
                    :delete_route="route('company.group.destroy',{
                        group: group.slug
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
