<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <button type="button" class="btn btn-info" @click="this.$router.push('/statuses/add')">Add Status</button>
                <div>
                    <h4 class="text-center">All Statuses</h4><br/>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="status in statuses" :key="status.id">
                                <td>{{ status.id }}</td>
                                <td>{{ status.name }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <router-link :to="{name: 'editstatus', params: { id: status.id }}" class="btn btn-primary">Edit
                                        </router-link>
                                        <button class="btn btn-danger" @click="deleteStatus(status.id)">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            statuses: []
        }
    },
    created() {
        this.getStatuses()
        console.log(this.statuses);
    },
    methods: {
        getStatuses() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.get('/api/statuses')
                .then(response => {
                    this.statuses = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
            })
        },
        deleteStatus(id) {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.delete(`/api/statuses/delete/${id}`)
                .then(response => {
                    let i = this.statuses.map(item => item.id).indexOf(id); // find index of your object
                    this.statuses.splice(i, 1)
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
