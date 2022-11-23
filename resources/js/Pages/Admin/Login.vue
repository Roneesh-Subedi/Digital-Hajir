<template>
    <section class="h-full gradient-form bg-gray-200 md:h-screen" style="
                background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
              ">
        <div class="container py-12 px-6 h-full">
            <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
                <div class="lg:w-4/12 px-4 md:px-0 bg-white rounded-2xl shadow-2xl">
                    <div class="md:p-6 md:mx-6">
                        <div class="text-center">
                            <img
                                class="mx-auto w-32"
                                src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                                alt="logo"
                            />
                            <h4 class="text-xl font-semibold mt-1 mb-6 pb-1">We are The Lotus Team</h4>
                        </div>
                        <InputError
                            :message="flash?.error"
                        />
                        <form
                            @submit.prevent="login"
                        >
                            <p class="mb-2">Please login to your account</p>
                            <div class="mb-4">
                                <input
                                    type="email"
                                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    id="exampleFormControlInput1"
                                    placeholder="example@example.com"
                                    v-model="form.email"
                                />
                                <InputError
                                    :message="errors.email"
                                    />

                            </div>
                            <div class="mb-4">
                                <input
                                    type="password"
                                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    id="exampleFormControlInput1"
                                    placeholder="Password"
                                    v-model="form.password"

                                />
                                <InputError
                                    :message="errors.password"
                                />
                            </div>
                            <div class="text-center pt-1 mb-12 pb-1">
                                <button
                                    class="bg-primary inline-block px-6 py-2.5 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-primary-dark hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full mb-3"
                                    type="submit"
                                >
                                    Log in
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</template>

<script>
    import {defineComponent} from "vue";
    import InputError from "@/Jetstream/InputError";

    export default defineComponent({
        components: {
            InputError
        },
        props: {
            errors: Object,
            flash: Object,
        },


        data() {
            return {
                form: this.$inertia.form({
                    email: '',
                    password: ''
                })
            }
        },
        methods: {
            login(){
                this.form.post(route('admin.login'))
            }
        }
    })
</script>
