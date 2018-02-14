<template lang="html">
  <div id="dashboard-core">
    <!-- <detectNetwork @detected-condition="detected">
      <div slot="online"></div>
      <div slot="offline">
        <div class="loading high-noon">
          <p>Trying to connect to the serve.</p>
        </div>
      </div>
    </detectNetwork> -->
    <create-project />
    <confirm-popup />
    <profile-popup />
    <report-popup />
    <getstarted-popup />
    <div class="navbar">
      <div class="navbar__profile navbar__profile--profile-page">
        <span><router-link :to="{path: '/dashboard'}">Octolist</router-link></span>
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
              <!-- awal item static -->
                <div class="project-item">
                  <div class="project-item__header">
                    <span class="overlay-dark">
                      <a href="javascript:void(0)">
                        <img class="icon" src="images/edit.svg" alt="" />
                      </a>
                    </span>
                    <img src="images/dragon-girl.png" alt="" />
                  </div>
                  <div class="project-item__content">
                    <h5>
                      Typography Culture
                    </h5>
                    <div class="content-red">
                      <div class="content-desc">
                        <div class="content-people">
                          <img src="images/kecil1.png" alt="" />
                          <img src="images/kecil6.jpg" alt="" />
                          <img src="images/kecil5.jpg" alt="" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="project-item__footer">
                    <div class="project-item__footer-items">
                         <router-link :to="'/dashboard/board'"><span>Open project</span></router-link>
                    </div>
                  </div>
              </div>
              <!-- <dashboard-app ids="projectIds" v-for="project in projects" :pj="project" :key="project.id"></dashboard-app> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</template>

<script>
  import axios from 'axios'
  import router from './../router'
  import store from './../store/index'
  import dashboardBoard from './partials/dashboardBoard.vue';
  import createProjectPopup from './events/createProject.vue';
  import profileMenuPopup from './events/profilemenuPopup.vue';
  import ConfirmPopup from './events/confirmPopup';
  import reportPopup from './events/reportBugsPopup';
  import getStarted from './events/getStartedPopup';

  export default {
    beforeCreate(){
      if(store.state.keyBypass === false){
        router.push('/logout')
      }
    },
    beforeCreate(){
      if (store.state.isLogged){
          axios.get('http://localhost:8000/api/v1/user', {
                headers: {
                    "Authorization": `Bearer ${window.localStorage.getItem('token')}`,
                }
            })
            .then((response) => {
                this.dataUser = response.data.profile;;
                console.log(response);
                this.$modal.show('getstarted-siswa-popup-modal');
          })
      } else {
        router.push('/logout')
      }
    },
    data(){
      return {
        resizable: false,
        adaptive: false,
        draggable: false,
        canBeShown: false,
        state: null,
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
      detected(e) {
        this.state = e;
      },
      popupCreateProjectClickOpen(){
        this.$modal.show('create-project-modal');
      }
    },
    components: {
      'dashboard-app': dashboardBoard,
      'create-project': createProjectPopup,
      'profile-popup': profileMenuPopup,
      'confirm-popup': ConfirmPopup,
      'report-popup': reportPopup,
      'getstarted-popup': getStarted,
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
