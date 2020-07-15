<template>
    <div>
        <h3 class="text-center">All Book Collections</h3><br/>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="task in tasks" :key="task.id">
                <td>{{ task.id }}</td>
                <td>{{ task.title }}</td>
                <td>{{ task.description }}</td>
                <td>{{ task.created_at }}</td>
                <td>{{ task.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: task.id }}" class="btn btn-primary">Edit
                        </router-link>
                        <button class="btn btn-danger" @click="deleteTask(task.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: 'AllCollections',
        data() {
            return {
                tasks: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/tasks')
                .then(response => {
                    this.tasks = response.data;
                });
        },
        methods: {
            deleteTask(id) {
                this.axios
                    .delete(`http://localhost:8000/api/delete/${id}`)
                    .then(response => {
                        let i = this.tasks.map(item => item.id).indexOf(id); // find index of your object
                        this.tasks.splice(i, 1)
                    });
            }
        }
    }
</script>