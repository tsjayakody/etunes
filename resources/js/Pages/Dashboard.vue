<template>
	<Head title="Dashboard" />

	<BreezeAuthenticatedLayout>
		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
					<div class="p-6 bg-white border-b border-gray-200">
                        <p class="text-5xl text-center text-slate-600 my-6 font-black">eTunes.lk Administration Panel</p>
						<div class="grid gap-6 grid-cols-4">
							<!-- header image -->
							<div>
								<img class="rounded-md" :src="header_image" alt="header image" />
							</div>
							<!-- secndary image -->
							<div>
								<img class="rounded-md" :src="secondary_image" alt="secondary image" />
							</div>
							<!-- artist count -->
							<div class="rounded-md bg-[#D67D3E]">
								<p class="text-[#F9E4D4] text-center text-9xl leading-loose">{{ artists_count }}</p>
                                <p class="text-[#F9E4D4] text-center text-2xl">Artists</p>
							</div>
							<!-- featured video count -->
							<div class="rounded-md bg-[#9C0F48]">
                                <p class="text-[#F9E4D4] text-center text-9xl leading-loose">{{ featured_videos_count }}</p>
                                <p class="text-[#F9E4D4] text-center text-2xl">Featured Videos</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";

export default {
	props: ["header_image", "secondary_image", "featured_videos_count", "artists_count"],
	components: {
		BreezeAuthenticatedLayout,
		Head,
	},
};
</script>
