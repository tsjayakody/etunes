<template>
    <client-auth>
        <iframe src="https://www.distro.direct/etunes/registration_iframe.php" title="Signup" style="width:100%; height: calc(100vh - 6rem); border:none;"></iframe>
    </client-auth>
</template>
<script>
import ClientAuth from '@/Layouts/ClientAuth.vue'
export default {
    components: {
        ClientAuth
    },
    data() {
        return {}
    },
}
</script>
