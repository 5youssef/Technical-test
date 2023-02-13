<template>
    <div>
        <h4 class="text-center">Edit Status</h4>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateStatus">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="status.name">
                    </div><br>
                    <button type="submit" class="btn btn-primary">Update Status</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            status: {}
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get(`/api/statuses/edit/${this.$route.params.id}`)
                .then(response => {
                    this.status = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        updateStatus() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post(`/api/statuses/update/${this.$route.params.id}`, this.status)
                    .then(response => {
                        this.$router.push({name: 'statuses'});
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
        }
    },
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/";
        }
        next();
    }
}
</script>
