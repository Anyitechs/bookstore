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
            <tr v-for="book in books" :key="book.id">
                <td>{{ book.id }}</td>
                <td>{{ book.title }}</td>
                <td>{{ book.description }}</td>
                <td>{{ book.created_at }}</td>
                <td>{{ book.updated_at }}</td>
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
                books: []
            }
        },
        created() {
            this.axios
                .get('http://127.0.0.1:8000/api/books')
                .then(response => {
                    this.books = response.data.data;
                });
        }
    }
</script>