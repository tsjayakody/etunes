<template>
    <Head title="Images" />
        <div class="py-12">
            <div class="max-w-fit mx-auto sm:px-6 lg:px-8">
                <h1 class="mb-3 border-l-4 border-red-600 bg-red-300 w-fit pl-2 pr-5 py-1 text-xl">Change main page images</h1>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex flex-grow flex-row gap-4 justify-center">
                            <div class="max-w-[440px] flex-1">
                                <div class="bg-[#f40003] p-1 text-center text-white font-bold">Header Image (440px x 620px) Max: 800kb</div>
                                <img :src="himage" alt="" srcset="">
                                <label class="w-full mt-2 flex flex-col items-center px-4 py-3 hover:bg-[#f40003] text-blue tracking-wide uppercase border-[#f40003] border-2 cursor-pointer transition-colors duration-300 hover:text-white text-[#f40003]">
                                    <span v-if="isLoading">
                                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                    </span>
                                    <span v-else class="font-black leading-normal">
                                        Replace Image
                                    </span>
                                    <input :disabled="isLoading" type='file' class="hidden" @change.prevent="submitHeaderImage" ref="hinput"/>
                                </label>
                            </div>
                            <div class="max-w-[440px] flex-1">
                                <div class="bg-[#f40003] p-1 text-center text-white font-bold">Secondary Image (440px x 620px) Max: 800kb</div>
                                <img :src="simage" alt="" srcset="">
                                <label class="w-full mt-2 flex flex-col items-center px-4 py-3 hover:bg-[#f40003] text-blue tracking-wide uppercase border-[#f40003] border-2 cursor-pointer transition-colors duration-300 hover:text-white text-[#f40003]">
                                    <span v-if="isLoading">
                                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                    </span>
                                    <span v-else class="font-black leading-normal">
                                        Replace Image
                                    </span>
                                    <input :disabled="isLoading" type='file' class="hidden" @change.prevent="submitSecondaryImage" ref="sinput"/>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3';
import { Notify } from 'notiflix/build/notiflix-notify-aio';

export default {
    layout: BreezeAuthenticatedLayout,
    props: ['himage', 'simage'],
    components: {
        BreezeAuthenticatedLayout,
        Head,
    },
    data(){
        return {
            isLoading: false,
        }
    },
    methods: {
        submitHeaderImage(event) {
            if (event.target.files) {
                let formData = new FormData();
                formData.append('file', event.target.files[0])
                this.$inertia.post(route('headerimage.createupdate'), formData, {
                    onStart: () => {
                        this.isLoading = true;
                    },
                    onFinish: () => {
                        this.$refs.hinput.value = null;
                        this.isLoading = false;
                    },
                    onError(error){
                        Notify.failure(error.file, { timeout: 5000 });
                    }
                });
            }
        },
        submitSecondaryImage(event) {
            if (event.target.files) {
                let formData = new FormData();
                formData.append('file', event.target.files[0])
                this.$inertia.post(route('secondaryimage.createupdate'), formData, {
                    onStart: () => {
                        this.isLoading = true;
                    },
                    onFinish: () => {
                        this.$refs.sinput.value = null;
                        this.isLoading = false;
                    },
                    onError(error){
                        Notify.failure(error.file, { timeout: 5000 });
                    }
                });
            }
        }
    },
}
</script>
