<template>
  <HomeLayout :title="title">
    <div class="clear-fix"></div>
    <div class="margin-lr">
      <div class="container-fluid">
        <div class="container">
          <div class="margin-15">
            <div class="row">
              <div class="col-md-8">
                <ArticleDetails
                  :newsDetail="newsDetail"
                />
              </div>
              <aside class="col-md-4">
                <SidebarRightnews
                  :latestPosts="latestPosts"
                  :Categories_Sidebar="Categories_Sidebar"
                />
              </aside>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <div class="container">
          <div class="bottom margin-15">
            <div class="row">
              <SiderBotom
                :relatedArticles="relatedArticles"
                :topViewedPosts="topViewedPosts"
              />
            </div>
          </div>
        </div>
      </div>
    </div>
  </HomeLayout>
</template>
<script>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import RecentPosts from "./Recent_Posts.vue";
import SidebarRightnews from "./SidebarRightnews.vue";
import SiderBotom from "./SiderBotompost.vue";
import ArticleDetails from "./ArticleDetails.vue";

import { defineComponent, useAttrs } from "vue";

export default defineComponent({
  setup() {
    const attrs = useAttrs();

    const Categories_Sidebar = attrs.Categories;
    const latestPosts = attrs.latestPosts;
    const relatedArticles = attrs.relatedArticles;
    const topViewedPosts = attrs.topViewedPosts;

    const newsDetail = attrs.newsDetail;

    const title = attrs.newsDetail.title;

    return {
      Categories_Sidebar,
      latestPosts,
      relatedArticles,
      topViewedPosts,
      
      newsDetail,
      title,
    };
  },
  components: {
    HomeLayout,
    RecentPosts,
    SidebarRightnews,
    SiderBotom,
    ArticleDetails,
  },
  methods: {
    shorttext(value, limit) {
      if (value && limit) {
        return value.substring(0, limit) + "...";
      }
    },
  },
});
</script>

<style>
</style>
