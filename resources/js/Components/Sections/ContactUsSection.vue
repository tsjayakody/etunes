<template>
  <div class="grid grid-cols-3 p-5 sm:p-7">
    <div class="col-span-3 sm:col-span-1">
      <p class="font-black text-center sm:text-left text-2xl sm:text-4xl text-[#EFDFEC]">
        Contact Us
      </p>
      <div class="m-3 flex flex-row flex-wrap gap-3">
        <div class="flex-1">
          <mail-svg class="mx-auto sm:ml-0 w-10 stroke-1 text-[#fdf1fe]" />
          <a
            href="mailto:contact@etunes.lk"
            class="text-[#D6CDCD] block text-center sm:text-left text-xs sm:text-xl"
            >contact@etunes.lk</a
          >
        </div>
        <div class="flex-1">
          <phone-svg class="mx-auto sm:ml-0 w-10 stroke-1 text-[#fdf1fe]" />
          <a
            href="tel:+94115300600"
            class="text-[#D6CDCD] block sm:text-left text-center text-xs sm:text-xl"
            >+94 115 300 600</a
          >
        </div>
        <div class="flex-2">
          <address-svg class="m-auto sm:ml-0 w-10 stroke-1 text-[#fdf1fe]" />
          <p class="text-[#D6CDCD] block sm:text-left text-center text-xs sm:text-xl">
            Level 01, No 320, "Deutsche House", T.B Jayah Mawatha, Colombo 10,
            Sri Lanka
          </p>
        </div>
      </div>
    </div>
    <div class="col-span-3 sm:col-span-2">
      <div class="flex flex-row flex-wrap gap-x-6 gap-y-2 mt-6">
        <div class="flex-1">
          <p class="uppercase text-[#D6CDCD] text-xs sm:text-sm text-left font-bold mb-1">
            First Name
          </p>
          <input class="text-xs sm:text-sm border-0 w-full" type="text" />
        </div>
        <div class="flex-1">
          <p class="uppercase sm:text-sm text-[#D6CDCD] text-xs text-left font-bold mb-1">
            Last Name
          </p>
          <input class="text-xs sm:text-sm border-0 w-full" type="text" />
        </div>
        <div class="basis-full">
          <p class="uppercase text-[#D6CDCD] sm:text-sm text-xs text-left font-bold mb-1">
            Email
          </p>
          <input class="text-xs border-0 sm:text-sm w-full" type="email" />
        </div>
        <div class="basis-full">
          <p class="uppercase text-[#D6CDCD] sm:text-sm text-xs text-left font-bold mb-1">
            Your Message
          </p>
          <textarea class="text-xs border-0 sm:text-sm w-full" rows="4" />
        </div>
        <button class="bg-gradient-to-t from-[#130000] to-[#323232] text-white px-6 py-2 rounded-lg text-base font-bold mx-auto uppercase">Submit</button>
      </div>
    </div>
  </div>
</template>
<script>
import MailSvg from "@/Components/MailSvg.vue";
import PhoneSvg from "@/Components/PhoneSvg.vue";
import AddressSvg from "@/Components/AddressSvg.vue";
export default {
  components: {
    MailSvg,
    PhoneSvg,
    AddressSvg,
  },
};
</script>
