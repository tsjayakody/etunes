<template>
	<Head title="Featured Videos" />
	<div>
		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div class="md:grid md:grid-cols-3 md:gap-6">
					<div class="md:col-span-1">
						<div class="px-4 sm:px-0">
							<h3 class="text-lg font-medium leading-6 text-gray-900">Create/Update Featured Video</h3>
							<p class="mt-1 text-sm text-gray-600">Video Image should 1280px * 720px and size should lower than 800kb. Don't create too much featured videos it will lead the site to performace issues and increase the loading time.</p>
						</div>
					</div>

					<div class="mt-5 md:mt-0 md:col-span-2">
						<div class="shadow sm:rounded-md sm:overflow-hidden">
							<div class="px-4 py-5 bg-white space-y-6 sm:p-6">
								<div class="grid grid-cols-3 gap-6">
									<div class="aspect-video col-span-3 rounded-md">
										<img v-if="selectedImage" class="rounded-md" :src="selectedImage" alt="featured video thumbnail" />
										<img v-else-if="featured_video" class="rounded-md" :src="featured_video.media[0].original_url" alt="featured video thumbnail" />
										<img v-else class="rounded-md" src="/assets/featured-video-fallback-image.png" alt="featured video thumbnail" />
										<div v-if="form.errors.thumbnail" class="text-sm text-red-700 mt-1">{{ form.errors.thumbnail }}</div>
									</div>
									<div class="col-span-3">
										<label @click.prevent="resetSelectedImage" class="cursor-pointer ml-auto bg-red-200 py-2 px-3 border border-red-300 rounded-md shadow-sm text-sm leading-4 font-medium text-red-700 hover:bg gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
											<span class="font-black leading-normal"> Reset Image </span>
										</label>

										<label class="cursor-pointer ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
											<span class="font-black leading-normal"> Select Image </span>
											<input type="file" class="hidden" @change.prevent="setSelectedImage" ref="featuredImage" />
										</label>
									</div>
									<div class="col-span-3">
										<label for="company-website" class="block text-sm font-medium text-gray-700"> Youtube Link </label>
										<div class="mt-1 flex rounded-md shadow-sm">
											<input type="text" v-model="form.youtube_url" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="https://www.youtube.com?v=65+6frwef4w8ef" />
										</div>
										<div v-if="form.errors.youtube_url" class="text-sm text-red-700 mt-1">{{ form.errors.youtube_url }}</div>
									</div>
								</div>
							</div>
							<div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
								<Link :href="route('featuredvideos')">
									<button class="inline-flex mr-2 justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Reset</button>
								</Link>
								<button @click.prevent="submit" type="button" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">{{ featured_video ? "Update" : "Save" }}</button>
							</div>
						</div>
					</div>
				</div>

				<div class="hidden sm:block" aria-hidden="true">
					<div class="py-5">
						<div class="border-t border-gray-200" />
					</div>
				</div>

				<div class="md:grid md:grid-cols-3 md:gap-6">
					<div class="md:col-span-1">
						<div class="px-4 sm:px-0">
							<h3 class="text-lg font-medium leading-6 text-gray-900">Existing Featured Videos</h3>
							<p class="mt-1 text-sm text-gray-600">It will good to maintain 4 - 10 featured videos for the site performance.</p>
						</div>
					</div>

					<div class="mt-5 md:mt-0 md:col-span-2">
						<div class="shadow sm:rounded-md sm:overflow-hidden">
							<div class="px-4 py-5 bg-white space-y-6 sm:p-6">
								<div class="grid grid-cols-6 gap-6">
									<div class="aspect-video col-span-2 rounded-md" v-for="video in featured_videos" :key="video.id">
										<a :href="video.youtube_url" target="_blank">
											<img class="rounded-md" :src="video.media[0].original_url" alt="featured video thumbnail" />
										</a>

										<div class="grid grid-cols-2 gap-2 mt-2">
											<button @click.prevent="onDelete(video.id)" type="button" class="bg-red-200 font-black hover:bg-red-300 w-full py-2 px-3 border border-red-300 rounded-md shadow-sm text-sm leading-4 text-red-700 hover:bg gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Delete</button>
											<Link :href="route('featuredvideos.edit', video.id)">
												<button type="button" class="bg-gray-200 font-black hover:bg-gray-300 w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 text-gray-700 hover:bg gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Edit</button>
											</Link>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { Confirm } from "notiflix/build/notiflix-confirm-aio";
import { Inertia } from "@inertiajs/inertia";

export default {
	layout: BreezeAuthenticatedLayout,
	components: {
		Head,
		Link,
	},
	props: ["featured_video", "featured_videos"],
	data() {
		return {
			form: this.$inertia.form({
				_method: "post",
				thumbnail: null,
				youtube_url: "",
			}),
			selectedImage: null,
		};
	},
	mounted() {
		if (this.featured_video) {
			this.form.youtube_url = this.featured_video.youtube_url;
		}
	},
	methods: {
		setSelectedImage(event) {
			let file = event.target.files[0];
			if (file) {
				let reader = new FileReader();
				reader.onloadend = () => {
					this.selectedImage = reader.result;
					this.form.thumbnail = file;
				};
				reader.readAsDataURL(file);
			} else {
				this.selectedImage = null;
				this.form.thumbnail = null;
			}
			this.$refs.featuredImage.value = null;
		},
		resetSelectedImage() {
			this.selectedImage = null;
			this.form.thumbnail = null;
		},
		submit() {
			if (this.featured_video) {
				this.form._method = "put";
				this.form.post(route("featuredvideos.update", this.featured_video.id), {
                    onSuccess: () => {
                        this.resetForm();
                    }
                });
			} else {
				this.form._method = "post";
				this.form.post(route("featuredvideos.store"), {
                    onSuccess: () => {
                        this.resetForm();
                    }
                });
			}
		},
        onDelete(id) {
			Confirm.show(
				"Warning!",
				"Do you want to delete this video?",
				"Yes",
				"No",
				function () {
					Inertia.delete(route("featuredvideos.destroy", id));
				},
				() => {}
			);
		},
        resetForm() {
            this.form.youtube_url = '';
            this.form.thumbnail = '';
            this.selectedImage = null;
        }
	},
};
</script>
