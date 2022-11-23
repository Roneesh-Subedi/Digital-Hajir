<template>
    <div
        class="bg-gradient-to-r from-cyan-500 to-blue-500 min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100"
    >
        <div
            class="w-full sm:max-w-4xl mt-6 px-6 py-4 bg-white shadow-md sm:rounded-lg"
        >
            <form @submit.prevent="submit">
                <div class="flex">
                    <div class="flex-1 p-5">
                        <div class="mb-8">
                            <h1 class="text-2xl font-bold text-gray-900">
                                Register
                            </h1>
                            <p class="text-gray-600">Create Your Account</p>
                        </div>
                        <div>
                            <jet-label for="name" value="Name" />
                            <jet-input
                                id="name"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.name"
                                required
                                autofocus
                                autocomplete="name"
                            />
                        </div>
                        <div class="mt-4">
                            <jet-label for="email" value="Email" />
                            <jet-input
                                id="email"
                                type="email"
                                class="mt-1 block w-full"
                                v-model="form.email"
                                required
                            />
                        </div>

                        <div class="mt-4">
                            <jet-label for="password" value="Password" />
                            <jet-input
                                id="password"
                                type="password"
                                class="mt-1 block w-full"
                                v-model="form.password"
                                required
                                autocomplete="new-password"
                            />
                        </div>

                        <div class="mt-4">
                            <jet-label
                                for="password_confirmation"
                                value="Confirm Password"
                            />
                            <jet-input
                                id="password_confirmation"
                                type="password"
                                class="mt-1 block w-full"
                                v-model="form.password_confirmation"
                                required
                                autocomplete="new-password"
                            />
                        </div>
                    </div>
                    <div class="flex-1 p-5">
                        <div class="mb-8">
                            <h1 class="text-xl text-gray-800">
                                Company Details
                            </h1>
                        </div>
                        <!--                        logo uploader-->
                        <div class="my-4 relative">
                            <jet-label for="logo" value="Logo" />
                            <input
                                type="file"
                                class="absolute h-32 w-32 rounded-full top-0 left-0 opacity-0 cursor-pointer"
                                @input="form.logo = $event.target.files[0]"
                            />
                            <img
                                :src="previewImage"
                                class="h-32 w-32 bg-blue-100 rounded-full object-cover"
                            />
                        </div>
                        <div>
                            <jet-label
                                for="company_name"
                                value="Company Name"
                            />
                            <jet-input
                                id="company_name"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.company_name"
                                required
                                autofocus
                                autocomplete="company_name"
                            />
                        </div>
                        <div>
                            <jet-label for="address" value="Address" />
                            <jet-input
                                id="address"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.address"
                                required
                                autofocus
                                autocomplete="address"
                            />
                        </div>
                        <div>
                            <jet-label for="details" value="Details" />
                            <textarea
                                id="details"
                                class="rounded mt-1 block w-full"
                                v-model="form.details"
                                required
                                autofocus
                            ></textarea>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <Link
                                :href="route('company.login')"
                                class="underline text-sm text-gray-600 hover:text-gray-900"
                            >
                                Already registered?
                            </Link>

                            <jet-button
                                class="ml-4"
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                            >
                                Register
                            </jet-button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import JetAuthenticationCard from "@/Jetstream/AuthenticationCard.vue";
import JetAuthenticationCardLogo from "@/Jetstream/AuthenticationCardLogo.vue";
import JetButton from "@/Jetstream/Button.vue";
import JetInput from "@/Jetstream/Input.vue";
import JetCheckbox from "@/Jetstream/Checkbox.vue";
import JetLabel from "@/Jetstream/Label.vue";
import JetValidationErrors from "@/Jetstream/ValidationErrors.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { computed } from "@vue/runtime-core";

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
    company_name: "",
    logo: "",
    address: "",
    details: "",
});
const submit = () => {
    form.post(route("company.register"), {
        forceFormData: true,
    });
};
const previewImage = computed(() => {
    if (form.logo) {
        return URL.createObjectURL(form.logo);
    }
    // return placeholder image
    return 'https://via.placeholder.com/150';

});
</script>

<style scoped></style>
