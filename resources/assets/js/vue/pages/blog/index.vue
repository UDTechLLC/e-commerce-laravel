<template>
    <div>
        <div class="blog__navigation-wrapper">
            <nav class="blog__navigation">
                <ul>
                    <li :class="{'active': categoryId == null}">
                        <a class="tab-link" @click.prevent="filterPost(null)" href="#">All</a>
                    </li>
                    <li v-for="category in categories" :class="{'active': categoryId == category.id}">
                        <a class="tab-link" @click.prevent="filterPost(category.id)" href="#">{{ category.title }}</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="blog__posts">
            <article class="blog__post" v-for="post in posts" :key="post.id">
                <a class="blog__post-top" :href="'/blog/'+ post.slug">
                    <img :src="post.preview"/>
                </a>
                <div class="blog__post-bottom">
                    <h2 class="blog__post-bottom-title">
                        <a :href="'/blog/'+ post.slug">
                            {{ post.title }}
                        </a>
                    </h2>
                    <div class="blog__post-bottom-info">
                        <div class="blog__post-bottom-meta-date">
                            <img class="blog__post-icon" src="web/images/blog/blog-icon.svg"/>
                            <span class="blog__post-separator">|</span>
                            <p class="blog__post-bottom-meta-line">
                                {{ post.posted_at }}
                            </p>
                        </div>
                        <span class="blog__post-separator">|</span>
                        <div class="blog__post-bottom-meta-view">
                            <img class="blog__post-icon" src="web/images/blog/icon-white.svg"/>
                                <span class="blog__post-text">
                                    {{ post.views }}
                                </span>
                        </div>
                        <span class="blog__post-separator">|</span>
                        <div class="blog__post-bottom-meta-likes">
                            <img class="blog__post-icon" src="web/images/blog/icon-heart-white.svg"/>
                                <span class="blog__post-text">
                                    {{ post.likes }}
                                </span>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        <div class="blog__load-more" @click="getPosts" v-if="showButton">
            Load more posts
        </div>
    </div>
</template>
<script type="text/babel">
    export default ({
        data: () => ({
            posts: [],
            categoryId: null,
            currentPage: 1,
            showButton: true
        }),
        props: {
          categories: Array
        },
        created() {
            this.getPosts()
        },
        methods: {
            getPosts() {
                let url = (this.categoryId) ? `/blog/all?filter=${this.categoryId}&page=${this.currentPage}` :
                        `/blog/all?page=${this.currentPage}`;

                 axios.get(url).then(
                        response => {
                            this.posts.push(...response.data.data);
                            this.showButton = (response.data.links.next) ? true : false;
                            this.currentPage++;
                        },
                        error => console.log('error')
                )
            },
            filterPost(categoryId) {
                this.posts = [];
                this.currentPage = 1;
                this.categoryId = categoryId;
                this.getPosts();
            }
        }
    });
</script>
<style scoped>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active до версии 2.1.8 */ {
        opacity: 0;
    }
</style>