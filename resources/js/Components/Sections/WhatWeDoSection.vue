<template>
  <div class="mx-5">
    <p
      class="
        text-[#EFDFEC]
        mt-6
        lg:mt-0
        text-center text-2xl
        sm:text-xl
        md:text-2xl
        lg:text-3xl
        uppercase
      "
    >
      What We Do
    </p>
    <div
      class="
        mt-6
        grid grid-rows-2
        sm:grid-rows-none sm:grid-cols-2 sm:divide-x
        text-[#D6CDCD]
      "
    >
      <div class="text-center sm:text-right sm:pr-3 text-sm sm:text-lg">
        We handle everything. eTunes makes your music available for the world to experience and collects streaming royalties on your behalf. Focus on your music while we do the heavy lifting to make your music available to the widest audience possible.
      </div>
      <div class="text-center sm:text-left sm:pl-3 text-sm sm:text-lg">
        With deals in place with over 100+ digital streaming platforms, eTunes offers album curation for artists with large catalogs, album artwork creation, and promotion of released records, all under a percent revenue share with no out-of-pocket expenses. All we need are your song files and a release date!
      </div>
    </div>
    <div class="mt-6 grid grid-rows-3 sm:grid-rows-none sm:grid-cols-3 gap-24">
      <div>
        <share-svg class="m-auto max-w-[150px] stroke-1 text-[#fdf1fe]" />
        <p class="text-[#D6CDCD] sm:text-2xl font-black text-center uppercase text-lg">
          Distribution
        </p>
        <div class="text-[#D6CDCD] text-center text-sm sm:text-lg">
          Distribute your music to Spotify, iTunes/Apple Music, YouTube Music, Facebook, Instagram, Amazon Music, TikTok, Deezer, & more. Own your masters, retain your rights, take control of your independent music career with a custom, hands on distribution provider.
        </div>
      </div>
      <div>
        <chartpie-svg class="m-auto max-w-[150px] stroke-1 text-[#fdf1fe]" />
        <p class="text-[#D6CDCD] sm:text-2xl text-lg font-black text-center uppercase">
          Analytics
        </p>
        <div class="text-[#D6CDCD] text-center text-sm sm:text-lg">
          Find out exactly where fans are streaming your tracks so you can increase marketing efforts and plan tours in those regions. Get direct access to Spotify for Artists to see you stats in realtime, direct from the source.
        </div>
      </div>
      <div>
        <speaker-phone-svg
          class="m-auto max-w-[150px] stroke-1 text-[#fdf1fe]"
        />
        <p class="text-[#D6CDCD] sm:text-2xl text-lg font-black text-center uppercase">
          Promotion
        </p>
        <div class="text-[#D6CDCD] text-center text-sm sm:text-lg">
          eTunes promotes your music by pitching playlist placements to generate increased discovery on Spotify. We provide editorial support at the top platforms for priority clients, helping to secure valuable promotion opportunities.
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import ShareSvg from "@/Components/ShareSvg.vue";
import ChartpieSvg from "@/Components/ChartpieSvg.vue";
import SpeakerPhoneSvg from "@/Components/SpeakerPhoneSvg.vue";
export default {
  components: {
    ShareSvg,
    ChartpieSvg,
    SpeakerPhoneSvg,
  },
};
</script>
