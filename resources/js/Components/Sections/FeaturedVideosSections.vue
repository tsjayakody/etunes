<template>
  <div>
    <p
      class="
        text-[#EFDFEC]
        mt-6
        lg:mt-0
        text-center text-2xl
        sm:text-3xl
        md:text-4xl
        lg:text-5xl
        uppercase
      "
    >
      Featured Videos
    </p>
    <swiper
      class="my-6"
      :effect="'coverflow'"
      :grabCursor="true"
      :centeredSlides="true"
      :slidesPerView="'auto'"
      :loop="true"
      :autoplay="{ delay: 5000, pauseOnMouseEnter: true }"
      :coverflowEffect="{
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: true,
      }"
      :pagination="true"
      :breakpoints="{
        '640': {
          slidesPerView: 1,
        },
        '768': {
          slidesPerView: 2,
        },
        '1024': {
          slidesPerView: 2,
        },
      }"
    >
    <template v-if="$page.props.featuredVideos.length > 0">
        <swiper-slide v-for="(video, key) in $page.props.featuredVideos" :key="key">
        <div class="relative">
          <img
            class="aspect-video rounded-2xl brightness-75"
            :src="video.media[0].original_url"
          />
          <play-button
            class="
              absolute
              cursor-pointer
              fill-transparent
              duration-500
              transition-colors
              hover:fill-[#FF0000]
              top-1/2
              left-1/2
              -translate-x-1/2 -translate-y-1/2
              w-24
            "
            v-on:click.prevent="openModal(video.youtube_url)"
          />
        </div>
      </swiper-slide>
    </template>
    <template v-else>
        <swiper-slide>
        <div class="relative">
          <img
            class="aspect-video rounded-2xl brightness-75"
            src="/assets/featured-video-fallback-image.png"
          />
        </div>
      </swiper-slide>
    </template>
    </swiper>
    <video-modal
      :open="open"
      :videoUrl="selectedVideoUrl"
      @close="closeModal"
    />
  </div>
</template>
<script>
import { Swiper, SwiperSlide } from "swiper/vue";
import SwiperCore, { EffectCoverflow, Pagination, Autoplay } from "swiper";
import PlayButton from "@/Components/PlayButton.vue";
import VideoModal from "@/Components/VideoModal.vue";
SwiperCore.use([EffectCoverflow, Pagination, Autoplay]);

import "swiper/css";
import "swiper/css/effect-coverflow";
import "swiper/css/pagination";

export default {
  components: {
    Swiper,
    SwiperSlide,
    PlayButton,
    VideoModal,
  },
  data() {
    return {
      open: false,
      selectedVideoUrl: null,
    };
  },

  methods: {
    closeModal() {
      this.open = false;
    },
    openModal(url) {
      this.selectedVideoUrl = url;
      if (this.selectedVideoUrl) {
        this.open = true;
      }
    },
  },
};
</script>
