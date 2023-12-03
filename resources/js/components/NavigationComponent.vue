<template>
    <nav class="p-3 mb-3 border-bottom">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="#/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                    <img src="/image/logo.png" alt="logo">
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#/recycler" class="nav-link px-2 text-dark link-warning">Recycler</a></li>
                    <li><a href="#/terminal" class="nav-link px-2 text-dark link-warning">Terminal</a></li>
                    <li><a href="#/postamat" class="nav-link px-2 text-dark link-warning">Postamat</a></li>
                    <li><a href="#/posterminal" class="nav-link px-2 text-dark link-warning">Posterminal</a></li>
                    <li><a href="#/cardomat" class="nav-link px-2  text-dark link-warning">Cardomat</a></li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
    export default {
        name: 'NavigationComponent',
    }
</script>
