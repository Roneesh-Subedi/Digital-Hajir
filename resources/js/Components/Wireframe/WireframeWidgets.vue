<template>
<div>
    <div class="grid-container grid gap-4 grid-cols-dashboard_widget">
        <WireframeWidget v-for="widget in [1,2,3,4]" :widget="widget" :key="widget.id"></WireframeWidget>
    </div>
</div>
</template>

<script>
import WireframeWidget from "@/Components/Wireframe/WireframeWidget";
import {defineComponent} from "vue";
export default defineComponent({
    name: "Widgets",
    components: {WireframeWidget}

})
</script>

<style scoped>

</style>
