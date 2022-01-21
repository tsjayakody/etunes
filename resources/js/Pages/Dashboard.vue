<template>
  <Head title="Dashboard" />

  <BreezeAuthenticatedLayout>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <!-- test-over -->

            <div class="flex m-5">
              <!-- implement here -->
              <!-- featured vids conatiner -->
              <div
                class="
                  overflow-hidden
                  shadow-sm
                  sm:rounded-lg
                  flex-1
                  m-5
                  bg-gradient-to-r
                  p-[4px]
                  from-[#DC1C13]
                  via-[#F1959B]
                  to-[#F6BDC0]
                "
              >
                <div
                  class="
                    p-6
                    bg-white
                    border-b border-gray-200
                    h-52
                    grid
                    place-items-center
                    h-screen
                    sm:rounded
                  "
                >
                  <h1 class="text-7xl text-center text-[#DC1C13]">10</h1>
                  <h1 class="text-center text-[#DC1C13]">Featured Videos</h1>
                </div>
              </div>
              <!-- artisits conatiner -->
              <div
                class="
                  overflow-hidden
                  shadow-sm
                  sm:rounded-lg
                  flex-1
                  m-5
                  bg-gradient-to-r
                  p-[4px]
                  from-[#F6BDC0]
                  via-[#F6BDC0]
                  to-[#DC1C13]
                "
              >
                <div
                  class="
                    p-6
                    bg-white
                    border-b border-gray-200
                    h-52
                    grid
                    place-items-center
                    h-screen
                    sm:rounded
                  "
                >
                  <h1 class="text-7xl text-center text-[#DC1C13]">10</h1>
                  <h1 class="text-center text-[#DC1C13]">Artists</h1>
                </div>
              </div>
            </div>

            <div class="flex m-5">
              <!-- music-banner-1 conatiner -->
              <div
                class="
                  bg-white
                  overflow-hidden
                  shadow-sm
                  sm:rounded-lg
                  flex-1
                  m-5
                "
              >
                <div class="bg-green-300 border-b border-gray-200 h-96">
                  <img src="/assets/header-section-image.jpg" alt="" />
                </div>
              </div>
              <!-- music-banner-2 conatiner -->
              <div
                class="
                  bg-white
                  overflow-hidden
                  shadow-sm
                  sm:rounded-lg
                  flex-1
                  m-5
                "
              >
                <div class="bg-green-300 border-b border-gray-200 h-96">
                  <img src="/assets/why_work_with_us.jpg" alt="" />
                </div>
              </div>
            </div>

            <!-- test-over -->
          </div>
        </div>
      </div>
    </div>
  </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";

export default {
  components: {
    BreezeAuthenticatedLayout,
    Head,
  },
};
</script>
