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
    <div class="navbar">
      <div class="navbar__profile navbar__profile--profile-page">
        <a href="javascript:void(0)"><span>Octolist</span></a>
        <div class="navbar-searchbar">
          <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" type="text" name="" value="" class="navbar-searchbar input-nofill input-text fontSize-s borderRadius-m" placeholder="Search" /> <img src="images/search.svg" style="width: 20px; height: 20px; position: absolute;top: 12px;right: 12px;"
            alt="" />
        </div>
        <div class="wrapper-profile right-menu">
          <div id="message" class="icon-bell marginTop-xs marginRight-s"></div>
          <div id="bell" class="icon-message marginTop-xs marginRight-s"></div>
          <div class="profile-badge">
            <a href="javascript:void(0)"></a>
            <div class="border-gradient">
              <div id="avatar-dp-id" class="avatar avatar--s avatar-dp">
                <img class="avatar-img" src="images/avatar0.jpg" alt="" />
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="profile-popup-show" class="component-profile margin-l">
        <div class="profile-popup borderRadius-s">
          <div class="profile-popup__cover">
            <div class="overlay-dark" style="display: block;">
            </div><img src="images/avatar0.jpg" alt="" />
            <div class="profile-popup__cover-title">
              <p class="fontWeight-6" style="color:white!important;">
                Fahmi Irsyad Khairi
              </p>
            </div>
          </div>
          <div class="profile-popup__content padding-m">
            <div class="profile-popup__content__items">
              <ul>
                <li>
                  <a href="profile.html" class="fontWeight-6">Profile</a>
                </li>
                <li>
                  <a href="javascript:void(0)" class="fontWeight-6">Settings</a>
                </li>
                <li>
                  <a href="javascript:void(0)" class="fontWeight-6">Task</a>
                </li>
                <li>
                  <a href="javascript:void(0)" class="fontWeight-6">Logout</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="notification-popup-show" class="component-notification margin-l">
        <div class="notification-popup borderRadius-s">
          <div class="notification-popup__header padding-m">
            <p style="font-family: Open Sans; color: #5d5b5b; margin: 0;" class="fontWeight-6">
              Notification
            </p>
          </div>
          <div class="notification-popup__content">
            <div class="notification-popup__items notification-popup__items--unread padding-xs paddingLeft-m">
              <div class="avatar avatar--m avatar--glow">
                <img class="avatar-img" src="images/love.jpg" alt="" />
              </div>
              <div class="notification-popup-desc marginLeft-s">
                <span class="fontSize-s"><span class=
                  "fontWeight-6">Cyntia pratita</span> mengomentari "i like all these pictures, the overall mood is perfect."
                <span style="color: #5d5b5b" class="fontSize-xs">&nbsp; - 4 jam yang lalu</span></span>
              </div>
            </div>
            <div class="notification-popup__items padding-xs paddingLeft-m">
              <div class="avatar avatar--m avatar--glow">
                <img class="avatar-img" src="images/avatar0.jpg" alt="" />
              </div>
              <div class="notification-popup-desc marginLeft-s">
                <span class="fontSize-s"><span class=
                  "fontWeight-6">Pampam</span> menambahkan jadwal pada card <span class="fontWeight-6">UI
                  Concept</span><span style="color: #5d5b5b" class="fontSize-xs">&nbsp; - 2 menit yang
                  lalu</span></span>
              </div>
            </div>
            <div class="notification-popup__items padding-xs paddingLeft-m">
              <div class="avatar avatar--m avatar--glow">
                <img class="avatar-img" src="images/kecil6.jpg" alt="" />
              </div>
              <div class="notification-popup-desc marginLeft-s">
                <span class="fontSize-s"><span class=
                  "fontWeight-6">Klarak Luis D</span> menyelesaikan card <span class="fontWeight-6">Database
                  Relation</span>.<span style="color: #5d5b5b" class="fontSize-xs">&nbsp; - 15 menit yang
                  lalu</span></span>
              </div>
            </div>
            <div class="notification-popup-button padding-xs textAlignCenter">
              <a href="javascript:void(0)"><span class=
                "fontSize-s fontWeight-6" style=
                "font-family: Open Sans;color: #5d5b5b;">Lihat
                semua</span></a>
            </div>
          </div>
        </div>
      </div>
      <div id="message-popup-show" class="component-notification margin-l">
        <div class="message-popup borderRadius-s">
          <div class="notification-popup__header padding-m">
            <p style="font-family: Open Sans; color: #5d5b5b; margin: 0;" class="fontWeight-6">
              Pesan Masuk
            </p>
          </div>
          <div class="notification-popup__content">
            <div class="notification-popup__items padding-xs paddingLeft-m">
              <div class="avatar avatar--m avatar--glow">
                <img class="avatar-img" src="images/love.jpg" alt="" />
              </div>
              <div class="notification-popup-desc marginLeft-s">
                <span class="fontSize-s"><span class=
                  "fontWeight-6">Cyntia pratita</span></span>
                <p class="fontSize-s">
                  <span style="color: #5d5b5b" class="fontSize-xs">eh
                    , yang ini di revisi yak :) . ada perubahan hehe ,
                    lagi males w.</span>
                </p>
              </div>
            </div>
            <div class="notification-popup__items notification-popup__items--unread padding-xs paddingLeft-m">
              <div class="avatar avatar--m avatar--glow">
                <img class="avatar-img" src="images/5.jpg" alt="" />
              </div>
              <div class="notification-popup-desc marginLeft-s">
                <span class="fontSize-s"><span class=
                  "fontWeight-6">Steve G</span></span>
                <p class="fontSize-s">
                  <span style="color: #5d5b5b" class="fontSize-xs">i've uploaded new concept on project,
                    pls review it and tell me if u found an issu
                    ...</span>
                </p>
              </div>
            </div>
            <div class="notification-popup-button padding-xs textAlignCenter">
              <a href="javascript:void(0)"><span class=
                "fontSize-s fontWeight-6" style=
                "font-family: Open Sans;color: #5d5b5b;">Lihat
                semua</span></a>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-extended">
        <div class="navbar-extended__item marginMagic">
          <a href="#" style="color: #0f55eb;" class="marginRight-s">Feed</a> <a href="#" class="marginRight-s">Activity</a> <a href="#" class="marginRight-s">Contribution</a>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="content__header">
        <div class="header-menu">
          <div class="header-menu__right paddingRight-xxl">
            <div id="add-task" style="max-width: 300px;" @click="$modal.show('create-project-modal')" class="button button-landing fontSize-s button--xl borderRadius-s button--melting-blue green-bg button-green">
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
        })
      },
      detected(e) {
        this.state = e;
      },
    },
    components: {
      'dashboard-app': dashboardBoard,
      'create-project': createProjectPopup,
    }
  }
</script>

<style lang="css" scoped>
  
</style>
