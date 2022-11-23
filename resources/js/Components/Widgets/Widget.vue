<template>
<!--widget wireframe with tailwindcss-->
<div class="bg-gray-100 border-l-4 border-primary rounded-lg shadow-lg p-4">
    <div class="relative flex flex-wrap" :class="{'justify-center':align ==='center'}">

        <div v-if="edit_route || delete_route" class="absolute right-0">
            <Menu as="div" class="relative inline-block text-left">
                        <div>
                            <MenuButton
                                class="inline-flex p-1 rounded-full bg-primary hover:bg-gray-600 text-gray-50 shadow"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </MenuButton>
                        </div>

                        <transition
                            enter-active-class="transition duration-100 ease-out"
                            enter-from-class="transform scale-95 opacity-0"
                            enter-to-class="transform scale-100 opacity-100"
                            leave-active-class="transition duration-75 ease-in"
                            leave-from-class="transform scale-100 opacity-100"
                            leave-to-class="transform scale-95 opacity-0"
                        >
                            <MenuItems
                                class="absolute right-0 w-48 mt-2 origin-top-right bg-white divide-y divide-gray-100 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            >
                                <div class="px-1 py-1">
                                    <MenuItem v-slot="{ active }">
                                        <Link
                                            :href="edit_route"
                                            :class="[
                                              active ? 'bg-gray-100' : 'text-gray-500',
                                              'group flex rounded-md items-center w-full px-2 py-2 text-sm',
                                            ]"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                            Edit
                                        </Link>
                                    </MenuItem>
                                    <MenuItem v-slot="{ active }">
                                        <Link
                                            :href="delete_route"
                                            method="delete"
                                            :class="[
                                              active ? 'bg-gray-100 text-danger' : 'text-danger',
                                              'group flex rounded-md items-center w-full px-2 py-2 text-sm',
                                            ]"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            Delete
                                        </Link>
                                    </MenuItem>
                                </div>
                            </MenuItems>
                        </transition>
                    </Menu>

        </div>


        <div class="flex-shrink-0 w-full">
            <Link
                :href="view_route"
                :disabled="view_route === null"
            >
                <div class="flex flex-wrap items-center" :class="{'flex-col justify-center text-center':align==='center'}">
                    <div class="flex-shrink-0">
                        <!--                    student icon-->
<!--                        <img :src=icon class="h-32 w-32 object-cover rounded-full">-->
<!--                        image with default image-->
                        <object :data="icon" type="image/png" class="h-16 w-16 object-cover rounded-full">
                            <img src="/images/icons/group.png" class="h-16 w-16 object-cover rounded-full">
                        </object>
                    </div>
                    <div class="ml-3 pt-3">
                        <!--                    total student-->
                        <h3 class="text-xl font-bold text-primary leading-5 font-medium">
                            {{ title }}
                        </h3>
                        <h4 class="text-sm font-bold leading-5 text-gray-500 pt-2">
                            <div v-html="subtitle"></div>
                        </h4>
                    </div>
                </div>
            </Link>
        </div>
    </div>
</div>
</template>

<script>
import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue'
import {Link} from "@inertiajs/inertia-vue3";
export default {
    name: "Widget",
    components: { Menu, MenuButton, MenuItems, MenuItem, Link },

    props: {
        title: String,
        subtitle: String,
        icon: {
            type: String,
            default: '/images/icons/manager.png'
        },
        align: {
            type: String,
            default: 'left'
        },
        view_route: {
            type: String,
            nullable: true
        },
        edit_route: {
            type: String,
            nullable: true
        },
        delete_route: {
            type: String,
            nullable: true
        }
    }
}
</script>

<style scoped>

</style>
