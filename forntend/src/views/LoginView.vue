<template>
  <div>
    <h1>Login</h1>
    <input v-model="email" placeholder="Email" />
    <input v-model="password" type="password" placeholder="Password" />
    <button @click="login">Entrar</button>
    <p v-if="error">{{ error }}</p>
  </div>
</template>

<script setup>
import { ref } from 'vue'
// import axios from 'axios'
import api from '../axios'

import { useRouter } from 'vue-router'

const email = ref('')
const password = ref('')
const error = ref('')
const router = useRouter()

const login = async () => {
  try {
    const response = await api.post('/login', {
      email: email.value,
      password: password.value,
    })

    const token = response.data.access_token
    const role = response.data.user.role

    localStorage.setItem('token', token)
    localStorage.setItem('role', role)

    if (role === 'admin') {
      router.push('/admin')
    } else {
      router.push('/ayudante')
    }
  } catch (err) {
    error.value = 'Credenciales incorrectas'
  }
}
</script>
