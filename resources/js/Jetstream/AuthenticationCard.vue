<template>
    <div class="bg-gradient-to-r from-cyan-500 to-blue-500 min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md sm:rounded-lg">
            <div class="flex justify-center items-center -mt-14 mb-6">
                <div class="rounded-full bg-white p-4 shadow-lg">
                    <slot name="logo" />
                </div>
            </div>

            <slot />
        </div>
    </div>
</template>
