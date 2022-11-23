<template>
<AdminDashboardLayout title="Admin Dashboard">
    <div class="flex justify-center align-center items-center flex-col">
            <h1 class="text-2xl font-bold mb-4">Company Profile</h1>
            <div>
                <object :data="'/app/'+company.logo" type="image/png" class="h-32 w-32 object-cover rounded-full">
                    <img src="/images/icons/group.png" class="h-32 w-32 object-cover rounded-full">
                </object>
            </div>
        <div class="text-primary text-2xl my-2 font-bold">
            <span>{{ company.name }}</span>
        </div>
        <div class="text-sm">
            <span>{{ company.address }}</span>
        </div>
        <div class="text-sm">
            <span>{{ company.details }}</span>
        </div>
<!--        users-->
    </div>
</AdminDashboardLayout>
</template>

<script>
import AdminDashboardLayout from "@/Layouts/AdminDashboardLayout";


export default {
    name: 'BarChart',
    components: {AdminDashboardLayout },
    props: {
        company: {
            type: Object,
            default: () => []
        },
    }

}
</script>

<style scoped>

</style>
