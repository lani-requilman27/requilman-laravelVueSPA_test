<template>
  <div class="row">
    <div class="col-lg-10 m-auto">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="books" class="nav-item nav-link">All Books</router-link>
                    <router-link to="/addbooks" class="nav-item nav-link">Add Book</router-link>
                </div>
            </div>
      </nav>
    </div>
  </div>
</template>

<script>
// import axios from 'axios'
export default {
  middleware: 'auth',

  // async asyncData () {
  //   const { data: projects } = await axios.get('/api/projects')

  //   return {
  //     projects
  //   }
  // },

  metaInfo () {
    return { title: this.$t('home') }
  }
}
</script>
