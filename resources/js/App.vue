<template>
    <NavigationCoponent></NavigationCoponent>
    <router-view></router-view>
</template>

<script>
    import NavigationCoponent from './components/NavigationComponent.vue';
    import router from './router';

    export default {
        components: {
            router,
            NavigationCoponent
        }
    }
</script>
