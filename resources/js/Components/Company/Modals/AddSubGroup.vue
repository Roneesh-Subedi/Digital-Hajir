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
                            <form @submit.prevent="subgroup.post(route('company.subgroup.store'),{
                                    onBefore: (visit)=>{
                                      visit.data.group_id = group_id;
                                    },
                                    onSuccess: () => {
                                        $emit('update:isOpen',false);
                                    }
                                })">
                                <DialogTitle
                                    as="h3"
                                    class="text-lg font-medium leading-6 text-gray-900"
                                >
                                    Create subgroup
                                </DialogTitle>
                                <div class="mt-2">
                                    <label class="py-2" for="subgroup_name">subgroup Name</label>
                                    <input
                                        id="subgroup_name"
                                        type="text"
                                        class="border-gray-400 rounded mt-1 block w-full"
                                        placeholder="subgroup Name"
                                        v-model="subgroup.name"
                                    />
                                    <div class="text-sm text-danger" v-if="subgroup.errors.name">{{ subgroup.errors.name }}</div>
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
                                        :disabled="subgroup.processing"
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
import {computed, defineProps} from "vue";

const subgroup = useForm({
    name: '',
    group_id: '',
});
defineProps({
   isOpen: {
       type: Boolean,
       default: false,
   },
    group_id: Number,
});
defineEmits([
    'update:isOpen'
]);
const isError = computed(() => {
    return subgroup.errors.name;
});


</script>

