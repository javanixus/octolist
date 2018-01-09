<template>
  <div>
    <teacher-profile-popup />
      <header>
          <div id="headerTeacher" class="headerTeacherWrapper">
            <div class="headerTeacherNav">
                <div class="headerTeacherNav__Title">
                    <h3>Teacher Dashboard</h3>
                </div>
                <div class="headerTeacherNav__Items">
                    <div @click="clickTeacherProfile" class="avatar avatar--s admin-avatars">
                        <img class="avatar-img" src="/images/love.jpg"
                        alt="" />
                    </div>
                </div>
            </div>
            <div class="headerTeacherExtend">
                <ul>
                    <li @click="currentView='teacher-main'" :class="{headerTeacherExtendActive: currentView === 'teacher-main'}" >Project watch</li>
                    <li @click="currentView='teacher-profile'" :class="{headerTeacherExtendActive: currentView === 'teacher-profile'}" >Profile edit</li>
                </ul>
            </div>
          </div>
      </header>
      <main>
        <component :is="currentView"></component>
      </main>
  </div>
</template>
<style>

</style>
<script>
import axios from 'axios'
import router from './../../router'
import store from './../../store/index'
import teacherDashboardMain from './dashboardTeacherMain'
import teacherDashboardProfile from './dashboardTeacherProfile'
import teacherProfilePopup from './../events/profileteachermenuPopup'

export default {
  data() {
      return {
          currentView: 'teacher-main'
      }
  },
  components: {
      'teacher-main' : teacherDashboardMain,
      'teacher-profile' : teacherDashboardProfile,
      'teacher-profile-popup': teacherProfilePopup
  },
  methods: {
      clickTeacherProfile() {
        this.$modal.show('teacher-profile-popup');  
      }
  }
}
</script>
