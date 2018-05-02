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
            type: String,
            id: Number
        },
        created() {
          this.checkStorage()
        },
        methods: {
            event() {
              if (this.active) {
                  this.dislike()
              } else {
                  this.like()
              }
            },
            like () {
                this.active = true;
                let tmp = [];
                tmp.push(...JSON.parse(Vue.localStorage.get(this.type)));
                tmp.push(this.id);
                Vue.localStorage.set(this.type, JSON.stringify(tmp));
            },
            dislike() {
                let tmp = JSON.parse(Vue.localStorage.get(this.type));
                tmp.splice(tmp.indexOf(this.id), 1);
                Vue.localStorage.set(this.type, JSON.stringify(tmp));
                this.active = false;
            },
            checkStorage() {
                let oldStorage = JSON.parse(Vue.localStorage.get(this.type));
                if (oldStorage) {
                    if (oldStorage.indexOf(this.id) != -1) {
                        this.active = true;
                    }
                } else {
                    let a = [];
                    Vue.localStorage.set(this.type, JSON.stringify(a));
                }
            }
        }
    })
</script>