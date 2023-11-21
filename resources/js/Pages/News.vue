<script setup>
import AppHead from '../Components/Head.vue'
defineProps({
    news: {
        type: Object,
    },
    comments: {
        type: Object,
    },
    like: {
        type: Object,
    },
    love: {
        type: Number,
    },
    sad: {
        type: Number,
    },
});
</script>
<template>
    <AppHead title="News Web Page" />
    <div id="content">
        <h1 class="display-4 fst-italic">{{ news[0].title }}</h1>
        <p class="lead my-3">{{ news[0].content }}</p>
        <p class="blog-post-meta">{{ news[0].news_date }} by <a href="#">{{ news[0].user.name }}</a></p>
        <p>
            <i class="bi bi-hand-thumbs-up padding_right">
                {{ like }}
              </i>
              <i class="bi bi bi-heart padding_right">
              {{ love }}
              </i>
              <i class="bi bi-hand-thumbs-down padding_right">
              {{ sad }}
              </i>
        </p>
        <div v-for="comment in comments">
                        <div class="card w-75 mb-3" style="background-color: #D6DCD7; width: 800px;">
                            <div class="card-body">
                                <p class="card-text">{{ comment.comment }}</p>
                                              <br />
              <i class="bi bi-hand-thumbs-up" style="padding-right: 10px">

              </i>
              <i class="bi bi bi-heart" style="padding-right: 10px">

              </i>
              <i class="bi bi-hand-thumbs-down" style="padding-right: 10px">

              </i>
                            </div>
                        </div>
        </div>
    </div>
</template>
<style scoped>
#content {
    width: 80%;
    margin: auto;
    padding: 10px;
}
</style>
