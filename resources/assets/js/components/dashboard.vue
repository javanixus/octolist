<template lang="html">
  <div id="dashboard-core">
    <detectNetworkBar @detected-condition="detected">
      <div slot="online"></div>
      <div slot="offline">
        <div class="loading high-noon">
          <p>Trying to connect to the serve.</p>
        </div>
      </div>
    </detectNetworkBar>
    <create-project />
    <confirm-popup />
    <profile-popup />
    <div class="navbar">
      <div class="navbar__profile navbar__profile--profile-page">
        <a href="javascript:void(0)"><span>Octolist</span></a>
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
            <div class="border-gradient">
              <div id="avatar-dp-id" class="avatar avatar--s avatar-dp" @click.prevent="$modal.show('profile-popup-modal')">
                <img class="avatar-img" src="images/avatar0.jpg" alt="" />
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="navbar-extended">
        <div class="navbar-extended__item marginMagic">
          <a href="#" style="color: #0f55eb;" class="marginRight-s">Feed</a>
        </div>
      </div> -->
    </div>
    <div class="content">
      <div class="content__header">
        <div class="header-menu">
          <div class="header-menu__right paddingRight-xxl">
            <div id="add-task" style="max-width: 300px;" @click="popupCreateProjectClickOpen()" class="button button-landing fontSize-s button--xl borderRadius-s button--melting-blue green-bg button-green">
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
              <dashboard-app ids="projectIds">
                <div v-for="projectItem in projectItems">
                  <!-- items will be here -->
                  <!-- on dashboard-app :pb="board" -->
                </div>
              </dashboard-app>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</template>

<script>
  import dashboardBoard from './partials/dashboardBoard.vue';
  import createProjectPopup from './events/createProject.vue';
  import profileMenuPopup from './events/profilemenuPopup.vue';
  import ConfirmPopup from './events/confirmPopup';

  export default {
    data(){
      return {
        projectIds: [],
        projectItems: [],
        resizable: false,
        adaptive: false,
        draggable: false,
        canBeShown: false,
        state: null,
        isOpened: false,
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
