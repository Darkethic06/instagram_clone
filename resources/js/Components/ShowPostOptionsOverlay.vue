<script setup>
import { toRefs } from "vue";

defineEmits(["close", "deleteSelected"]);
const props = defineProps({
    deleteType: String,
    id: Number,
});

const { deleteType, id } = toRefs(props);
</script>

<template>
    <div
        id="ShowPostOptionsOverlay"
        class="fixed top-0 left-0 z-50 flex items-center w-full h-screen bg-[#000000] bg-opacity-60 p-3"
    >
        <div
            class="w-full max-w-sm mx-auto mt-10 text-center bg-white rounded-xl"
        >
            <button
                class="w-full p-3 text-lg font-extrabold text-red-600 border-b cursor-pointer border-b-gray-300"
            >
                Delete
            </button>
            <div
                class="p-3 text-lg cursor-pointer"
                @click="($event) => $emit('close')"
            >
                Cancel
            </div>
        </div>
    </div>
</template>
