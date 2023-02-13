<template>
    <div>
        <h4 class="text-center">Add Status</h4>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addStatus">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="status.name">
                    </div><br>
                    <button type="submit" class="btn btn-primary">Add Status</button>
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
    methods: {
        addStatus() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('/api/statuses/add', this.status)
                    .then(response => {
                        this.$router.push({name: 'statuses'})
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
