<script setup>
import MainLayout from '@/Layouts/MainLayout.vue'
import { reactive, toRefs } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';

import ContentOverlay from '@/Components/ContentOverlay.vue';

import Cog from 'vue-material-design-icons/Cog.vue'
import Grid from 'vue-material-design-icons/Grid.vue'
import PlayBoxOutline from 'vue-material-design-icons/PlayBoxOutline.vue'
import BookmarkOutline from 'vue-material-design-icons/BookmarkOutline.vue'
import AccountBoxOutline from 'vue-material-design-icons/AccountBoxOutline.vue'
let data = reactive({ post: null })
let form = reactive({ file: null })

const props = defineProps({
    postsByUser: Object,
    user: Object
})
const { postsByUser, user } = toRefs(props);

const getUploadedImage = (e) => {
    form.file = e.target.files[0]
    router.post('/users', form, {
        preserveState: false
    })
}
</script>

<template>
    <Head title="Instagram" />
    <MainLayout>
        <div class="pt-2 md:pt:2"></div>
        <div class="max-w-[880px] lg:ml-0 md:pl-20 px-4 w-[100vw]">
            <div class="flex items-center md:justify-between">
                <label for="fileUser">
                    <img class="rounded-full object-fit md:w-[100px] w-[100px] cursor-pointer"
                        src="https://picsum.photos/id/50/300/320" alt="" />
                </label>
                <input type="file" class="hidden" id="fileUser" @input="$event => getUploadedImage($event)">
                <div class="w-full ml-6">
                    <div class="flex items-center mb-5 md:mb-8">
                        <div class="md:mr-6 mr-3 rounded-lg text-[22px]">
                            NAME HERE
                        </div>
                        <button
                            class="md:block hidden md:mr-6 p-1 px-4 rounded-lg text-[16px] font-extrabold bg-gray-100 hover:ng-gray-200">
                            Edit Profile
                        </button>
                        <Cog :size="28" class="cursor-pointer" />
                    </div>
                    <button
                        class="md:hidden mr-6 p-1 px-4 max-w-[260px] w-full rounded-lg text-[17px] font-extrabold bg-gray-100 hover:bg-gray-200">
                        Edit Profile
                    </button>
                    <div class="hidden md:block">
                        <div class="flex items-center text-[18px]">
                            <div class="mr-6">
                                <span class="font-extrabold">4</span> posts
                            </div>
                            <div class="mr-6">
                                <span class="font-extrabold">10</span> followers
                            </div>
                            <div class="mr-6">
                                <span class="font-extrabold">40</span> following
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="md:hidden">
            <div class="flex items-center justify-around w-full mt-8 border-t border-t-gray-300">
                <div class="p-3 text-center">
                    <div class="font-extrabold">4</div>
                    <div class="test-gray-400 font-semibold -mt-1.5">posts</div>
                </div>
                <div class="p-3 text-center">
                    <div class="font-extrabold">10</div>
                    <div class="test-gray-400 font-semibold -mt-1.5">followers</div>
                </div>
                <div class="p-3 text-center">
                    <div class="font-extrabold">40</div>
                    <div class="test-gray-400 font-semibold -mt-1.5">following</div>
                </div>
            </div>

            <div class="flex items-center justify-between w-full border-t border-t-gray-300">
                <div class="flex justify-center w-1/4 p-3 border-t border-t-gray-900">
                    <Grid :size="27" fillColor="#0095F6" class="cursor-pointer" />
                </div>
                <div class="flex justify-center w-1/4 p-3 border-t border-t-gray-900">
                    <PlayBoxOutline :size="27" fillColor="#8E8E8E" class="cursor-pointer" />
                </div>
                <div class="flex justify-center w-1/4 p-3 border-t border-t-gray-900">
                    <BookmarkOutline :size="27" fillColor="#8E8E8E" class="cursor-pointer" />
                </div>
                <div class="flex justify-center w-1/4 p-3 border-t border-t-gray-900">
                    <AccountBoxOutline :size="27" fillColor="#8E8E8E" class="cursor-pointer" />
                </div>
            </div>
        </div>

        <div id="ContentSection" class="md:pr-1.5 lg:pl-1.0 md:pl-[90px]">
            <div class="hidden mt-10 border-t md:block border-t-gray-300">
                <div
                    class="flex items-center justify-content max-w-[600px] mx-auto font-extrabold text-gray-400 text-[15px]">
                    <div class="p-[17px] w-1/4 flex justify-center items-center border-t border-t-gray-900">
                        <Grid :size="15" fillColor="#000000" class="cursor-pointer" />
                        <div class="ml-2 -mb-[1px] text-gray-900">POSTS</div>
                    </div>
                    <div class="p-[17px] w-1/4 flex justify-center items-center">
                        <PlayBoxOutline :size="15" fillColor="#000000" class="cursor-pointer" />
                        <div class="ml-2 -mb-[1px] text-gray-900">REELS</div>
                    </div>
                    <div class="p-[17px] w-1/4 flex justify-center items-center">
                        <BookmarkOutline :size="15" fillColor="#000000" class="cursor-pointer" />
                        <div class="ml-2 -mb-[1px] text-gray-900">SAVED</div>
                    </div>
                    <div class="p-[17px] w-1/4 flex justify-center items-center">
                        <AccountBoxOutline size="15" fillColor="#000000" class="cursor-pointer" />
                        <div class="ml-2 -mb-[1px] text-gray-900">TAGGED</div>
                    </div>
                </div>
            </div>
            <div class="relative grid grid-cols-3 gap-1 md:gap-4">
                <ContentOverlay :postByUser="postsByUser" @selectedPost="$event=>data.post = $event "/>
            </div>
        </div>
    </MainLayout>
</template>
