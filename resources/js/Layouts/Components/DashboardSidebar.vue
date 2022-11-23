<template>
<div class="flex flex-col justify-between p-8 h-full">

    <div>
        <div class="sidebar-app-name text-center text-primary font-semibold text-2xl">
            <application-logo/>
        </div>
        <div class="pt-8">
            <ul class="pt-6" v-for="(menuItem, index) in menuItems" :key="index">
                <li class="text-sm text-gray-400 py-1">{{menuItem.name}}</li>
                <li>
                    <ul class="text-sm text-gray-600">
                        <li class="py-1" v-for="(menu, index) in menuItem.items" :key="index">
                            <Link class="flex" :href="menu.url">
                                <span v-html="menu.icon"></span>
                                <span class="px-2">
                            {{menu.name}}
                        </span>
                            </Link>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <form method="POST" @submit.prevent="logout">
        <button type="submit">
            <div class="flex text-sm text-gray-600 pt-10">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                <span class="px-2">
            Logout
        </span>
            </div>
        </button>
    </form>

</div>
</template>

<script>
import {defineComponent} from "vue";
import {Link} from "@inertiajs/inertia-vue3";
import Button from "@/Jetstream/Button";
import ApplicationLogo from "@/Jetstream/ApplicationLogo";

export default defineComponent({
    components: {
        Button,
        Link,
        ApplicationLogo
    },
    props: {
        menuItems: {
            type: Array,
            default: () => []
        },
        name: {
            type: String,
            default: "Digital Hajir"
        },
        bottomMenuItems: {
            type: Array,
            default: () => []
        }
    },
    methods: {
        logout() {
            this.$inertia.post(route('logout'));
        }
    }
})
</script>

<style scoped>

</style>
