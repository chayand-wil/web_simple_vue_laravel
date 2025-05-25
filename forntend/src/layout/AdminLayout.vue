mira tengo eso: <template>
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
// import AppSidebar from '../components/AppSidebar.vue'
</script>

<style scoped>
 


.layout {
  height: 100vh;
  width: 100vw;
  display: flex;
  flex-direction: column;
  margin: 0;
  padding: 0;
}

.main {
  display: flex;
  flex: 1;
  overflow: hidden;
  margin: 0;
  padding: 0;
}

.content {
  position: relative;
  z-index: 1;
  flex: 1;
  overflow-y: auto;
  padding: 2rem;
}

.content::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url('@/assets/background.png');
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;

  filter: blur(1px); /* <- Aplica el desenfoque */
  z-index: -1; /* Para que quede detrás del contenido */
}





</style>
