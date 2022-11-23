<template>
    <TransitionRoot appear :show="isOpen" as="template">
        <Dialog as="div" @close="closeModal">
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
                            <form @submit.prevent="group.post(route('company.group.store'),{
                                    onSuccess: () => {
                                        closeModal();
                                    }
                                })">
                                <DialogTitle
                                    as="h3"
                                    class="text-lg font-medium leading-6 text-gray-900"
                                >
                                    Create Group
                                </DialogTitle>
                                <div class="mt-2">
                                    <label class="py-2" for="group_name">Group Name</label>
                                    <input
                                        id="group_name"
                                        type="text"
                                        class="border-gray-400 rounded mt-1 block w-full"
                                        placeholder="Group Name"
                                        v-model="group.name"
                                    />
                                    <div class="text-sm text-danger" v-if="group.errors.name">{{ group.errors.name }}</div>
                                </div>

                                <div class="mt-4">
                                    <button
                                        type="button"
                                        class="inline-flex justify-center px-4 py-2 text-sm font-medium text-blue-900 bg-blue-100 border border-transparent rounded-md hover:bg-blue-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-blue-500"
                                        @click="closeModal"
                                    >
                                        Close
                                    </button>
                                    <button
                                        class="inline-flex justify-center px-4 py-2 ml-2 text-sm font-medium text-white bg-primary border border-transparent rounded-md hover:bg-primary-light focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-blue-500"
                                        type="submit"
                                        :disabled="group.processing"
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
    </TransitionRoot >
</template>

<!--to composition api -->
<script setup>
import {
    TransitionRoot,
    TransitionChild,
    Dialog,
    DialogOverlay,
    DialogTitle,
} from '@headlessui/vue'
import {useForm, usePage} from "@inertiajs/inertia-vue3";
import {computed, ref, watch} from "vue";

const isOpen = ref(false);
const group = useForm({
    name: '',
});

const { props } = usePage();
const flash = props.value.flash;
const isError = computed(() => {
    return group.errors.name;
});


function closeModal() {
    isOpen.value = false
}
function openModal() {
    isOpen.value = true
}
const instruction = computed(() => {
    return usePage().props.value.flash?.instruction;
});
const edit_group = computed(() => {
    return usePage().props.value.edit_group;
});
watch(instruction, (newInstructions) => {
    if (newInstructions) {
        openModal();
    }
}, {
    immediate: true,
});
watch(edit_group, (newEditGroup) => {
    if (newEditGroup) {
        openModal();
        title.value = newEditGroup.name;
    }
}, {
    immediate: true,
});


</script>

<style scoped>
.shake {
    animation: shake 0.82s cubic-bezier(0.36, 0.07, 0.19, 0.97) both;
    transform: translate3d(0, 0, 0);
}

@keyframes shake {
    10%,
    90% {
        transform: translate3d(-1px, 0, 0);
    }

    20%,
    80% {
        transform: translate3d(2px, 0, 0);
    }

    30%,
    50%,
    70% {
        transform: translate3d(-4px, 0, 0);
    }

    40%,
    60% {
        transform: translate3d(4px, 0, 0);
    }
}
</style>
