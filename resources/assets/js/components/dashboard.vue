<template lang="html">
  <div id="dashboard-core">
    <getstarted-popup />
    <!-- <create-project /> -->
    <precreate-project />
    <confirm-popup />
    <profile-popup />
    <report-popup />
    <div class="navbar">
      <div class="navbar__profile navbar__profile--profile-page">
        <span><router-link :to="{path: '/board'}">Octolist</router-link></span>
        <div class="navbar-searchbar">
          <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" type="text" name="" value="" class="navbar-searchbar input-nofill input-text fontSize-s borderRadius-m" placeholder="Search" /> <img src="images/search.svg" style="width: 20px; height: 20px; position: absolute;top: 12px;right: 12px;"
            alt="" />
        </div>
        <div class="wrapper-profile right-menu">
          <div id="message" class="icon-bell marginTop-xs marginRight-s">

          </div>
          <div id="bell" class="icon-message marginTop-xs marginRight-s">

          </div>
          <div class="profile-badge">
            <a href="javascript:void(0)"></a>
            <div class="borderProfile">
              <div id="avatar-dp-id" class="avatar avatar--s avatar-dp" @click.prevent="$modal.show('profile-popup-modal')">
                <img class="avatar-img" :src="dataUser.avatar" alt="" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="content__header">
        <div class="header-menu">
          <div class="header-menu__right paddingRight-xxl">
            <div id="add-task" style="max-width: 300px;" @click="popupCreateProjectClickOpen()" class="button button-landing fontSize-s button--xl borderRadius-s button--melting-blue">
              Buat Project Baru
            </div>
          </div>
        </div>
      </div>
      <div class="content__items">
        <div class="project">
          <div class="project__header marginTop-m">
            <span>4 Projects Showed</span>
          </div>
          <div class="project__content">
            <div class="project">
              <!-- awal item dynamic -->
                <project-app v-for="project in projects" :prog="project" key="projectapp"></project-app>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</template>

<script>
  import axios from 'axios';
  import router from './../router';
  import store from './../store/index';
  import preCreateProject from './events/project/preCreateProject';
  import profileMenuPopup from './events/profilemenuPopup.vue';
  import ConfirmPopup from './events/confirmPopup';
  import reportPopup from './events/reportBugsPopup';
  import getStarted from './events/getStartedPopup';
  import ProjectComponent from './../components/project/projectApp';

  export default {
    beforeCreate(){
      if (store.state.isLogged == false){
        router.push('/')
      }
    },
    mounted() {
      axios.get('http://localhost:8000/api/v1/student',{
        headers: {
          "Authorization": `Bearer ${window.localStorage.getItem('token')}`
        }
      }).then((response) => {
        this.dataUser = response.data.profile;
        console.log(this.dataUser);
        if(response.data.profile.role == 1){
          router.push('/logout')
        }
        this.$modal.show('getstarted-siswa-popup-modal');
      }).catch((error) =>{
        console.log(error.response.data)
      })
    },
    data(){
      return {
        resizable: false,
        adaptive: false,
        draggable: false,
        canBeShown: false,
        // state: null,
        isOpened: false,
        projects: [],
        dataUser: [],
      }
    },
    methods: {
      show(resizable, adaptive, draggable) {
        this.resizable = resizable
        this.adaptive = adaptive
        this.draggable = draggable
        /*
          $nextTick is required because the data model with new
          "resizable, adaptive, draggable" values is not updated yet.. eh
        */
        this.$nextTick(() => {
          this.$modal.show('create-project-modal');
          this.$modal.show('profile-popup-modal');
          this.$modal.show('report-popup-modal');
          this.$modal.show('getstarted-siswa-popup-modal');
        })
      },
      popupCreateProjectClickOpen(){
        this.$modal.show('pre-project-modal');
      },
      createProject(){
        this.$modal.show('pre-project--setup-modal');
      }
    },
    components: {
      'precreate-project': preCreateProject,
      'profile-popup': profileMenuPopup,
      'confirm-popup': ConfirmPopup,
      'report-popup': reportPopup,
      'getstarted-popup': getStarted,
      'project-app': ProjectComponent
    }
  }
</script>

<style lang="css" scoped>
  .navbar {
    box-shadow: 0 3px 10px 0 rgba(0,0,0,.03);
  }
  .navbar__profile{
    border: none;
  }
</style>
