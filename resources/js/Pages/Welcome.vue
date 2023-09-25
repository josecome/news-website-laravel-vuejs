<script setup>
import { Link } from '@inertiajs/vue3';
import AppHead from '../Components/Head.vue'
import Footer from '../Components/Footer.vue'
//import { ref, onMounted } from 'vue'

defineProps({
    data: {
        type: Object,
    },
    news: {
        type: Object,
    },
    breaking_news: {
        type: Number,
    },
    featured_section: {
        type: Array,
    },
    news_month_year: {
        type: Object,
    }
    /*     canLogin: {
            type: Boolean,
        },
        canRegister: {
            type: Boolean,
        },
        laravelVersion: {
            type: String,
            required: true,
        },
        phpVersion: {
            type: String,
            required: true,
        }, */
});
/*onMounted(() => {
  console.log(data)
})*/
</script>

<template>
    <AppHead title="News Web Page" />
    <main class="container">
        <div class="p-4 p-md-5 mb-4 rounded text-bg-dark">
            <div class="col-md-6 px-0">
                <h1 class="display-4 fst-italic">{{ news[breaking_news].title }}</h1>
                <p class="lead my-3">{{ news[breaking_news].content.slice(1, 100) }}</p>
                <p class="lead mb-0">
                    <Link :href="`/news/${news[breaking_news].id}`" style="color: white;">
                    Continue reading...
                    </Link>
                </p>
            </div>
        </div>
        <h3>Featured Sections</h3>
        <div class="row mb-2">
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">World</strong>
                        <h3 class="mb-0">{{ news[featured_section[0]].title }}</h3>
                        <div class="mb-1 text-muted">{{ news[featured_section[0]].news_date }}</div>
                        <p class="card-text mb-auto">{{ news[featured_section[0]].content.slice(1, 100) }}</p>
                        <Link :href="`/news/${news[featured_section[0]].id}`">
                        Continue reading...
                        </Link>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg"
                            role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                            focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef"
                                dy=".3em">Thumbnail</text>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-success">Most read this week</strong>
                        <h3 class="mb-0">{{ news[featured_section[1]].title }}</h3>
                        <div class="mb-1 text-muted">{{ news[featured_section[1]].news_date }}</div>
                        <p class="mb-auto">{{ news[featured_section[1]].content.slice(1, 100) }}</p>
                        <Link :href="`/news/${news[featured_section[1]].id}`">
                        Continue reading...
                        </Link>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg"
                            role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                            focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef"
                                dy=".3em">Thumbnail</text>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-5">
            <div class="col-md-8">
                <h3 class="pb-4 mb-4 fst-italic border-bottom">
                    Other News
                </h3>

                <article class="blog-post">
                    <div v-for="newss in news" :key="id">
                        <h4 class="blog-post-title mb-1">{{ newss.title }}</h4>
                        <span>{{ newss.content.slice(1, 100) }}</span>
                        <Link :href="`/news/${newss.id}`">
                        Continue reading...
                        </Link>
                        <p class="blog-post-meta">{{ newss.news_date }} by <a href="#">Jose</a></p>
                    </div>
                </article>
                <nav class="blog-pagination" aria-label="Pagination">
                    <a class="btn btn-outline-primary rounded-pill" href="#">Older</a>
                    <a class="btn btn-outline-secondary rounded-pill disabled">Newer</a>
                </nav>

            </div>

            <div class="col-md-4">
                <div class="position-sticky" style="top: 2rem;">
                    <div class="p-4 mb-3 bg-light rounded">
                        <h4 class="fst-italic">About</h4>
                        <p class="mb-0">Customize this section to tell your visitors a little bit about your publication,
                            writers, content, or something else entirely. Totally up to you.</p>
                    </div>

                    <div class="p-4">
                        <h4 class="fst-italic">Old News</h4>
                        <ol class="list-unstyled mb-0">
                            <li v-for="news_month_years in news_month_year"><a href="#" style="text-decoration: none;">{{
                                news_month_years }}</a></li>
                        </ol>
                    </div>

                    <div class="p-4">
                        <h4 class="fst-italic">Elsewhere</h4>
                        <ol class="list-unstyled">
                            <li><a href="#">GitHub</a></li>
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Facebook</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <Footer />
</template>
<style>
@import "bootstrap/dist/css/bootstrap.css";
@import "bootstrap-icons/font/bootstrap-icons.css";
</style>
<style>
/* stylelint-disable selector-list-comma-newline-after */

.blog-header {
    border-bottom: 1px solid #e5e5e5;
}

.blog-header-logo {
    font-family: "Playfair Display", Georgia, "Times New Roman", serif
        /*rtl:Amiri, Georgia, "Times New Roman", serif*/
    ;
    font-size: 2.25rem;
}

.blog-header-logo:hover {
    text-decoration: none;
}

h1,
h2,
h3,
h4,
h5,
h6 {
    font-family: "Playfair Display", Georgia, "Times New Roman", serif
        /*rtl:Amiri, Georgia, "Times New Roman", serif*/
    ;
}

.display-4 {
    font-size: 2.5rem;
}

@media (min-width: 768px) {
    .display-4 {
        font-size: 3rem;
    }
}

.flex-auto {
    flex: 0 0 auto;
}

.h-250 {
    height: 250px;
}

@media (min-width: 768px) {
    .h-md-250 {
        height: 250px;
    }
}

/* Pagination */
.blog-pagination {
    margin-bottom: 4rem;
}

/*
 * Blog posts
 */
.blog-post {
    margin-bottom: 4rem;
}

.blog-post-title {
    font-size: 2.5rem;
}

.blog-post-meta {
    margin-bottom: 1.25rem;
    color: #727272;
}

/*
 * Footer
 */
.blog-footer {
    padding: 2.5rem 0;
    color: #727272;
    text-align: center;
    background-color: #f9f9f9;
    border-top: .05rem solid #e5e5e5;
}

.blog-footer p:last-child {
    margin-bottom: 0;
}</style>
