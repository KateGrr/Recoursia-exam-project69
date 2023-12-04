<template>
    <div>
        <nav class="p-3 mb-3 border-bottom">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <router-link to="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                    <img src="/image/logo.png">
                </router-link>
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li class="nav-item">
                        <router-link class="nav-link px-2 text-dark link-warning" to="/recycler">Recycler</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link px-2 text-dark link-warning" to="/terminal">Terminal</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link px-2 text-dark link-warning" to="/postamat">Postamat</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link px-2 text-dark link-warning" to="/posterminal">Posterminal</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link px-2 text-dark link-warning" to="/cardomat">Cardomat</router-link>
                    </li>
                </ul>
            </div>
        </div>
        </nav>
      <router-view></router-view>
    </div>
  </template>
  

<script>
    export default {
        name: 'NavigationComponent',
    }
</script>
