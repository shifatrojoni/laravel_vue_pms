<template>
    <div class="site-wrap">
        <Header></Header>
        <slot></slot>
        <Footer></Footer>
    </div>
    </template>
    
    <script setup>
    
    import Header from '@/Components/Header.vue';
    import Footer from '@/Components/Footer.vue';
    
    </script>
    
    <style lang="sass" scoped>
    
    </style>