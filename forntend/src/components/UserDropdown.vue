<template>
  <div class="user-menu" @click="toggle">
    👤
    <div v-if="open" class="dropdown">
      <p><strong>{{ user.name }}</strong></p>
      <p>{{ user.email }}</p>
      <button @click.stop="logout">Cerrar sesión</button>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import api from '../axios'
import { useRouter } from 'vue-router'

const router = useRouter()
const open = ref(false)
const user = ref({ name: '', email: '' })

const toggle = () => (open.value = !open.value)

onMounted(async () => {
  try {
    const res = await api.get('/me')
    user.value = res.data
  } catch {
    router.push('/')
  }
})

const logout = async () => {
  try {
    await api.post('/logout')
  } catch {}
  localStorage.clear()
  router.push('/')
}
</script>

<style scoped>
.user-menu {
  position: relative;
  cursor: pointer;
}

.dropdown { 
  position: absolute;
  top: 2rem;
  right: 0;
  background: white;
  border: 1px solid #ccc;
  padding: 1rem;
  color: #333;
  width: 200px;
  z-index: 100;
}
</style>
