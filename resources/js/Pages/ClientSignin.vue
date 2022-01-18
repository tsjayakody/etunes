<template>
    <client-auth>
        <div class="flex flex-col flex-grow">
            <iframe src="https://www.distro.direct/etunes/login_iframe.php" title="Signin" style="width:100%; height:299px; border:none;"></iframe>
        </div>
    </client-auth>
</template>
<script>
import ClientAuth from '@/Layouts/ClientAuth.vue'
export default {
    components: {
        ClientAuth
    },
    data() {},
}
</script>
