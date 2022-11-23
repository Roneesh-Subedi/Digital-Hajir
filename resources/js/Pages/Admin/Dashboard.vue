<template>
<AdminDashboardLayout title="Admin Dashboard">
    <div>
        <div>
            Company Registration
        </div>
        <Bar
            :chart-data="{
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                datasets: [
                    {
                        label: 'Company Registration',
                        backgroundColor: '#00BCD4',
                        data: stats
                    }
                ]
            }"
            :height="150"
        />
    </div>

</AdminDashboardLayout>
</template>

<script>
import { Bar } from 'vue-chartjs'
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'
import AdminDashboardLayout from "@/Layouts/AdminDashboardLayout";

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

export default {
    name: 'BarChart',
    components: {AdminDashboardLayout, Bar },
    data() {
        return {
        }
    },
    props: {
        stats: {
            type: Array,
            required: []
        }
    },
}
</script>

<style scoped>

</style>
