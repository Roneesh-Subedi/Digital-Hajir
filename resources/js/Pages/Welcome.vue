<template>
    <Head title="Welcome"/>
    <div>
        <div class="flex flex-col md:flex-row justify-between p-8 mx-auto max-w-7xl">
            <div
                class="text_logo text-4xl font-bold text-primary"
            >
                Digital<span class="text-secondary">Hajir</span>
            </div>
            <div>
                <div v-if="canLogin">
                    <Link v-if="$page.props.user" :href="route('company.dashboard')" class="text-sm text-gray-700">
                        Dashboard
                    </Link>

                    <template v-else>
                        <Link :href="route('company.login')" class="text-sm text-gray-700">
                            Log in
                        </Link>

                        <Link v-if="canRegister" :href="route('company.register')" class="ml-4 text-sm text-gray-700">
                            Register
                        </Link>
                    </template>
                </div>
            </div>
        </div>
    </div>

    <!-- component -->
    <!--    hero section-->
    <section class="text-gray-600 body-font">
        <div
            class="container flex px-8 py-12 mx-auto space-y-12 max-w-7xl xl:px-12 md:flex-row flex-col items-center">
            <div
                class="lg:flex-grow md:w-1/4 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Lets Start
                    <br class="hidden lg:inline-block">Using Digital Hajir
                </h1>
                <p class="mb-8 leading-relaxed">
                    Efficient, Eco-friendly, Economic, Mobile and Secure attendence solution, your small step can save lots of tree and lots of money that you can use in productive sector
                </p>
                <div class="flex justify-center">
                    <Link v-if="canRegister" :href="route('company.register')"
                        class="inline-flex text-white bg-primary border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg"

                    >
                            Lets Change
                        </Link>
                </div>
            </div>
            <div class="lg:max-w-lg lg:w-full md:w-3/4">
                <img class="object-cover object-center rounded" alt="hero" src="/images/why.png">
            </div>
        </div>
    </section>


    <section class="py-20 bg-white">
        <div class="flex flex-col px-8 mx-auto space-y-12 max-w-7xl xl:px-12">
            <div class="relative">
                <h2 class="w-full text-3xl font-bold text-center sm:text-4xl md:text-5xl"> Features</h2>
                <p class="w-full py-8 mx-auto -mt-2 text-lg text-center text-gray-700 intro sm:max-w-3xl">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis illum cumque explicabo commodi suscipit iste corrupti earum sapiente dicta veniam?
                </p>
            </div>
            <div class="flex flex-col mb-8 animated fadeIn sm:flex-row">
                <div class="flex items-center mb-8 sm:w-1/2 md:w-5/12 sm:order-last">
                    <img class="rounded-lg shadow-xl"
                         src="/images/screenshoot/responsive.png" alt="">
                </div>
                <div class="flex flex-col justify-center mt-5 mb-8 md:mt-0 sm:w-1/2 md:w-7/12 sm:pr-16">
                    <p class="mb-2 text-sm font-semibold leading-none text-left text-primary uppercase">
                        Intractive Dashboard
                    </p>
                    <h3 class="mt-2 text-2xl sm:text-left md:text-4xl">Responsive Dashboard</h3>
                    <p class="mt-5 text-lg text-gray-700 text md:text-left">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Id voluptatem culpa ex laborum doloribus, ratione iure molestias porro placeat vero omnis quae cupiditate totam deserunt ipsum accusantium vel provident tenetur architecto? Quisquam dolore provident itaque obcaecati dicta. Quaerat, cumque expedita!
                    </p>
                </div>
            </div>
            <div class="flex flex-col mb-8 animated fadeIn sm:flex-row">
                <div class="flex items-center mb-8 sm:w-1/2 md:w-5/12">
                    <img class="rounded-lg shadow-xl" src="/images/screenshoot/members_details.png"
                         alt="">
                </div>
                <div class="flex flex-col justify-center mt-5 mb-8 md:mt-0 sm:w-1/2 md:w-7/12 sm:pl-16">
                    <p class="mb-2 text-sm font-semibold leading-none text-left text-primary uppercase">Manage Member</p>
                    <h3 class="mt-2 text-2xl sm:text-left md:text-4xl">
                        Great Imformative Member Details
                    </h3>
                    <p class="mt-5 text-lg text-gray-700 text md:text-left">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque laborum odit ipsa provident expedita doloremque sint harum reiciendis, commodi, sequi error unde eius fuga et dolorum fugiat veritatis mollitia accusamus.
                    </p>
                </div>
            </div>
            <div class="flex flex-col mb-8 animated fadeIn sm:flex-row">
                <div class="flex items-center mb-8 sm:w-1/2 md:w-5/12 sm:order-last">
                    <img class="rounded-lg shadow-xl" src="/images/screenshoot/calender.png"
                         alt="">
                </div>
                <div class="flex flex-col justify-center mt-5 mb-8 md:mt-0 sm:w-1/2 md:w-7/12 sm:pr-16">
                    <p class="mb-2 text-sm font-semibold leading-none text-left text-primary uppercase">Calender</p>
                    <h3 class="mt-2 text-2xl sm:text-left md:text-4xl">Where You Can note your event</h3>
                    <p class="mt-5 text-lg text-gray-700 text md:text-left">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Libero, blanditiis animi vero, architecto nostrum quidem reprehenderit ullam quis maxime neque, fugiat asperiores consectetur expedita praesentium saepe unde doloremque molestiae iure?
                    </p>
                </div>
            </div>

        </div>
    </section>


    <section class="text-gray-600 body-font">
        <div class="container px-8 py-12 mx-auto space-y-12 max-w-7xl xl:px-12">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="text-2xl font-medium title-font mb-4 text-gray-900">OUR TEAM</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Whatever cardigan tote bag tumblr hexagon brooklyn
                    asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't heard of
                    them.</p>
            </div>
            <div class="flex flex-wrap -m-4 justify-center align-center">
                <div
                    v-for="(member, index) in teamMembers"
                    :key="index"
                    class="p-4 lg:w-1/4 md:w-1/2">
                    <div class="h-full flex flex-col items-center text-center">
                        <img alt="team" class="flex-shrink-0 rounded-lg w-full h-64 object-cover object-center mb-4"
                        :src="member.image"
                        >
                        <div class="w-full">
                            <h2 class="title-font font-medium text-lg text-gray-900">{{ member.name }}</h2>
                            <h3 class="text-gray-500 mb-3">{{ member.position }}</h3>
                            <p class="mb-4"> {{member.details}}</p>
                            <span class="inline-flex">
              <a class="text-gray-500">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                </svg>
              </a>
              <a class="ml-2 text-gray-500">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     class="w-5 h-5" viewBox="0 0 24 24">
                  <path
                      d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                </svg>
              </a>
              <a class="ml-2 text-gray-500">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     class="w-5 h-5" viewBox="0 0 24 24">
                  <path
                      d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                </svg>
              </a>
            </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="text-gray-400 bg-gray-900 body-font relative">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-12">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-white">Contact Us</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Whatever cardigan tote bag tumblr hexagon brooklyn
                    asymmetrical gentrify.</p>
            </div>
            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                <div class="flex flex-wrap -m-2">
                    <div class="p-2 w-1/2">
                        <div class="relative">
                            <label for="name" class="leading-7 text-sm text-gray-400">Name</label>
                            <input type="text" id="name" name="name"
                                   class="w-full bg-gray-800 bg-opacity-40 rounded border border-gray-700 focus:border-indigo-500 focus:bg-gray-900 focus:ring-2 focus:ring-indigo-900 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-1/2">
                        <div class="relative">
                            <label for="email" class="leading-7 text-sm text-gray-400">Email</label>
                            <input type="email" id="email" name="email"
                                   class="w-full bg-gray-800 bg-opacity-40 rounded border border-gray-700 focus:border-indigo-500 focus:bg-gray-900 focus:ring-2 focus:ring-indigo-900 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="message" class="leading-7 text-sm text-gray-400">Message</label>
                            <textarea id="message" name="message"
                                      class="w-full bg-gray-800 bg-opacity-40 rounded border border-gray-700 focus:border-indigo-500 focus:bg-gray-900 focus:ring-2 focus:ring-indigo-900 h-32 text-base outline-none text-gray-100 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                        </div>
                    </div>
                    <div class="p-2 w-full">
                        <button
                            class="flex mx-auto text-white bg-primary border-0 py-2 px-8 focus:outline-none hover:bg-primary-dark rounded text-lg">
                            Send Message
                        </button>
                    </div>
                    <div class="p-2 w-full pt-8 mt-8 border-t border-gray-800 text-center">
                        <a class="text-primary">info@digitalhajir.test</a>
                        <p class="leading-normal my-5">Kalanki Kathmandu
                            <br>Opposite of National Hospital
                        </p>

                        <span class="inline-flex">
            <a class="text-gray-500">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                   viewBox="0 0 24 24">
                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
              </svg>
            </a>
            <a class="ml-4 text-gray-500">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                   viewBox="0 0 24 24">
                <path
                    d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
              </svg>
            </a>
            <a class="ml-4 text-gray-500">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                   class="w-5 h-5" viewBox="0 0 24 24">
                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
              </svg>
            </a>
            <a class="ml-4 text-gray-500">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                   viewBox="0 0 24 24">
                <path
                    d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
              </svg>
            </a>
          </span>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--    footer section -->

    <footer class="text-center text-white bg-primary-dark">
        <div class="container p-6">
            <div class="">
                <p class="flex justify-center items-center">
                    <span class="mr-4">Register for free</span>
                    <Link :href="route('company.login')"
                          class="inline-block px-6 py-2 border-2 border-white text-white font-medium text-xs leading-tight uppercase rounded-full hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                        Sign up!
                    </Link>
                </p>
            </div>
        </div>

        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.2);">
            © {{ new Date().getFullYear() }} Copyright:
            <a class="text-white" href="digitalhajir.com">DigitalHajir</a>
        </div>
    </footer>
