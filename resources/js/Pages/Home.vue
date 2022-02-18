<template>
  <default-layout>
    <header-section id="sellyourmusic"/>
    <featured-videos-section id="" class="mt-3" />
    <what-we-do-section id="services" class="md:pt-12" />
    <artists-section id="artists" class="md:pt-12" v-if="$page.props.artists.length > 0"/>
    <workwithus-section id="about" class="md:pt-12" />
  </default-layout>
</template>

<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import DefaultLayout from "@/Layouts/Default.vue";
import HeaderSection from "@/Components/Sections/HeaderSection.vue";
import FeaturedVideosSection from "@/Components/Sections/FeaturedVideosSections.vue";
import WhatWeDoSection from "@/Components/Sections/WhatWeDoSection.vue";
import ArtistsSection from "@/Components/Sections/ArtistsSection.vue";
import WorkwithusSection from "@/Components/Sections/WorkwithusSection.vue";

export default {
  components: {
    Head,
    Link,
    DefaultLayout,
    HeaderSection,
    FeaturedVideosSection,
    WhatWeDoSection,
    ArtistsSection,
    WorkwithusSection,
  },
};
</script>
