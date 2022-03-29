<template>
  <div class="container">
      <h1>{{category.title}}</h1>
      <div v-for="post in category.posts" :key="post.slug" class="post">
          <div class="title">{{post.title}}</div>
          <router-link :to="{name: 'single-post', params: {slug:post.slug}}">Visualizza Post</router-link>
      </div>
  </div>
</template>

<script>
export default {
    name: "SingleCategory",
    data (){
        return{
            category: {}
        }
    },
    created() {
        axios
        .get(`/api/categories/${this.$route.params.slug}`)
        .then( (response)=> {
            this.category = response.data;
        }).catch( (error) => {
            //handle error
            this.$router.push({name: 'page-404'});
        })
    }
}
</script>

<style>

</style>