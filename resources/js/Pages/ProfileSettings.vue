<template>
	<Head title="Generate Login Url" />
	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div>
				<div class="md:grid md:grid-cols-3 md:gap-6">
					<div class="md:col-span-1">
						<div class="px-4 sm:px-0">
							<h3 class="text-lg font-medium leading-6 text-gray-900">Profile</h3>
							<p class="mt-1 text-sm text-gray-600">This information will be displayed publicly so be careful what you share.</p>
						</div>
					</div>
					<div class="mt-5 md:mt-0 md:col-span-2">
						<div>
							<div class="shadow sm:rounded-md sm:overflow-hidden">
								<div class="px-4 py-5 bg-white space-y-6 sm:p-6">
									<div>
										<label for="name" class="block text-sm font-medium text-gray-700">Name</label>
										<input type="text" v-model="profileForm.name" id="name" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                        <div v-if="profileForm.errors.name" class="text-sm text-red-600 mt-1">{{profileForm.errors.name}}</div>
									</div>
									<div>
										<label for="email-address" class="block text-sm font-medium text-gray-700">Email address</label>
										<input type="text" v-model="profileForm.email" id="email-address" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                        <div v-if="profileForm.errors.email" class="text-sm text-red-600 mt-1">{{profileForm.errors.email}}</div>
									</div>
								</div>
								<div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
									<button @click.prevent="submitProfileInfo" type="button" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
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
							<h3 class="text-lg font-medium leading-6 text-gray-900">Password Change</h3>
							<p class="mt-1 text-sm text-gray-600">Use spcial charactors and minimum 10 letters for strong password.</p>
						</div>
					</div>
					<div class="mt-5 md:mt-0 md:col-span-2">
						<form action="#" method="POST">
							<div class="shadow overflow-hidden sm:rounded-md">
								<div class="px-4 py-5 bg-white sm:p-6">
									<div class="grid grid-cols-6 gap-6">
										<div class="col-span-6 sm:col-span-6 lg:col-span-6">
											<label for="current-password" class="block text-sm font-medium text-gray-700">Current Password</label>
											<div class="relative w-full">
												<div class="absolute inset-y-0 right-0 flex items-center px-2">
													<input class="hidden" id="toggleCurrent" type="checkbox" @change.prevent="passwordToggle('current')"/>
													<label class="bg-gray-300 hover:bg-gray-400 rounded px-2 py-1 text-xs text-gray-600 font-mono cursor-pointer" for="toggleCurrent" ref="labelCurrent">show</label>
												</div>
												<input v-model="passwordForm.current_password" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="current-password" type="password" autocomplete="off" ref="textCurrent"/>
											</div>
                                            <div v-if="passwordForm.errors.current_password" class="text-sm text-red-600 mt-1">{{passwordForm.errors.current_password}}</div>
										</div>

										<div class="col-span-6 sm:col-span-6 lg:col-span-6">
											<label for="new-password" class="block text-sm font-medium text-gray-700">New Password</label>
											<div class="relative w-full">
												<div class="absolute inset-y-0 right-0 flex items-center px-2">
													<input class="hidden" id="toggleNew" type="checkbox" @change.prevent="passwordToggle('new')"/>
													<label class="bg-gray-300 hover:bg-gray-400 rounded px-2 py-1 text-xs text-gray-600 font-mono cursor-pointer" for="toggleNew" ref="labelNew">show</label>
												</div>
												<input v-model="passwordForm.password" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="new-password" type="password" autocomplete="off" ref="textNew"/>
											</div>
                                            <div v-if="passwordForm.errors.password" class="text-sm text-red-600 mt-1">{{passwordForm.errors.password}}</div>
										</div>

										<div class="col-span-6 sm:col-span-6 lg:col-span-6">
											<label for="confirm-password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
											<div class="relative w-full">
												<div class="absolute inset-y-0 right-0 flex items-center px-2">
													<input class="hidden" id="toggleConfirm" type="checkbox" @change.prevent="passwordToggle('confirm')"/>
													<label class="bg-gray-300 hover:bg-gray-400 rounded px-2 py-1 text-xs text-gray-600 font-mono cursor-pointer" for="toggleConfirm" ref="labelConfirm">show</label>
												</div>
												<input v-model="passwordForm.password_confirmation" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="confirm-password" type="password" autocomplete="off" ref="textConfirm"/>
											</div>
                                            <div v-if="passwordForm.errors.password_confirmation" class="text-sm text-red-600 mt-1">{{passwordForm.errors.password_confirmation}}</div>
										</div>
									</div>
								</div>
								<div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
									<button @click.prevent="submitPasswordChange" type="button" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { Notify } from "notiflix/build/notiflix-notify-aio";
import { ref } from "@vue/reactivity";

export default {
    layout: BreezeAuthenticatedLayout,
    props: ['user'],
	components: {
		BreezeAuthenticatedLayout,
		Head,
		Link,
	},
    data (){
        return {
            profileForm: this.$inertia.form({
                name: ref(this.user.name),
                email: ref(this.user.email),
            }),
            passwordForm: this.$inertia.form({
                current_password: '',
                password: '',
                password_confirmation: '',
            })
        }
    },
    methods: {
        submitProfileInfo() {
            this.profileForm.post(route('profilesettings.profile'), {
                onSuccess: () => {
                    Notify.success('Profile information changed successfuly.');
                }
            })
        },
        submitPasswordChange() {
            this.passwordForm.post(route('profilesettings.password'), {
                onSuccess: () => {
                    Notify.success('Password changed successfuly.');
                }
            })
        },
        passwordToggle(value) {
            if (value === 'current') {
                let inputElement = this.$refs.textCurrent;
                let buttonElement = this.$refs.labelCurrent;
                inputElement.type = inputElement.type == 'password' ? 'text' : 'password';
                buttonElement.innerHTML = inputElement.type == 'password' ? 'Show' : 'Hide';
            } else if (value === 'new') {
                let inputElement = this.$refs.textNew;
                let buttonElement = this.$refs.labelNew;
                inputElement.type = inputElement.type == 'password' ? 'text' : 'password';
                buttonElement.innerHTML = inputElement.type == 'password' ? 'Show' : 'Hide';
            }
            else if (value === 'confirm') {
                let inputElement = this.$refs.textConfirm;
                let buttonElement = this.$refs.labelConfirm;
                inputElement.type = inputElement.type == 'password' ? 'text' : 'password';
                buttonElement.innerHTML = inputElement.type == 'password' ? 'Show' : 'Hide';
            }
        }
    },
};
</script>
