<template>
	<client-auth>
		<div class="max-w-xl mx-auto p-6">
			<p class="text-white text-center uppercase font-black text-2xl">request an invite</p>
			<p class="text-white text-center sm:text-lg">Joining eTunes (Distribution) is by invitation only</p>
			<form @submit.prevent="submit" class="pt-6">
				<!-- select -->
				<div class="mb-4">
					<custom-select-input :placeholderText="'Select (Required)'" :options="selectOptions" placeholder="Select (Required)" id="select" class="mt-1 block w-full" v-model="form.select" autocomplete="select" />
					<div v-if="form.errors.select" class="text-sm text-red-600 pt-1">{{ form.errors.select }}</div>
				</div>
				<!-- full name -->
				<div class="mb-4">
					<custom-input placeholder="Full Name (Required)" id="fullName" type="text" class="mt-1 block w-full" v-model="form.fullName" autocomplete="fullname" />
					<div v-if="form.errors.fullName" class="text-sm text-red-600 pt-1">{{ form.errors.fullName }}</div>
				</div>

				<!-- phone number -->
				<div class="mb-4">
					<custom-input placeholder="Phone Number (Required)" id="phoneNumber" type="text" class="mt-1 block w-full" v-model="form.phoneNumber" autocomplete="phoneNumber" />
					<div v-if="form.errors.phoneNumber" class="text-sm text-red-600 pt-1">{{ form.errors.phoneNumber }}</div>
				</div>

				<!-- email -->
				<div class="mb-4">
					<custom-input placeholder="Email (Required)" id="email" type="text" class="mt-1 block w-full" v-model="form.email" autocomplete="email" />
					<div v-if="form.errors.email" class="text-sm text-red-600 pt-1">{{ form.errors.email }}</div>
				</div>

				<!-- address -->
				<div class="mb-4">
					<custom-text-area placeholder="Address" id="address" class="mt-1 block w-full" v-model="form.address" autocomplete="address" />
				</div>

				<!-- address -->
				<div class="mb-4">
					<custom-text-area placeholder="Describe you" id="describeYou" class="mt-1 block w-full" v-model="form.describeYou" autocomplete="describeyou" />
				</div>

				<!-- primary genre  of music-->
				<div class="mb-4">
					<custom-input placeholder="Primary genre of music" id="primaryGenreOfMusic" type="text" class="mt-1 block w-full" v-model="form.primaryGenreOfMusic" autocomplete="primarygenreofmusic" />
				</div>

				<!-- current destributer name-->
				<div class="mb-4">
					<custom-input placeholder="Current destributer name" id="currentDestributerName" type="text" class="mt-1 block w-full" v-model="form.currentDestributerName" autocomplete="currentdestributername" />
				</div>

				<!-- are you pro-->
				<div class="mb-4">
					<custom-input placeholder="Are you on PRO like ASCAP or BMI?" id="areYouPro" type="text" class="mt-1 block w-full" v-model="form.areYouPro" autocomplete="areyoupro" />
				</div>

				<!-- how many tracks-->
				<div class="mb-4">
					<custom-input placeholder="How many tracks are in your catalog?" id="howManyTracks" type="text" class="mt-1 block w-full" v-model="form.howManyTracks" autocomplete="howmanytracks" />
				</div>

				<!-- number of tracks-->
				<div class="mb-4">
					<custom-input placeholder="How many tracks do you have planned for the next year?" id="numberOfTracks" type="text" class="mt-1 block w-full" v-model="form.numberOfTracks" autocomplete="numberoftracks" />
				</div>

				<!-- how frequently-->
				<div class="mb-4">
					<custom-input placeholder="How frequently do you plan to release content?" id="howFrequently" type="text" class="mt-1 block w-full" v-model="form.howFrequently" autocomplete="howfrequently" />
				</div>

				<!-- how find-->
				<div class="mb-4">
					<custom-select-input :placeholderText="'How did you find us?'" :options="selectOptionshd" placeholder="Select (Required)" id="howDid" class="mt-1 block w-full" v-model="form.howDid" autocomplete="howDid" />
					<div v-if="form.errors.howDid" class="text-sm text-red-600 pt-1">{{ form.errors.howDid }}</div>
				</div>
				<button type="submit" class="block w-fit mt-5 hover:text-black text-white text-center text-lg py-1 px-8 md:py-2 md:px-10 md:text-xl lg:py-3 lg:px-12 lg:text-2xl font-extrabold rounded-full bg-gradient-to-t transition-colors from-[#950808] to-[#FF0000] mx-auto">Submit</button>
			</form>
		</div>
	</client-auth>
</template>
<script>
import ClientAuth from "@/Layouts/ClientAuth.vue";
import CustomInput from "@/Components/CustomInput.vue";
import CustomSelectInput from "@/Components/CustomSelectInput.vue";
import CustomInputError from "@/Components/CustomInputError.vue";
import CustomTextArea from "@/Components/CustomTextArea.vue";
import { Notify } from 'notiflix/build/notiflix-notify-aio';
export default {
	components: {
		ClientAuth,
		CustomInput,
		CustomInputError,
		CustomTextArea,
		CustomSelectInput,
	},
	data() {
		return {
			form: this.$inertia.form({
				select: "",
				fullName: "",
				phoneNumber: "",
				email: "",
				address: "",
				describeYou: "",
				primaryGenreOfMusic: "",
				currentDestributerName: "",
				areYouPro: "",
				howManyTracks: "",
				numberOfTracks: "",
				howFrequently: "",
				howDid: "",
			}),
			selectOptions: ["", "Independant Artist", "Record Label", "Management Company", "Distributor/ Aggregator", "Artist Services Platform"],
			selectOptionshd: ["", "Search Engine", "Google Ads", "Facebook Ads", "Youtube Ads", "Other paid social media advertising", "Facebook post/group", "Twitter post", "Instagram post/story", "Other social media", "Email", "Radio", "TV", "Newspaper", "Word of mouth"],
		};
	},
	methods: {
		submit() {
			this.form.post(this.route("client.getstartedpost"), {
				onSuccess: () => {
					Notify.success("Your details submitted successfully. You will contact by our representative soon.", { timeout: 5000});
				},
			});
		},
	},
};
</script>
