<template>
	<Head title="Artists" />
		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
					<div class="p-6 bg-white border-b border-gray-200">
						<div class="flex mb-4">
							<Link :href="route('artists.create')" class="py-2 mr-auto px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">New Artist</Link>
							<input type="text" name="" class="focus:ring-indigo-500 max-w-sm w-full focus:border-indigo-500 rounded-md sm:text-sm border-gray-300" placeholder="Search for names here.." v-model="search" />
						</div>
						<div class="flex flex-col">
							<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
								<div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
									<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
										<table class="min-w-full divide-y divide-gray-200">
											<thead class="bg-gray-50">
												<tr>
													<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
													<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Social Media</th>
													<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Streaming</th>
													<th scope="col" class="relative px-6 py-3">
														<span class="sr-only">Edit</span>
													</th>
												</tr>
											</thead>
											<tbody class="bg-white divide-y divide-gray-200">
												<tr v-for="artist in artists.data" :key="artist.id">
													<td class="px-6 py-4 whitespace-nowrap">
														<div class="flex items-center">
															<div class="flex-shrink-0 h-10 w-10">
																<img class="h-10 w-10 rounded-full" :src="artist.media[0].original_url" alt="" />
															</div>
															<div class="ml-4">
																<div class="text-sm font-medium text-gray-900">
																	{{ artist.name }}
																</div>
																<div class="text-sm text-gray-500">
																	{{ artist.created_at_hm }}
																</div>
															</div>
														</div>
													</td>
													<td class="px-6 py-4 whitespace-nowrap">
														<span class="inline-flex gap-2 text-xs leading-5 font-semibold rounded-full">
															<font-awesome-icon v-if="artist.facebook" :icon="['fab', 'facebook']" />
															<font-awesome-icon v-if="artist.twitter" :icon="['fab', 'twitter']" />
															<font-awesome-icon v-if="artist.instagram" :icon="['fab', 'instagram']" />
															<font-awesome-icon v-if="artist.tiktok" :icon="['fab', 'tiktok']" />
														</span>
													</td>
													<td class="px-6 py-4 whitespace-nowrap">
														<span class="inline-flex gap-2 text-xs leading-5 font-semibold rounded-full">
															<font-awesome-icon v-if="artist.deezer" :icon="['fab', 'deezer']" />
															<font-awesome-icon v-if="artist.spotify" :icon="['fab', 'spotify']" />
															<font-awesome-icon v-if="artist.applemusic" :icon="['fab', 'apple']" />
															<font-awesome-icon v-if="artist.amazonmusic" :icon="['fab', 'amazon']" />
														</span>
													</td>
													<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
														<Link :href="route('artists.edit', artist.id)" class="text-indigo-600 hover:text-indigo-900">Edit</Link>
														<button @click.prevent="onDelete(artist.id)" class="text-red-600 hover:text-red-900 ml-4">Delete</button>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
									<pagination :links="artists.links" class="mt-4"/>
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
import { library } from "@fortawesome/fontawesome-svg-core";
import { faAmazon, faFacebook, faTwitter, faInstagram, faTiktok, faDeezer, faSpotify, faApple } from "@fortawesome/free-brands-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { ref } from "@vue/reactivity";
import _ from "lodash";
import { Inertia } from "@inertiajs/inertia";
import { Confirm } from "notiflix/build/notiflix-confirm-aio";
import Pagination from "@/Components/Pagination.vue";

library.add([faAmazon, faFacebook, faTwitter, faInstagram, faTiktok, faDeezer, faSpotify, faApple]);

export default {
    layout: BreezeAuthenticatedLayout,
	props: ["artists", "filters"],
	components: {
		BreezeAuthenticatedLayout,
		Head,
		Link,
		"font-awesome-icon": FontAwesomeIcon,
		Pagination,
	},
	data() {
		return {
			people: [
				{
					name: "Jane Cooper",
					title: "Regional Paradigm Technician",
					department: "Optimization",
					role: "Admin",
					email: "2020-10-15 14:15:33",
					image: "https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60",
				},
			],
			search: ref(this.$props.filters.search),
		};
	},
	watch: {
		search(value) {
			this.getAllArtists(value);
		},
	},
	methods: {
		getAllArtists: _.debounce((val) => {
			Inertia.get(route("artists"), { search: val }, { preserveState: true });
		}, 500),
		onDelete(id) {
			Confirm.show(
				"Warning!",
				"Do you want to delete this artist?",
				"Yes",
				"No",
				function () {
					Inertia.delete(route("artists.destroy", id));
				},
				() => {}
			);
		},
	},
};
</script>
