<template>
	<Head title="Edit artist" />
		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<h1 class="mb-3 border-l-4 border-red-600 bg-red-300 w-fit pl-2 pr-5 py-1 text-xl">Edit artist</h1>
				<div>
					<div class="md:grid md:grid-cols-3 md:gap-6">
						<div class="md:col-span-1">
							<div class="px-4 sm:px-0">
								<h3 class="text-lg font-medium leading-6 text-gray-900">Profile</h3>
								<p class="mt-1 text-sm text-gray-600">This information will be displayed publicly so be careful what you share. Profile image resolution should exctly 500px * 500px and size should lower than 500kb.</p>
							</div>
						</div>
						<div class="mt-5 md:mt-0 md:col-span-2">
							<div>
								<div class="shadow sm:rounded-md sm:overflow-hidden">
									<div class="px-4 py-5 bg-white space-y-6 sm:p-6">
										<!-- profile image -->
										<div>
											<label class="block text-sm font-medium text-gray-700"> Photo </label>
											<div class="mt-1 flex items-center">
												<span class="inline-block h-24 w-24 rounded-md overflow-hidden bg-gray-100">
													<img v-if="selectedImageDataUrl" :src="selectedImageDataUrl" />
													<img v-else-if="artist.media.length > 0" :src="artist.media[0].original_url" />
													<svg v-else class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
														<path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
													</svg>
												</span>
												<div class="flex flex-col">
													<label class="cursor-pointer ml-5 mb-4 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
														<span class="font-black leading-normal"> Select Image </span>
														<input type="file" class="hidden" @change.prevent="setSelectedImage" ref="profileimage" />
													</label>
													<label @click="resetSelectedImage" class="cursor-pointer ml-5 bg-red-200 py-2 px-3 border border-red-300 rounded-md shadow-sm text-sm leading-4 font-medium text-red-700 hover:bg gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
														<span class="font-black leading-normal"> Reset Image </span>
													</label>
												</div>
											</div>
											<div v-if="form.errors.profile_image" class="text-sm text-red-700 mt-1">{{ form.errors.profile_image }}</div>
										</div>

										<!-- name -->
										<div class="grid grid-cols-3 gap-6">
											<div class="col-span-3">
												<label class="block text-sm font-medium text-gray-700">Full name</label>
												<input type="text" v-model="form.name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
												<div v-if="this.form.errors.name" class="text-sm text-red-700 mt-1">{{ this.form.errors.name }}</div>
											</div>
										</div>

										<!-- description -->
										<div>
											<label class="block text-sm font-medium text-gray-700"> Description </label>
											<div class="mt-1">
												<textarea v-model="form.description" placeholder="Brief description for your profile. URLs are hyperlinked." rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" />
											</div>
											<div v-if="form.errors.description" class="text-sm text-red-700 mt-1">{{ form.errors.description }}</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="hidden sm:block" aria-hidden="true">
					<div class="py-5">
						<div class="border-t border-gray-200" />
					</div>
				</div>

				<div class="mt-10 sm:mt-0">
					<div class="md:grid md:grid-cols-3 md:gap-6">
						<div class="md:col-span-1">
							<div class="px-4 sm:px-0">
								<h3 class="text-lg font-medium leading-6 text-gray-900">Social Media</h3>
								<p class="mt-1 text-sm text-gray-600">URLs need to valid URLs and do not use shortened URLs.</p>
							</div>
						</div>
						<div class="mt-5 md:mt-0 md:col-span-2">
							<div>
								<div class="shadow overflow-hidden sm:rounded-md">
									<div class="px-4 py-5 bg-white sm:p-6">
										<div class="grid grid-cols-6 gap-6">
											<!-- facebook page -->
											<div class="col-span-6">
												<label class="block text-sm font-medium text-gray-700"> Facebook </label>
												<div class="mt-1 flex rounded-md shadow-sm">
													<span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm"> <font-awesome-icon :icon="['fab', 'facebook']" /> </span>
													<input type="text" v-model="form.facebook" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="https://www.facebook.com/userpage" />
												</div>
												<div v-if="form.errors.facebook" class="text-sm text-red-700 mt-1">{{ form.errors.facebook }}</div>
											</div>

											<!-- twitter profile -->
											<div class="col-span-6">
												<label class="block text-sm font-medium text-gray-700"> Twitter </label>
												<div class="mt-1 flex rounded-md shadow-sm">
													<span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm"> <font-awesome-icon :icon="['fab', 'twitter']" /> </span>
													<input type="text" v-model="form.twitter" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="https://www.twitter.com/userprofile" />
												</div>
												<div v-if="form.errors.twitter" class="text-sm text-red-700 mt-1">{{ form.errors.twitter }}</div>
											</div>

											<!-- instagram -->
											<div class="col-span-6">
												<label class="block text-sm font-medium text-gray-700"> Instagram </label>
												<div class="mt-1 flex rounded-md shadow-sm">
													<span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm"> <font-awesome-icon :icon="['fab', 'instagram']" /> </span>
													<input type="text" v-model="form.instagram" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="https://www.instagram.com/userpage" />
												</div>
												<div v-if="form.errors.instagram" class="text-sm text-red-700 mt-1">{{ form.errors.instagram }}</div>
											</div>

											<!-- tiktok profile -->
											<div class="col-span-6">
												<label class="block text-sm font-medium text-gray-700"> TikTok </label>
												<div class="mt-1 flex rounded-md shadow-sm">
													<span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm"> <font-awesome-icon :icon="['fab', 'tiktok']" /> </span>
													<input type="text" v-model="form.tiktok" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="https://www.tiktok.com/userprofile" />
												</div>
												<div v-if="form.errors.tiktok" class="text-sm text-red-700 mt-1">{{ form.errors.tiktok }}</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="hidden sm:block" aria-hidden="true">
					<div class="py-5">
						<div class="border-t border-gray-200" />
					</div>
				</div>

				<div class="mt-10 sm:mt-0">
					<div class="md:grid md:grid-cols-3 md:gap-6">
						<div class="md:col-span-1">
							<div class="px-4 sm:px-0">
								<h3 class="text-lg font-medium leading-6 text-gray-900">Streaming Services</h3>
								<p class="mt-1 text-sm text-gray-600">URLs need to valid URLs and do not use shortened URLs.</p>
							</div>
						</div>
						<div class="mt-5 md:mt-0 md:col-span-2">
							<div>
								<div class="shadow overflow-hidden sm:rounded-md">
									<div class="px-4 py-5 bg-white sm:p-6">
										<div class="grid grid-cols-6 gap-6">
											<!-- deezer account -->
											<div class="col-span-6">
												<label class="block text-sm font-medium text-gray-700"> Deezer Account </label>
												<div class="mt-1 flex rounded-md shadow-sm">
													<span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm"> <font-awesome-icon :icon="['fab', 'deezer']" /> </span>
													<input type="text" v-model="form.deezer" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="https://www.deezer.com/en/artist/userid" />
												</div>
												<div v-if="form.errors.deezer" class="text-sm text-red-700 mt-1">{{ form.errors.deezer }}</div>
											</div>

											<!-- spotify account -->
											<div class="col-span-6">
												<label class="block text-sm font-medium text-gray-700"> Spotify </label>
												<div class="mt-1 flex rounded-md shadow-sm">
													<span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm"> <font-awesome-icon :icon="['fab', 'spotify']" /> </span>
													<input type="text" v-model="form.spotify" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="https://www.spotify.com/userprofile" />
												</div>
												<div v-if="form.errors.spotify" class="text-sm text-red-700 mt-1">{{ form.errors.spotify }}</div>
											</div>

											<!-- apple music account -->
											<div class="col-span-6">
												<label class="block text-sm font-medium text-gray-700"> Apple Music </label>
												<div class="mt-1 flex rounded-md shadow-sm">
													<span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm"> <font-awesome-icon :icon="['fab', 'apple']" /> </span>
													<input type="text" v-model="form.applemusic" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="https://www.music.apple.com/userpage" />
												</div>
												<div v-if="form.errors.applemusic" class="text-sm text-red-700 mt-1">{{ form.errors.applemusic }}</div>
											</div>

											<!-- amazon music profile -->
											<div class="col-span-6">
												<label class="block text-sm font-medium text-gray-700"> Amazon Music </label>
												<div class="mt-1 flex rounded-md shadow-sm">
													<span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm"> <font-awesome-icon :icon="['fab', 'amazon']" /> </span>
													<input type="text" v-model="form.amazonmusic" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="https://www.music.amazon.com/userprofile" />
												</div>
												<div v-if="form.errors.amazonmusic" class="text-sm text-red-700 mt-1">{{ form.errors.amazonmusic }}</div>
											</div>
										</div>
									</div>
									<div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
										<Link :href="route('artists')" class="inline-flex mr-4 cursor-pointer justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Cancel</Link>

										<button :class="{ 'opacity-25': form.processing }" :disabled="form.processing" type="button" @click="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
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
import { library } from "@fortawesome/fontawesome-svg-core";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { faAmazon, faFacebook, faTwitter, faInstagram, faTiktok, faDeezer, faSpotify, faApple } from "@fortawesome/free-brands-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

