<template>
  <TransitionRoot as="template" :show="open">
    <Dialog as="div" class="fixed z-10 inset-0" @close="closeModal">
      <div
        class="
          block
          items-end
          justify-center
          min-h-screen
          pt-4
          pb-20
          text-center
          sm:p-0
        "
      >
        <TransitionChild
          as="template"
          enter="ease-out duration-300"
          enter-from="opacity-0"
          enter-to="opacity-100"
          leave="ease-in duration-200"
          leave-from="opacity-100"
          leave-to="opacity-0"
        >
          <DialogOverlay
            class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
          />
        </TransitionChild>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span
          class="hidden sm:inline-block sm:align-middle sm:h-screen"
          aria-hidden="true"
          >&#8203;</span
        >
        <TransitionChild
          as="template"
          enter="ease-out duration-300"
          enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          enter-to="opacity-100 translate-y-0 sm:scale-100"
          leave="ease-in duration-200"
          leave-from="opacity-100 translate-y-0 sm:scale-100"
          leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        >
          <div
            class="
              inline-block
              bg-white
              rounded-lg
              text-left
              shadow-xl
              transform
              transition-all
              my-8
              align-middle
            "
          >
            <YouTube
              host="https://www.youtube.com"
              :width="playerWidth"
              :height="playerHeight"
              :src="videoUrl"
              @ready="onReady"
              ref="youtube"
            />
          </div>
        </TransitionChild>
      </div>
    </Dialog>
  </TransitionRoot>
</template>
<script>
import {
  Dialog,
  DialogOverlay,
  DialogTitle,
  TransitionChild,
  TransitionRoot,
} from "@headlessui/vue";
import { ExclamationIcon } from "@heroicons/vue/outline";
import YouTube from "vue3-youtube";

export default {
  components: {
    Dialog,
    DialogOverlay,
    DialogTitle,
    TransitionChild,
    TransitionRoot,
    ExclamationIcon,
    YouTube,
  },
  computed: {
    playerWidth() {
      return window.innerWidth * 0.7;
    },
    playerHeight() {
      return ((window.innerWidth * 0.7) / 16) * 9;
    },
  },
  props: ["open", "videoUrl"],
  methods: {
    closeModal() {
      this.$refs.youtube.stopVideo();
      this.$emit("close");
    },
    onReady() {
        setTimeout(() => {
            this.$refs.youtube.playVideo();
        }, 1500)
    },
  },
};
</script>
