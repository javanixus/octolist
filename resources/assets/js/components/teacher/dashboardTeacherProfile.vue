<template>
  <div class="teacherProfileWrapper">
    <teacher-editprofile />
    <div class="teacherProfileLay">
      <div class="teacherProfileCover">
        <div class="filter-dark"></div>
        <div class="teacherProfileCoverItems">
          <div class="teacherProfileCoverCore">
            <div class="teacherProfileDp avatar--glow">
              <img src="/images/love.jpg" alt="">
            </div>
            <div class="teacherProfileDesc">
              <h4>Fahmi irsyad khairi</h4>
              <button @click="clickTeacherEditProfile" class="ghost--button alignCenter">Edit profile</button>
            </div>
          </div>
            <progressive-background :blur="30" placeholder="/images/cover.jpg" src="/images/cover.jpg" alt="" />
        </div>
      </div>
    </div>
  </div>
</template>
<style scoped>
  .ghost--button{
    border: 2px solid #5fd063!important;
    background: #5fd063!important;
  }
</style>
<script>
import teacherEditProfile from './../events/editProfileTeacher'

export default {
  data(){
    return {

    }
  },
  components: {
    'teacher-editprofile': teacherEditProfile
  },
  methods: {
          clickTeacherEditProfile(){
          this.$modal.show('editprofile-teacher-popup-modal');
      }
  }
}
</script>
