<template>
  <header class="header">
    <div class="left">
      <h1>Recicla0te</h1>
    </div>
    <div class="right">
      <UserDropdown />
    </div>
  </header>
</template>

<script setup>
import UserDropdown from './UserDropdown.vue'
</script>

<style scoped>
.header {
  height: 60px;
  background-color: transparent;
  color: blue;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0 1rem;
}
</style>
