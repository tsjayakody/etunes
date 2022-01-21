<template>
    <Head title="Images" />

    <BreezeAuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex flex-grow flex-row gap-4 justify-center">
                            <div class="max-w-[440px] flex-1">
                                <div class="bg-[#f40003] p-1 text-center text-white font-bold">Header Image</div>
                                <img src="/assets/header-section-image.jpg" alt="" srcset="">
                                <label class="w-full mt-2 flex flex-col items-center px-4 py-3 hover:bg-[#f40003] text-blue tracking-wide uppercase border-[#f40003] border-2 cursor-pointer transition-colors duration-300 hover:text-white text-[#f40003]">
                                    <span class="font-black leading-normal">Replace Image</span>
                                    <input type='file' class="hidden" @change.prevent="submitHeaderImage"/>
                                </label>
                            </div>
                            <div class="max-w-[440px] flex-1">
                                <div class="bg-[#f40003] p-1 text-center text-white font-bold">Secondary Image</div>
                                <img src="/assets/why_work_with_us.jpg" alt="" srcset="">
                                <label class="w-full mt-2 flex flex-col items-center px-4 py-3 hover:bg-[#f40003] text-blue tracking-wide uppercase border-[#f40003] border-2 cursor-pointer transition-colors duration-300 hover:text-white text-[#f40003]">
                                    <span class="font-black leading-normal">Replace Image</span>
                                    <input type='file' class="hidden" @change.prevent="submitSecondaryImage"/>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3';

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
    },
    methods: {
        submitHeaderImage(event) {
            if (event.target.files) {
                let formData = new FormData();
                formData.append('file', event.target.files[0])
                this.$inertia.post('headerimage.createupdate', formData, {
                    onProgress(){},
                    onFinish(){},
                    onError(error){
                        console.log(error);
                    }
                });
            }
        },
        submitSecondaryImage() {}
    },
}
</script>
