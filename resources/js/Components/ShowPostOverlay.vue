<script setup>
import { ref, toRefs } from "vue";
import { usePage } from "@inertiajs/vue3";

import ShowPostOptionsOverlay from "@/Components/ShowPostOptionsOverlay.vue";
import LikeSection from "./LikeSection.vue";

import Close from "vue-material-design-icons/Close.vue";
import DotsHorizontal from "vue-material-design-icons/DotsHorizontal.vue";
import EmoticonHappyOutline from "vue-material-design-icons/EmoticonHappyOutline.vue";

let comment = ref("");
let deleteType = ref(null);
let id = ref(null);

const user = usePage().props.auth.user;

const props = defineProps(["post"]);
const { post } = toRefs(props);

defineEmits(["closeOverlay", "addComment", "updateLike", "deleteSelected"]);

const textareaInput = (e) => {
    textareaInput.value.style.height = "auto";
    textareaInput.value.style.height = `${e.target.scrollHeight}px`;
};
</script>

<template>
    <div
        id="OverlaySection"
        class="fixed z-50 top-0 left-0 w-full h-screen bg-[#000000] bg-opacity-60 p-3"
    >
        <button
            class="absolute right-3"
            @click="($event) => $emit('closeOverlay')"
        >
            <close :size="27" fillColor="#FFFFFF" />
        </button>
        <div
            class="max-w-6xl h-[clac(100%-100px)] mx-auto mt-10 bg-white rounded-xl"
        >
            <div class="w-full h-full overflow-auto md:flex rounded-xl">
                <div class="flex items-center w-full bg-black">
                    <img
                        src="https://picsum.photos/id/54/600/620"
                        alt=""
                        class="rounded-xl min-w-[400px] p-4 mx-auto"
                    />
                </div>
                <div class="md:max-w-[500px] w-full relative">
                    <div class="flex items-center justify-between p-3 border-b">
                        <div class="flex items-center">
                            <img
                                src="https://picsum.photos/id/54/400/420"
                                class="rounded-full w-[38px] h-[38px]"
                                alt=""
                            />
                            <div class="ml-4 font-extrabold text-[15px]">
                                NAME HERE
                            </div>
                            <div
                                class="flex items-center text-[15px] text-gray-500"
                            >
                                <span class="-mt-5 ml-2 mr-[5px] text-[35px]"
                                    >.</span
                                >
                                <div>DATE HERE</div>
                            </div>
                        </div>
                        <button>
                            <DotsHorizontal class="cursor-pointer" :size="27" />
                        </button>
                    </div>
                    <div class="overflow-y-auto h-[clac(100%-170px)]">
                        <div class="flex items-center justify-between p-3">
                            <div class="relative flex items-center">
                                <img
                                    class="absolute -top-1 rounded-full w-[38px] h-[38px]"
                                    src="https://picsum.photos/id/54/400/420"
                                    alt=""
                                />

                                <div class="ml-14">
                                    <span
                                        class="font-extrabold text-[15px] mr-2"
                                    >
                                        NAME HERE
                                    </span>
                                    <span class="text-[15px] text-gray-900">
                                        THIS IS A COMMENT
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="p-3">
                            <div class="flex justify-between item-center">
                                <div class="flex items-center">
                                    <img
                                        src="https://picsum.photos/id/54/800/820"
                                        alt=""
                                        class="rounded-full w-[38px] h-[38px]"
                                    />
                                    <div
                                        class="ml-4 font-extrabold text-[15px]"
                                    >
                                        NAME HERE
                                        <span
                                            class="text-sm font-light text-gray-700"
                                            >DATE HERE</span
                                        >
                                    </div>
                                </div>
                                <DotsHorizontal
                                    class="cursor-pointer"
                                    :size="27"
                                />
                            </div>

                            <div class="text-[13px] pl-[55px]">
                                This is comment section
                            </div>
                        </div>

                        <div class="pb-16 md:hidden"></div>
                    </div>
                    <LikeSection class="px-2 mb-2 border-t" />
                    <div
                        class="absolute flex border bottom-0 w-full max-h-[200px] bg-white overflow-auto"
                    >
                        <EmoticonHappyOutline
                            class="pl-3 pt-[10px]"
                            :size="30"
                        />
                        <textarea
                            ref="textarea"
                            :oninput="textareaInput"
                            v-model="comment"
                            placeholder="Add a comment..."
                            rows="1"
                            class="w-full border-0 mt-2 mb-2 text-sm z-50 focus:ring-0 text-gray-600 text-[18px]"
                        ></textarea>
                        <button
                            v-if="comment"
                            class="pr-4 font-extrabold text-blue-600"
                        >
                            Post
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <ShowPostOptionsOverlay v-if="deleteType" />
</template>
