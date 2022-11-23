<template>
    <TransitionRoot appear :show="isOpen" as="template">
        <Dialog as="div" @close="$emit('update:isOpen',false)">
            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div class="min-h-screen px-4 text-center">
                    <TransitionChild
                        as="template"
                        enter="duration-300 ease-out"
                        enter-from="opacity-0"
                        enter-to="opacity-100"
                        leave="duration-200 ease-in"
                        leave-from="opacity-100"
                        leave-to="opacity-0"
                    >
                        <DialogOverlay class="fixed inset-0" />
                    </TransitionChild>

                    <span class="inline-block h-screen align-middle" aria-hidden="true">
            &#8203;
          </span>

                    <TransitionChild
                        as="template"
                        enter="duration-300 ease-out"
                        enter-from="opacity-0 scale-95"
                        enter-to="opacity-100 scale-100"
                        leave="duration-200 ease-in"
                        leave-from="opacity-100 scale-100"
                        leave-to="opacity-0 scale-95"
                    >
                        <div
                            class="inline-block w-full max-w-2xl p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl"
                            :class="{'shake': isError}"
                        >
                            <form @submit.prevent="member.post(route('company.member.store'),{
                                   forceFormData: true,
                                    onBefore: (visit) => {
                                       visit.data.set('subgroup_id', this.subgroup_id.toString());
                                    },
                                    onSuccess: () => {
                                        $emit('update:isOpen',false);
                                    }
                                })">
                                <DialogTitle
                                    as="h3"
                                    class="text-lg font-medium leading-6 text-gray-900"
                                >
                                    Create Member
                                </DialogTitle>
                                <div class="mt-2">
                                    <label class="py-2" for="member_name">Avatar</label>
                                    <div class="relative">

                                        <input
                                            id="member_name"
                                            type="file"
                                            class="absolute h-32 w-32 rounded-full top-0 left-0 opacity-0 cursor-pointer"
                                            @input="member.avatar = $event.target.files[0]"
                                        />
                                        <img :src="previewImage"
                                             class="h-32 w-32 bg-blue-100 rounded-full object-cover"
                                        >
                                    </div>
                                    <div class="text-sm text-danger" v-if="member.errors.name">{{ member.errors.name }}</div>
                                </div>
                                <div class="mt-2">
                                    <label class="py-2" for="member_name">member Name</label>
                                    <input
                                        id="member_name"
                                        type="text"
                                        class="border-gray-400 rounded mt-1 block w-full"
                                        placeholder="member Name"
                                        v-model="member.name"
                                    />
                                    <div class="text-sm text-danger" v-if="member.errors.name">{{ member.errors.name }}</div>
                                </div>
                                <div class="mt-2">
                                    <label class="py-2" for="member_name">Details</label>
                                    <textarea
                                        id="details"
                                        class="border-gray-400 rounded mt-1 block w-full"
                                        placeholder="Details"
                                        v-model="member.details"
                                    ></textarea>
                                    <div class="text-sm text-danger" v-if="member.errors.name">{{ member.errors.name }}</div>
                                </div>

                                <div class="mt-4">
                                    <button
                                        type="button"
                                        class="inline-flex justify-center px-4 py-2 text-sm font-medium text-blue-900 bg-blue-100 border border-transparent rounded-md hover:bg-blue-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-blue-500"
                                        @click="$emit('update:isOpen',false)"
                                    >
                                        Close
                                    </button>
                                    <button
                                        class="inline-flex justify-center px-4 py-2 ml-2 text-sm font-medium text-white bg-primary border border-transparent rounded-md hover:bg-primary-light focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-blue-500"
                                        type="submit"
                                        :disabled="member.processing"
                                    >
                                        Create
                                    </button>
                                </div>
                            </form>
                        </div>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script setup>
import {
    TransitionRoot,
    TransitionChild,
    Dialog,
    DialogOverlay,
    DialogTitle,
} from '@headlessui/vue'
import {useForm} from "@inertiajs/inertia-vue3";
import {computed, defineProps, onMounted} from "vue";

const member = useForm({
    subgroup_id: null,
    name: '',
    details: '',
    avatar: null,
});

defineProps({
   isOpen: {
       type: Boolean,
       default: false,
   },
    subgroup_id: {
        type: Number,
        default: null,
    },
});

const previewImage = computed(() => {
    if (member.avatar) {
        return URL.createObjectURL(member.avatar);
    }
    // return placeholder image
    return 'https://via.placeholder.com/150';

});

defineEmits([
    'update:isOpen'
]);

const isError = computed(() => {
    return member.errors.name;
});


</script>

