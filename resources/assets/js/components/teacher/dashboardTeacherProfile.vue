<template>
  <div class="teacherProfileWrapper">
    <teacher-editprofile />
    <div class="teacherProfileLay">
      <div class="teacherProfileCover">
        <div class="filter-dark"></div>
        <div class="teacherProfileCoverItems">
          <div class="teacherProfileCoverCore">
            <div class="teacherProfileDp avatar--glow">
              <img v-lazy="imgObj">
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
  data() {
    return {
      imgObj: {
        preLoad: 1.3,
        src:'/images/love.jpg',
        error: 'https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/0.16.1/images/loader-large.gif',
        loading: 'https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/0.16.1/images/loader-large.gif'
      },
      imgUrl: 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/fancybox_loading.gif'
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
