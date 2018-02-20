<template>
  <div id="adminDashboard">
      <div class="adminDashboard__Navbar">
        <div class="adminDashboardNavbarExtends">
          <ul>
            <li @click="currentView='admin-main'" :class="{adminDashboardNavbarExtendsActive: currentView === 'admin-main'}" >
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#E0E6ED" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
            </li>
            <li @click="currentView='admin-table-student'" :class="{adminDashboardNavbarExtendsActive: currentView === 'admin-table-student'}" >
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#E0E6ED" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
            </li>
            <li @click="currentView='admin-table-teacher'" :class="{adminDashboardNavbarExtendsActive: currentView === 'admin-table-teacher'}" >
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#E0E6ED" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6" y2="6"></line><line x1="6" y1="18" x2="6" y2="18"></line></svg>
            </li>            
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
  .adminDashboardNavbarExtendsActive svg{
      stroke: #0f55eb!important;
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