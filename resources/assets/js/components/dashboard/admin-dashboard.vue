<template>
  <div>
    <div class="sideNavbar">
      <div class="sideNavbar__items">
        <ul>
          <li>A</li>
          <li>B</li>
          <li>C</li>
          <li>D</li>
        </ul>
      </div>
    </div>
    <div class="contentDash" id="dashId">
      <component :is="currentView"></component>
    </div>
  </div>
</template>

<style>
  
</style>

<script>
  import axios from 'axios'
  import router from './../../router'
  import store from './../../store/index'

  import adminMainPage from './admin-dashboard.Main.vue'
  
  export default {
    data() {
      return {
        currentView: 'admin-main'
      }
    },
    components: {
      'admin-main' : adminMainPage
    },
  }
</script>
