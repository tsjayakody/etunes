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
      ARTISTS WE DISTRIBUTE
    </p>

    <div
      class="flex max-w-[80%] m-auto gap-3 mt-6 flex-wrap items-center justify-center"
    >
        <img v-for="artist in $page.props.artists" :key="artist.id" class="w-28 h-w-28 md:w-44 md:h-44 lg:w-56 lg:h-56 cursor-pointer saturate-50 hover:saturate-100 transition-all" :src="artist.media[0].original_url" :alt="artist.name" srcset="" />
    </div>
  </div>
</template>
