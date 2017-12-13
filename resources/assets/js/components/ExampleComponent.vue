<template>
    <div class="container">
        <div>
            <transition name="fade">
                <router-view></router-view>
                <h1>Halo saya Laravel Vue</h1>
            </transition>
        </div>
    </div>
</template>
<style>
    .fade-enter-active, .fade-leave-active {
      transition: opacity .5s
    }
    .fade-enter, .fade-leave-active {
      opacity: 0
    }
</style>
<script>
    export default{
    }
</script>