library.add([faAmazon, faFacebook, faTwitter, faInstagram, faTiktok, faDeezer, faSpotify, faApple]);

export default {
    layout: BreezeAuthenticatedLayout,
	props: ["artist"],
	components: {
		"font-awesome-icon": FontAwesomeIcon,
		Head,
		Link,
	},
	mounted() {
		this.setArtist();
	},
	data() {
		return {
			form: this.$inertia.form({
                _method: "put",
				name: "",
				description: "",
				profile_image: null,
				facebook: "",
				twitter: "",
				instagram: "",
				deezer: "",
				spotify: "",
				applemusic: "",
				amazonmusic: "",
				tiktok: "",
			}),
			selectedImageDataUrl: null,
		};
	},
	methods: {
		submit() {
			this.form.post(route("artists.update"), this.form);
		},
		setSelectedImage(event) {
			let file = event.target.files[0];
			if (file) {
				let reader = new FileReader();
				reader.onloadend = () => {
					this.selectedImageDataUrl = reader.result;
					this.form.profile_image = file;
				};
				reader.readAsDataURL(file);
			} else {
				this.selectedImageDataUrl = null;
				this.form.profile_image = null;
			}
			this.$refs.profileimage.value = null;
		},
		resetSelectedImage() {
			this.selectedImageDataUrl = null;
			this.form.profile_image = null;
		},
		setArtist() {
			this.form.name = this.artist.name;
			this.form.description = this.artist.description;
			this.form.facebook = this.artist.facebook;
			this.form.twitter = this.artist.twitter;
			this.form.instagram = this.artist.instagram;
			this.form.tiktok = this.artist.tiktok;
			this.form.deezer = this.artist.deezer;
			this.form.spotify = this.artist.spotify;
			this.form.applemusic = this.artist.applemusic;
			this.form.amazonmusic = this.artist.amazonmusic;
		},
		submit() {
            this.form.post(route('artists.update', this.artist.id));
        },
	},
};
</script>
