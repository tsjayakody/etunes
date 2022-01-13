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
      <swiper-slide v-for="(link, key) in youtubeLinks" :key="key">
        <div class="relative">
          <img
            class="aspect-video rounded-2xl brightness-75"
            :src="getYoutubeThumbnail(link, '')"
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
            v-on:click.prevent="openModal(link)"
          />
        </div>
      </swiper-slide>
    </swiper>
    <video-modal :open="open" :videoUrl="selectedVideoUrl" @close="closeModal"/>
  </div>
</template>
<script>
import { Swiper, SwiperSlide } from "swiper/vue";
import SwiperCore, { EffectCoverflow, Pagination } from "swiper";
import PlayButton from "@/Components/PlayButton.vue";
import VideoModal from "@/Components/VideoModal.vue";
SwiperCore.use([EffectCoverflow, Pagination]);

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
      youtubeLinks: [
        "https://www.youtube.com/watch?v=TxmkYKB5f_E",
        "https://www.youtube.com/watch?v=-rOxfOJMCD8",
        "https://www.youtube.com/watch?v=ePGBiYFtjnw",
        "https://www.youtube.com/watch?v=J8Sk8DXXTiE",
      ],
      open: false,
      selectedVideoUrl: null,
    };
  },

  methods: {
    getYoutubeThumbnail(url, quality) {
      if (url) {
        let videoId, thumbnail, result;
        if ((result = url.match(/youtube\.com.*(\?v=|\/embed\/)(.{11})/))) {
          videoId = result.pop();
        } else if ((result = url.match(/youtu.be\/(.{11})/))) {
          videoId = result.pop();
        }

        if (videoId) {
          if (typeof quality == "undefined") {
            quality = "high";
          }

          let quality_key = "maxresdefault"; // Max quality
          if (quality == "low") {
            quality_key = "sddefault";
          } else if (quality == "medium") {
            quality_key = "mqdefault";
          } else if (quality == "high") {
            quality_key = "hqdefault";
          }

          thumbnail =
            "http://img.youtube.com/vi/" + videoId + "/" + quality_key + ".jpg";
          return thumbnail;
        }
      }
    },
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
