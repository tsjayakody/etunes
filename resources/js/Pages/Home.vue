<template>
    <default-layout>
        <header-section />
    </default-layout>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import DefaultLayout from '@/Layouts/Default.vue';
import HeaderSection from '@/Components/HeaderSection.vue';

export default {
    components: {
      Head,
      Link,
      DefaultLayout,
      HeaderSection,
    },
}
</script>
