<template>
    <div class="container">
        <h1>{{post.title}}</h1>
        <div v-html="post.content"></div>
        <p v-if="post.category"><strong>Categoria:</strong> {{post.category.name}}</p>
        <div v-if="post.tags.length > 0">
            <strong>Tags</strong>
            <ul>
                <li v-for="tag in post.tags" :key="tag.id">
                    {{tag.name}}
                </li>
            </ul>
        </div>
        <img v-if="post.image" :src="`/storage/${post.image}`" :alt="`/public/img/empty-image.jpg`">
        Inserisci Commento

        <div>
            <h3>Lascia un commento</h3>
            <form @submit.prevent="addComment()">
                <input type="text" id="name" placeholder="Inserisci il nome" v-model="formData.name">
                <textarea id="content" cols="30" rows="10"></textarea>
                <button type="submit">Aggiungi Commento</button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "SinglePost",
    data() {
        return{
            post: {},
            formData: {
                name: "",
                content: "",
                post_id: null,
            }
        }
    },
    created() {
        this.getPost();
    },
    methods: {
        getPost: function () {
            axios
                .get(`/api/posts/${this.$route.params.slug}`)
                .then((response) => {
                    this.post = response.data;
                    this.formData.post_id = this.post.id;
                }).catch( (error) => {
                    //handle error
                    this.$router.push({name: 'page-404'});
                })
        },
        addComment(){
            axiosname
            .get(`/api/comments/`, this.formData)
            .then( (response) => {
                this.formData.name="";
                this.formData.content="";
                this.contentSent = true;
            }).catch( (error) => {
                    //handle error
                    //this.$router.push({name: 'page-404'});
                })
        }
    }
}
</script>

<style>

</style>