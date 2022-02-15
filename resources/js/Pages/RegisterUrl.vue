<template>
	<Head title="Generate Login Url" />
	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<h1 class="mb-3 border-l-4 border-red-600 bg-red-300 w-fit pl-2 pr-5 py-1 text-xl">Generate Registration URL</h1>
			<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
				<div class="p-6 bg-white border-b border-gray-200">
					<div @click.prevent="copyLink" class="p-5 border-dashed border-2 rounded-md text-center cursor-pointer hover:bg-gray-200">{{ temp_url }}</div>
					<div class="flex justify-end gap-2 mt-4">
						<div class="flex rounded-md shadow-sm max-w-[200px]">
							<input type="number" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-l-md sm:text-sm border-gray-300" v-model="minutes" />
							<span class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">Minutes</span>
						</div>
						<button @click.prevent="generateUrl" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Generate</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { Notify } from "notiflix/build/notiflix-notify-aio";
import { ref } from "@vue/reactivity";
import { Inertia } from "@inertiajs/inertia";

export default {
	layout: BreezeAuthenticatedLayout,
	props: ["temp_url", "mins", "error"],
	components: {
		BreezeAuthenticatedLayout,
		Head,
	},
	mounted() {
		if (this.error) {
			Notify.failure(this.error);
		}
	},
	data() {
		return {
			minutes: ref(this.$props.mins),
		};
	},
	methods: {
		generateUrl() {
			Inertia.get(
				route("registerurl"),
				{ t: this.minutes },
				{
					preserveState: true,
					onError: () => {
						Notify.failure("Something went wrong.");
					},
				}
			);
		},
		async copyLink() {
            try {
                await navigator.clipboard.writeText(this.temp_url);
                Notify.success('Link has been copied to the clipboard.');
            } catch (error) {
                Notify.failure("Failure to copy. Check permissions for clipboard");
            }
		},
	},
};
</script>
