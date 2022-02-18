<template>
  <div class="flex flex-col md:flex-row  lg:my-24">
    <div class="basis-full md:basis-2/3 lg:basis-3/5">
      <p class="text-sm md:text-xl text-center md:text-left tracking-[.8em] md:tracking-normal lg:text-3xl font-black text-[#E8D0E3]">RELEASE YOUR MUSIC</p>
      <p class="text-5xl md:text-7xl text-center md:text-left tracking-[.08em] md:tracking-normal lg:text-9xl font-black text-[#EFDFEC]">WORLDWIDE</p>
      <p class="text-xs md:text-lg text-justify md:text-left lg:text-xl font-semibold text-[#D6CDCD] max-w-4xl">
        We handle everything. eTunes makes your music available for the world to
        experience and collects streaming royalties on your behalf. Focus on
        your music while we do the heavy lifting to make your music available to
        the widest audience possible.
      </p>
      <a
        href="/client-signin"
        class="
          block
          w-fit
          mt-5
          hover:text-black
          text-white
          text-center
          text-lg
          py-1
          px-8
          md:py-2
          md:px-10
          md:text-2xl
          lg:py-3
          lg:px-12
          lg:text-4xl
          font-extrabold
          rounded-full
          bg-gradient-to-t
          transition-colors
          from-[#950808]
          to-[#FF0000]
        "
      >
        Login
      </a>
      <partners-icons class="py-4 px-0 md:pr-3 opacity-40 max-w-5xl" />
    </div>
    <div class="basis-full mx-auto md:basis-1/3 lg:basis-1/4">
      <div style="box-shadow: 7px 7px #e0131c">
        <img
        style="min-width: 295px"
          :src="$page.props.himage"
          alt="Header Section Image"
        />
      </div>
    </div>
  </div>
</template>

<script>
import PartnersIcons from "@/Components/PartnersIcons.vue";
export default {
  components: {
      PartnersIcons,
  }
};
</script>
