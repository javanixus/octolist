<template>
  <div id="teacherDash">
    <confirm-popup />
    <profile-popup />
    <report-popup />
    <div class="navbar">
      <div class="navbar__profile navbar__profile--profile-page">
        <span><router-link :to="{path: '/teacher/board'}">Octolist</router-link></span>
        <div class="navbar-searchbar">
          <!-- <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" type="text" name="" value="" class="navbar-searchbar input-nofill input-text fontSize-s borderRadius-m" placeholder="Search" /> <img src="images/search.svg" style="width: 20px; height: 20px; position: absolute;top: 12px;right: 12px;"
            alt="" /> -->
        </div>
        <div class="wrapper-profile right-menu">
          <div class="profile-badge">
            <a href="javascript:void(0)"></a>
            <div class="borderProfile">
              <div id="avatar-dp-id" class="avatar avatar--s avatar-dp" @click.prevent="$modal.show('profile-popup-modal')">
                <img class="avatar-img" alt="" />
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="navbarExtends">
        <ul>
          <li @click="currentView='teacher-main'" :class="{DashboardNavbarExtendsActive: currentView === 'teacher-main'}">Tugas</li>
          <li @click="currentView='teacher-project'" :class="{DashboardNavbarExtendsActive: currentView === 'teacher-project'}">Project</li>
        </ul>
      </div>
    </div>
    <div class="content">
        <component :is="currentView"></component>
    </div>
    </div>
</template>
<style scoped>
  .DashboardNavbarExtendsActive {
    color: #0f55eb!important;
  }
</style>
<script>
import axios from 'axios'
import router from './../../router'
import store from './../../store/index'
import dashboardTCMain from './dashboardTeacherMain'
import dashboardTCProject from './dashboardTeacherProject'
import profileMenuPopup from './events/profileMenuTeacher'
import ConfirmPopup from './../events/confirmPopup'
import reportPopup from './../events/reportBugsPopup'
  

export default {
  data(){
    return {
      currentView: 'teacher-main'
    }
  },
  components: {
    'teacher-main': dashboardTCMain,
    'teacher-project': dashboardTCProject,
    'profile-popup': profileMenuPopup,
    'confirm-popup': ConfirmPopup,
    'report-popup': reportPopup
  }  
}
</script>
