<template>
<div>
    <div class="grid-container grid gap-4 grid-cols-dashboard_widget">
        <Widget v-for="widget in [1,2,3,4,5,6]" :widget="widget" :key="widget.id"></Widget>
    </div>
</div>
</template>

<script>
import Widget from "@/Components/Widgets/Widget.vue";
export default {
    name: "Widgets",
    components: {Widget}

}
</script>

<style scoped>

</style>
