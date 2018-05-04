<template>
    <div class="blog-post__content-like">
        <a class="blog-post__content-like-link" :class="{'active': active}" href="#"
           @click.prevent="event"></a>
               <span class="blog-post__content-like-counter ">
                    {{ likesCount }}+
               </span>
    </div>
</template>
<script type="text/babel">
    export default ({
        data: () => ({
            likesCount: 0,
            active: false
        }),
        props: {
            likes: Number,
            type: String,
            id: Number,
            likeUrl: String,
            dislikeUrl: String
        },
        created() {
            this.likesCount = this.likes;
            this.checkStorage()
        },
        methods: {
            event() {
                 (this.active) ? this.dislike() :this.like()
            },
            like () {
                axios.put(this.likeUrl).then(
                        response => {
                            let tmp = [];
                            tmp.push(...JSON.parse(Vue.localStorage.get(this.type)));
                            tmp.push(this.id);
                            Vue.localStorage.set(this.type, JSON.stringify(tmp));
                            this.active = true;
                            this.likesCount++;
                        },
                        error => console.log('error')
                );
            },
            dislike() {
                axios.put(this.dislikeUrl).then(
                        response => {
                            let tmp = JSON.parse(Vue.localStorage.get(this.type));
                            tmp.splice(tmp.indexOf(this.id), 1);
                            Vue.localStorage.set(this.type, JSON.stringify(tmp));
                            this.active = false;
                            this.likesCount--;
                        },
                        error => console.log('error')
                );
            },
            checkStorage() {
                let oldStorage = JSON.parse(Vue.localStorage.get(this.type));
                if (oldStorage && oldStorage.indexOf(this.id) != -1) {
                    this.active = true;
                } else {
                    let a = [];
                    Vue.localStorage.set(this.type, JSON.stringify(a));
                }
            }
        }
    })
</script>