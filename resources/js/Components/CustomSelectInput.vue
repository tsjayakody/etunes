<template>
    <select class="border-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm bg-transparent text-white" :value="modelValue" @change="$emit('update:modelValue', $event.target.value)" ref="select">
        <option value="" disabled selected>{{placeholderText}}</option>
        <option v-for="(option, key) in options" :value="option" :key="key">{{option}}</option>
    </select>
</template>

<script>
export default {
    props: ['modelValue', 'options', 'placeholderText'],

    emits: ['update:modelValue'],

    methods: {
        focus() {
            this.$refs.select.focus()
        }
    }
}
</script>
