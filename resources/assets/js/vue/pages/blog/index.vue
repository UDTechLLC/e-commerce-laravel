<template>
    <main class="blog">
        <div class="blog__heading-wrapper">
            <div class="blog__heading">
                <h1 class="blog__heading-title">
                    Blog
                </h1>
            </div>
        </div>
        <div class="blog__navigation-wrapper">
            <nav class="blog__navigation">
                <ul>
                    <li>
                        <a class="tab-link" href="#">Exercises</a>
                    </li>
                    <li class="active">
                        <a class="tab-link" href="#">Blog</a>
                    </li>
                    <li>
                        <a class="tab-link" href="#">Vlog</a>
                    </li>
                    <li>
                        <a class="tab-link" href="#">Workouts</a>
                    </li>
                    <li>
                        <a class="tab-link" href="#">Recipes</a>
                    </li>
                    <li>
                        <a class="tab-link" href="#">Education</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="blog__posts">
            <article class="blog__post" v-for="post in posts">
                <a class="blog__post-top" href="#">
                    <img :src="post.image"/>
                </a>
                <div class="blog__post-bottom">
                    <h2 class="blog__post-bottom-title">
                        <a href="#">
                            {{ post.title }}
                        </a>
                    </h2>
                    <div class="blog__post-bottom-info">
                        <div class="blog__post-bottom-meta-date">
                            <img class="blog__post-icon" src="web/images/blog/blog-icon.svg" />
                            <span class="blog__post-separator">|</span>
                            <p class="blog__post-bottom-meta-line">
                                {{ post.published }}
                            </p>
                        </div>
                        <span class="blog__post-separator">|</span>
                        <div class="blog__post-bottom-meta-view">
                            <img class="blog__post-icon" src="web/images/blog/icon-white.svg" />
                                <span class="blog__post-text">
                                    9,028
                                </span>
                        </div>
                        <span class="blog__post-separator">|</span>
                        <div class="blog__post-bottom-meta-likes">
                            <img class="blog__post-icon" src="web/images/blog/icon-heart-white.svg" />
                                <span class="blog__post-text">
                                    0
                                </span>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        <div class="blog__load-more" @click="getPosts" v-if="url">
            Load more posts
        </div>
    </main>
</template>
<script type="text/babel">
    export default ({
       data: () => ({
           posts: [],
           url: `/blog/all?page=1`
       }),
        created() {
          this.getPosts()
        },
        methods: {
            getPosts() {
                axios.get(this.url).then(
                        response => {
                            this.posts.push(...response.data.data);
                            this.url = response.data.links.next;
                        },
                        error => console.log('error')

                )
            }
        }
    });
</script>