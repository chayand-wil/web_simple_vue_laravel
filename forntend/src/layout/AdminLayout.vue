<template>
  <div class="layout">
    <AppHeader />
    <div class="main">
      <AppSidebar />
      <div class="content">
        <router-view />
      </div>
    </div>
  </div>
</template>

<script setup>
import AppHeader from '../components/AppHeader.vue'
import AppSidebar from '../components/AppSidebar.vue'
</script>

<style scoped>
.layout {
  display: flex;
  flex-direction: column;
  height: 100vh;
  width: 100%; /* no uses 100vw */
  overflow: hidden;
}

.main {
  display: flex;
  flex: 1;
  width: 100%;
  overflow: hidden;
  min-width: 0;
}

.content {
  flex: 1;
  overflow-y: auto;
 padding: 1rem; /* o incluso 0 si quieres que todo se pegue al borde */
 width: 100%;
 height: 100%;



}

</style>
