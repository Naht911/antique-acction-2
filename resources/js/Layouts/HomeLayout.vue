<template>
  <!--Header-->
  <Head :title="title" />
  <Header class="sticky top-0 z-50" />

  <main class="relative">
    <slot />
  </main>
  <!--Footer-->
  <Footer />
</template>
<script setup>
import Header from "../Layouts/HomeLayouts/Narbar.vue";
import Footer from "../Layouts/HomeLayouts/End.vue";
import { ref } from "vue";
import { Head, Link, router } from "@inertiajs/vue3";
import NavLink from "@/Components/Dashboard/NavLink.vue";
import ResponsiveNavLink from "@/Components/Dashboard/ResponsiveNavLink.vue";

defineProps({
  title: String,
});
</script>
<style>
.hscreen-1 {
  height: 10vh;
}

main {
  overflow-x: hidden;
}
</style>
