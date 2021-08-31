<template>
    <div>
        <h3 class="text-center">All Books</h3><br/>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="book in books" :key="book.id">
                <td>{{ book.id }}</td>
                <td>{{ book.name }}</td>
                <td>{{ book.author }}</td>
                <td>{{ book.created_at }}</td>
                <td>{{ book.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'EditBooks', params: { id: book.id }}" class="btn btn-primary">Edit
                        </router-link>
                        <button class="btn btn-danger" @click="deleteBook(book.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        <router-link to="/home" class="btn btn-primary">Go Back</router-link>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                books: []
            }
        },
        created() {
            this.axios
                .get('http://laravel-vue-spa.test/api/books')
                .then(response => {
                    this.books = response.data;
                });
        },
        methods: {
            deleteBook(id) {
                this.axios
                    .delete(`http://laravel-vue-spa.test/api/book/delete/${id}`)
                    .then(response => {
                        let i = this.books.map(item => item.id).indexOf(id); // find index object
                        this.books.splice(i, 1)
                    });
            }
        }
    }
</script>