</template>

<script setup>

import {Head, Link} from '@inertiajs/inertia-vue3';
import {defineProps} from "vue";

const pops = defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
const teamMembers = [
    // {
    //     name: 'Suman Panta',
    //     position: 'Web Developer',
    //     image: 'https://scontent.fktm6-1.fna.fbcdn.net/v/t1.6435-9/86171347_2650087598441194_961927955380961280_n.jpg?_nc_cat=106&ccb=1-7&_nc_sid=19026a&_nc_ohc=t0xvoxB3QkIAX-6RGMd&_nc_ht=scontent.fktm6-1.fna&oh=00_AT8nBG59pnpxoViZesvdI9zc_rAj-euGwwAzbs0DiK41xw&oe=62C02BAD',
    //     details:"lorem20"
    // },
    {
        name: 'Ronish Subedi',
        position: 'UX/UI Designer',
        image: '/images/ronish.jpg',
        details:"lorem20"
    },
    // {
    //     name: 'Regina Khatiwada',
    //     position: 'Project Manager',
    //     image: 'https://scontent.fktm6-1.fna.fbcdn.net/v/t39.30808-6/279034754_1293476611175453_3706241438276359844_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=8bfeb9&_nc_ohc=FoYTelwwnC0AX8eYriM&_nc_ht=scontent.fktm6-1.fna&oh=00_AT_n97LfNATDnTQgh2QM4fGuhseKy8O2Y2pJBs_zFIFF0g&oe=629D136E',
    //     details:"lorem20"
    // },
    {
        name: 'Narayan Gajurel',
        position: 'Full Stack Developer',
        image: '/images/nrngajurel.jpg',
        details:"lorem20"
    }


]
</script>
