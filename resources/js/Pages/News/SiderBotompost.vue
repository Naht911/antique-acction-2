<template>
  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
    <div class="sidebar-widget">
      <div class="widget-title-cover">
        <h4 class="widget-title">
          <span>RELATED ARTICLES</span>
        </h4>
        <div class="container mt-3">
          <div class="mb-2" v-for="SimilarPosts in relatedArticles" :key="SimilarPosts.id">
            <Link :href="route('news.Detail', [ SimilarPosts.category.slug, SimilarPosts.slug])">
              <div class="row g-0">
                <div class="col-md-2">
                  <img :src="SimilarPosts.thumbnail" alt="aaa" class="card-img-top" />
                </div>
                <div class="col-md-6">
                  <div class="card-body ml-2">
                    <h3 class="card-title font-weight-bold">
                      <strong>{{ SimilarPosts.title }}</strong>
                    </h3>
                    <!-- <p class="card-text">{{ formatDate(top.created_at) }}</p> -->
                    <p class="card-text">
                      {{ shorttext(SimilarPosts.content, 80) }}
                    </p>
                  </div>
                </div>
              </div>
            </Link>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
    <div class="sidebar-widget">
      <div class="widget-title-cover">
        <h4 class="widget-title">
          <span>the most views</span>
        </h4>
        <div class="container mt-3">
          <div class="mb-2" v-for="top in topViewedPosts" :key="top.id">
            <Link :href="route('news.Detail', [ top.category.slug, top.slug])">
              <div class="row g-0">
                <div class="col-md-2">
                  <img :src="top.thumbnail" alt="aaa" class="card-img-top" />
                </div>
                <div class="col-md-6">
                  <div class="card-body ml-2">
                    <h3 class="card-title font-weight-bold">
                      <strong>{{ top.title }}</strong>
                    </h3>
                    <!-- <p class="card-text">{{ formatDate(top.created_at) }}</p> -->
                    <p class="card-text">
                      {{ shorttext(top.content, 80) }}
                    </p>
                  </div>
                </div>
              </div>
            </Link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Link } from "@inertiajs/vue3";

export default {
  setup() {
    return {};
  },
  props: {
    relatedArticles: {
      type: Object,
      default: [],
    },
    topViewedPosts: {
      type: Object,
      default: [],
    },
  },
  methods: {
    shorttext(value, limit) {
      if (value && limit) {
        return value.substring(0, limit) + "...";
      }
    },
  },
  components: { Link },
};
</script>

<style>
.sidebar-widget {
  margin: 0 0 30px 0;
}
.widget-title-cover {
  line-height: 1;
  margin-bottom: 10px;
  overflow: hidden;
}

h4.widget-title {
  font-size: 16px;
  position: relative;
  text-transform: uppercase;
  display: inline-block;
}
h4.widget-title::after {
  background: #000 none repeat scroll 0 0;
  bottom: 10px;
  content: "";
  display: inline-block;
  height: 1px;
  left: 100%;
  position: absolute;
  width: 100vw;
}
h4.widget-title span {
  padding-left: 15px;
  padding-right: 10px;
}
h4.widget-title span::before {
  background: #000 none repeat scroll 0 0;
  border-radius: 50%;
  content: "";
  height: 8px;
  left: 0;
  margin-top: -4px;
  position: absolute;
  top: 50%;
  width: 8px;
}
.latest_style_3_item {
  border-bottom: 1px solid #eee;
  min-height: 50px;
  overflow: hidden;
  padding: 40px 0;
  position: relative;
}
.latest_style_3_item span.item-count {
  float: left;
  font-size: 30px;
}
.latest_style_3_item .alith_post_title_small {
  clear: none;
  float: left;
  left: 12%;
  margin-left: 0;
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  width: 90%;
}
.latest_style_3 .latest_style_3_item:last-child {
  border: none;
}

.vertical-align {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
}

.latest_style_2_item_first h3.alith_post_title {
  font-size: 18px;
  font-weight: 300;
}
.latest_style_2_item_first {
  border-bottom: 1px solid #eee;
  margin-bottom: 20px;
  overflow: hidden;
  padding-bottom: 10px;
}
.latest_style_2_item {
  border-bottom: 1px solid #eee;
  margin-bottom: 20px;
  overflow: hidden;
  padding-bottom: 20px;
  position: relative;
}
.latest_style_2_item figure {
  display: block;
  float: left;
  margin: 0 15px 0 0;
  position: relative;
  width: 35%;
}
.latest_style_2_item h3.alith_post_title {
  font-size: 16px;
  font-weight: 500;
  margin-bottom: 15px;
}
.latest_style_2 .latest_style_2_item:last-child {
  border-bottom: 0 none;
  margin: 0;
  padding: 0;
}

.latest_style_1_item .alith_news_img {
  display: block;
  float: right;
  margin: 0;
  position: relative;
  width: 35%;
}

.alith_news_img {
  height: 106px !important;
  width: 122px p !important;
  max-width: 100%;
}

.latest_style_2_item figure {
  width: 25%;
}

.bottom_menu {
  overflow: hidden;
}
.bottom_menu li {
  float: left;
  margin: 2px 0;
  width: 80%;
}

.bottom_menu li a {
  float: left;
  margin: 2px 0;
  width: 50%;
}
</style>