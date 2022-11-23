<template>
    <Head :title="title"/>
    <div class="bg-primary min-h-screen">
        <div class="flex">

            <!--            sidebar-->
            <div
                class="sidebar-wrapper w-[300px] bg-gray-100 shadow-2xl h-screen z-30 absolute md:relative md:left-0"
                :class="[sidebarOpen? 'left-0':'-left-full md:left-0']"
            >
                <DashboardSidebar :menu-items="menuItems"/>
            </div>

            <!--            main content-->
            <!--            header-->
            <div class="main-wrapper flex-1 overflow-y-auto">
                <div class="header flex justify-between items-center text-gray-50 p-4">
                    <button @click="toggleSidebar" class="hover:bg-primary-dark rounded p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h7"/>
                        </svg>
                    </button>
                    <div>
                        <h1 class="text-2xl uppercase font-semibold">Digital Hajir</h1>
                    </div>
                    <div>
                        <Menu as="div" class="relative inline-block text-left">
                            <div>
                                <MenuButton>
                                    <div>
                                        <img
                                            src="https://avatars3.githubusercontent.com/u/52709853?s=460&u=f9f8b8d8f9f8b8d8f9f8b8d8f9f8b8d8f9f8b8d&v=4"
                                            alt="avatar" class="rounded-full h-10 w-10">
                                    </div>
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
                                    class="absolute right-0 w-56 mt-2 origin-top-right bg-white divide-y divide-gray-100 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                >
                                    <div class="px-1 py-1">
                                        <MenuItem v-slot="{ active }">
                                            <button
                                                :class="[
                  active ? 'bg-primary text-white' : 'text-gray-600',
                  'group flex rounded-md items-center w-full px-2 py-2 text-sm',
                ]"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                                </svg>
                                                Profile
                                            </button>
                                        </MenuItem>
                                        <MenuItem v-slot="{ active }">
                                            <form method="POST" @submit.prevent="logout">
                                                <button
                                                    :class="[
                      active ? 'bg-primary text-white' : 'text-gray-600',
                      'group flex rounded-md items-center w-full px-2 py-2 text-sm',
                    ]"
                                                    type="submit"
                                                >
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                                    </svg>
                                                    Logout
                                                </button>
                                            </form>
                                        </MenuItem>
                                    </div>
                                </MenuItems>
                            </transition>
                        </Menu>
                    </div>
                </div>

                <div class="main-content m-2 md:m-6 bg-white min-h-screen p-4 rounded-2xl text-gray-500 mb-32">
                    <slot></slot>
                </div>
            </div>
        </div>
        <DashboardModals/>
        <!--        mobile bottom navigation-->
        <div
            class="bottom-navigation w-full bg-gray-100 shadow-2xl border-t border-gray-300 z-10 fixed bottom-0 md:hidden text-gray-500 rounded-t-2xl">
            <div class="flex justify-between items-center p-4">
                <Link :href="route('company.dashboard')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-8" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                </Link>
                <!--                group-->
                <Link :href="route('company.group.index')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-8" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </Link>

                <!--                calender-->
                <Link :href="route('company.group.index')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-8" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                    </svg>
                </Link>

                <Link :href="route('company.group.index')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-8" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </Link>

                <!--                user-->
                <Link :href="route('company.group.index')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-8" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </Link>


            </div>
        </div>

    </div>
</template>

<script>
import {defineComponent, computed} from "vue";
import {Head, usePage} from "@inertiajs/inertia-vue3";
import DashboardSidebar from "@/Layouts/Components/DashboardSidebar";
import {Link} from "@inertiajs/inertia-vue3";
import {Menu, MenuButton, MenuItems, MenuItem} from '@headlessui/vue'
import DashboardModals from "@/Layouts/Components/DashboardModals";
import Swal from 'sweetalert2'



function showSuccessModal(message) {
    Swal.fire({
        title: 'Success',
        icon: 'success',
        text: message,
        type: 'success',
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ok',
    })
}
function showErrorModal(message) {
    Swal.fire({
        title: 'Error',
        icon: 'error',
        text: message,
        type: 'error',
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ok',
    })
}

export default defineComponent({
    components: {
        Head,
        DashboardSidebar,
        Link,
        Menu,
        MenuButton,
        MenuItems,
        MenuItem,
        DashboardModals,
        Swal
    },

    props: {
        title: {
            type: String,
            default: "Dashboard"
        },
        flash: {
            type: Object,
            default: () => ({})
        },
    },

    data() {
        return {
            sidebarOpen: false,
            menuItems: [
                {
                    name: "Dashboard",
                    items: [
                        {
                            name: 'Dashboard',
                            url: route('company.dashboard'),
                            icon: '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">\n' +
                                '  <path stroke-linecap="round" stroke-linejoin="round" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />\n' +
                                '</svg>'
                        },
                        {
                            name: 'Groups',
                            url: route('company.group.index'),
                            icon: '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">\n' +
                                '  <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />\n' +
                                '</svg>'
                        },
                        {
                            name: 'Calender',
                            url: route('company.calender.index'),
                            icon: '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">\n' +
                                '  <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />\n' +
                                '</svg>'
                        },
                        {
                            name: 'Members',
                            url: route('company.member.index'),
                            icon: '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">\n' +
                                '  <path stroke-linecap="round" stroke-linejoin="round" d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2" />\n' +
                                '  <circle cx="12" cy="7" r="4" />\n' +
                                '</svg>'
                        }
                    ]

                },
                {
                    name: "Group",
                    items: []
                }
            ]
        }
    },
    mounted() {
        this.menuItems.map((item) => {
            if (item.name === 'Group') {
                this.$page.props.groups?.map(group => {
                    item.items.push({
                        name: group.name,
                        url: route('company.group.show', {
                            group: group.slug
                        }),
                        icon: '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">\n' +
                            '  <path stroke-linecap="round" stroke-linejoin="round" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />\n' +
                            '</svg>'
                    })
                })
                item.items.push({
                    name: 'Create Group',
                    url: route('company.group.create'),
                    icon: '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">\n' +
                        '  <path stroke-linecap="round" stroke-linejoin="round" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />\n' +
                        '</svg>'
                })
            }
        });

    },
    updated() {
        if (this.$page.props.flash.success) {
            showSuccessModal(this.$page.props.flash.success);
            this.$page.props.flash.success = null;
        }
        if (this.$page.props.flash.error) {
            showErrorModal(this.$page.props.flash.error);
            this.$page.props.flash.error = null;
        }
    },


    methods: {
        toggleSidebar: function () {
            this.sidebarOpen = !this.sidebarOpen;
        },
        logout() {
            this.$inertia.post(route('logout'));
        },

    }

})
</script>

<style scoped>
/* sidebar animation */
.sidebar-wrapper {
    /*-webkit-transition: all 0.3s ease;*/
    /*-moz-transition: all 0.3s ease;*/
    /*-o-transition: all 0.3s ease;*/
    /*-ms-transition: all 0.3s ease;*/
    transition: all 0.3s ease;
}

</style>

