<template>
  <div id="adminDashboard">
      <div class="adminDashboard__Navbar">
        <div class="adminDashboardNavbarExtends">
          <ul>
            <li @click="currentView='admin-main'" :class="{adminDashboardNavbarExtendsActive: currentView === 'admin-main'}" >Home</li>
            <li @click="currentView='admin-table-student'" :class="{adminDashboardNavbarExtendsActive: currentView === 'admin-table-student'}" >Siswa</li>
            <li @click="currentView='admin-table-teacher'" :class="{adminDashboardNavbarExtendsActive: currentView === 'admin-table-teacher'}" >Guru</li>            
          </ul>
        </div>
      </div>
      <div class="adminDashboard__Main">
        <component :is="currentView"></component>
      </div>
  </div>
</template>
<style scoped>
  #adminDashboard {
    min-height: 100vh;
    background-color: #F5F5F5!important;
  }
</style>
<script>
  import axios from 'axios'
  import router from './../../router'
  import store from './../../store/index'
  import adminDashboardMain from './adminDashboardMain'
  import adminDashboardTableSt from './adminDashboardTableStudent'
  import adminDashboardTableTc from './adminDashboardTableTeacher'
  export default {
    data(){
      return {
        currentView: 'admin-main'
      }
    },
    components: {
      'admin-main': adminDashboardMain,
      'admin-table-student': adminDashboardTableSt,
      'admin-table-teacher': adminDashboardTableTc
    }
  }
</script>