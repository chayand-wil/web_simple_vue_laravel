<template>
  <div>
    <h2>Bienvenido, Admin</h2>

    <form @submit.prevent="crearUsuario" style="margin-top: 1rem;">
      <h3>Registrar nuevo usuario</h3>
      <input v-model="nuevo.name" placeholder="Nombre" />
      <input v-model="nuevo.email" placeholder="Correo" />
      <input v-model="nuevo.password" type="password" placeholder="Contraseña" />
      <select v-model="nuevo.role">
        <option value="admin">Admin</option>
        <option value="ayudante">Ayudante</option>
      </select>
      <button type="submit">Registrar</button>
    </form>

    <p v-if="mensaje" style="color: green">{{ mensaje }}</p>
    <p v-if="error" style="color: red">{{ error }}</p>

    <h3 style="margin-top: 2rem;">Usuarios registrados:</h3>
    <ul>
      <li v-for="u in usuarios" :key="u.id">
        {{ u.name }} ({{ u.email }}) - Rol: {{ u.role }}
      </li>
    </ul>

  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import api from '../axios'
import { useRouter } from 'vue-router'

const router = useRouter()

// Verifica el rol
onMounted(async () => {
  try {
    const res = await api.get('/me')
    if (res.data.role !== 'admin') {
      router.push('/')
    } else {
      await cargarUsuarios()
    }
  } catch (e) {
    router.push('/')
  }
})

// Estados
const nuevo = ref({
  name: '',
  email: '',
  password: '',
  role: 'ayudante',
})

const usuarios = ref([])
const mensaje = ref('')
const error = ref('')

// Crear usuario
const crearUsuario = async () => {
  mensaje.value = ''
  error.value = ''
  try {
    await api.post('/users', nuevo.value)
    mensaje.value = 'Usuario creado correctamente'
    nuevo.value = { name: '', email: '', password: '', role: 'ayudante' }
    await cargarUsuarios()
  } catch (e) {
    error.value = 'Error al crear usuario'
    console.error(e)
  }
}

// Obtener lista de usuarios
const cargarUsuarios = async () => {
  try {
    const res = await api.get('/users')
    usuarios.value = res.data
  } catch (e) {
    error.value = 'Error al cargar usuarios'
  }
}

// Logout
const logout = async () => {
  try {
    await api.post('/logout')
  } catch (e) {}
  localStorage.clear()
  router.push('/')
}
</script>
