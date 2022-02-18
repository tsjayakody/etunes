<template>
	<!-- <select class="border-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 appearance-none bg-transparent rounded-md shadow-sm" :value="modelValue" @change="$emit('update:modelValue', $event.target.value)" ref="select">
		<option value="" disabled selected>{{ placeholderText }}</option>
		<option v-for="(option, key) in options" :value="option" :key="key">{{ option }}</option>
	</select> -->
    <Listbox as="div" v-model="selected" @change="$emit('update:modelValue', $event.target.value)">
    <ListboxLabel class="sr-only block text-sm font-medium text-gray-700"> Assigned to </ListboxLabel>
    <div class="mt-1 relative">
      <ListboxButton class="relative w-full bg-transparent border text-white border-gray-400 rounded-md shadow-sm pr-10 py-2 text-left cursor-default focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50 focus:border-indigo-300">
        <span class="flex items-center">
          <span class="ml-3 block truncate">{{ selected == "" ? 'Select (Required)' : selected }}</span>
        </span>
        <span class="ml-3 absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
          <SelectorIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
        </span>
      </ListboxButton>

      <transition leave-active-class="transition ease-in duration-100" leave-from-class="opacity-100" leave-to-class="opacity-0">
        <ListboxOptions class="absolute z-10 mt-1 w-full border border-gray-400 bg-black shadow-lg max-h-56 rounded-md py-1 text-base ring-1 ring-white ring-opacity-5 overflow-auto focus:outline-none">
          <ListboxOption as="template" v-for="(option, key) in options" :key="key" :value="option" v-slot="{ active, selected }">
            <li :class="[active ? 'text-white bg-[#b00b0f]' : 'text-white', 'cursor-default select-none relative py-2 pr-9']">
              <div class="flex items-center">
                <span :class="[selected ? 'font-semibold' : 'font-normal', 'ml-3 block truncate']">
                  {{ option == "" ? 'Select (Required)' : option }}
                </span>
              </div>

              <span v-if="selected" :class="[active ? 'text-white' : 'text-[#b00b0f]', 'absolute inset-y-0 right-0 flex items-center pr-4']">
                <CheckIcon class="h-5 w-5" aria-hidden="true" />
              </span>
            </li>
          </ListboxOption>
        </ListboxOptions>
      </transition>
    </div>
  </Listbox>
</template>

<script>
import { ref } from 'vue'
import { Listbox, ListboxButton, ListboxLabel, ListboxOption, ListboxOptions } from "@headlessui/vue";
import { CheckIcon, SelectorIcon } from "@heroicons/vue/solid";

export default {
	props: ["modelValue", "options", "placeholderText"],
	components: {
		Listbox,
		ListboxButton,
		ListboxLabel,
		ListboxOption,
		ListboxOptions,
		CheckIcon,
		SelectorIcon,
	},
	emits: ["update:modelValue"],
    data(){
        return {
            selected: "",
        }
    },
    watch: {
        selected(val){
            this.$emit('update:modelValue', val)
        }
    },
	methods: {
		focus() {
			this.$refs.select.focus();
		},
	},
};
</script>
