<template>
    <div>
        <div class="blog__navigation-wrapper">
            <nav class="blog__navigation">
                <ul>
                    <li class="active">
                        <a class="tab-link" @click.prevent="filterPost(null)" href="#">All</a>
                    </li>
                    <li v-for="category in categories">
                        <a class="tab-link" @click.prevent="filterPost(category.id)" href="#">{{ category.title }}</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="blog__posts">
            <article class="blog__post" v-for="post in posts">
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
        <div class="blog__load-more" @click="getPosts" v-if="url">
            Load more posts
        </div>
    </div>
</template>
<script type="text/babel">
    export default ({
        data: () => ({
            posts: [],
            categoryId: null,
            oldUrl: `/blog/all?page=1`,
            url: ""
        }),
        props: {
          categories: Array
        },
        created() {
            this.url = this.oldUrl;
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
            },
            filterPost(categoryId) {
                this.post = [];
                this.url = `${this.oldUrl}&filter=${categoryId}`;
                this.getPosts();
            }
        }
    });
</script>