<template>
    <nav data-mdb-navbar-init class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Project69</a>
            <button data-mdb-collapse-init class="navbar-toggler" type="button" data-mdb-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <router-link to="/" class="nav-link active" aria-current="page" href="#">Home</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/postamat" class="nav-link" href="#">Postamat</router-link>
                    </li>
                </ul>    
            </div>
        </div>
    </nav>
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
