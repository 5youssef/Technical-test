<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <button type="button" class="btn btn-info" @click="this.$router.push('/projects/add')">Add Project</button>
                <div>
                    <h4 class="text-center">All Projects</h4><br/>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="project in projects" :key="project.id">
                                <td>{{ project.id }}</td>
                                <td>{{ project.name }}</td>
                                <td>{{ project.author }}</td>
                                <td>{{ project.created_at }}</td>
                                <td>{{ project.updated_at }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <router-link :to="{name: 'editproject', params: { id: project.id }}" class="btn btn-primary">Edit
                                        </router-link>
                                        <button class="btn btn-danger" @click="deleteProject(project.id)">Delete</button>
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
            projects: []
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/projects')
            .then(response => {
                this.projects = response.data;
            })
            .catch(function (error) {
                console.error(error);
            });
        })
    },
    methods: {
        deleteProject(id) {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.delete(`/api/projects/delete/${id}`)
                .then(response => {
                    let i = this.projects.map(item => item.id).indexOf(id); // find index of your object
                    this.projects.splice(i, 1)
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
