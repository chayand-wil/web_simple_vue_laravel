<template>
  <aside class="sidebar">
    <ul>
      <li><router-link to="/admin">Inicio</router-link></li>
      <li><router-link to="/admin/usuarios">Usuarios</router-link></li>
      <li><router-link to="/admin/reportes">Reportes</router-link></li>
    </ul>
  </aside>
</template>

<style scoped>
.sidebar {
  width: 220px;
  height: 100%;
  background-color: #2c3e50;
  color: white;
  padding: 1rem;
  box-sizing: border-box;
  margin: 0;
}

ul {
  list-style: none;
  padding: 0;
}

li {
  margin-bottom: 1rem;
}

a {
  color: white;
  text-decoration: none;
  font-weight: bold;
}

.router-link-exact-active {
  color: #42b983;
}
</style>
