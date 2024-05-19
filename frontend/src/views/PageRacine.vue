<script>
export default {
    beforeMount() {
        const user = JSON.parse(localStorage.getItem("userAuth"));
        if (user != null) {
            if (user.role == "client") {
                this.$router.push("espace/client")
            } else if (user.role == "admin") {
                this.$router.push("espace/admin")
            }
        }
    },
}
</script>