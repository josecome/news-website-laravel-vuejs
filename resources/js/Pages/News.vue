<script setup>
import AppHead from '../Components/Head.vue'
defineProps({
    news: {
        type: Object,
    },
});
</script>
<template>
    <AppHead title="News Web Page" />
    <div id="content">
        <h1 class="display-4 fst-italic">{{ news[0].title }}</h1>
        <p class="lead my-3">{{ news[0].content }}</p>
    </div>
</template>
<style scoped>
#content {
    width: 80%;
    margin: auto;
    padding: 10px;
}
</style>
