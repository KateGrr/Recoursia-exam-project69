<template>
    <header class="p-3 mb-3 border-bottom">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
              <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><a href="Recycler" class="nav-link px-2 link-dark active">Recycler</a></li>
              <li><a href="Terminal" class="nav-link px-2 link-dark">Terminal</a></li>
              <li><a href="Postamat" class="nav-link px-2 link-dark">Postamat</a></li>
              <li><a href="Posterminal" class="nav-link px-2 link-dark">Posterminal</a></li>
              <li><a href="Cardomat" class="nav-link px-2 link-dark">Cardomat</a></li>
            </ul>
          </div>
        </div>
      </header>
    <div class="container mt-3">
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
