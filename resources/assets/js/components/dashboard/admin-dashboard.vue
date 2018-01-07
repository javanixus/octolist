<template>
  <div class="wrapper-admin-dashboard">
    <confirm-popup />
    <header class="admin-header">
      <nav class="admin-navigation">
        <div class="admin__content">
          <div class="admin-nav--items">
            <div class="admin-logo">
              <h3>Nightly Dashboard</h3>
            </div>
          </div>
          <div class="admin-nav-core">
            <div class="admin-nav--core__content">
              <label for="input-admin-nav">
                <input name="" id="input-admin-nav" placeholder="Cari disini" class="input--dark-style--small">
              </label>
              <div class="admin-nav__right-menu">
                <div class="avatar avatar--xs avatar--glow admin-avatars">
                  <img class="avatar-img" src="https://scontent.fcgk6-1.fna.fbcdn.net/v/t1.0-9/23658386_1949711395271100_1681747836898146234_n.jpg?_nc_eui2=v1%3AAeH4QazrweED9rDykBeNPDiZWGMawWVQDknVNEM4mz_0t1KcGdlZa3JDGch29SgSc1EgUgFhCrd2fer_a32axNViZOZLcPxI1xWGJ4IXTBpvag&oh=c911e3bbad0ce6a0098b16cc4eb47c0f&oe=5AA862BA"
                    alt="" />
                  <detectNetwork @detected-condition="detected">
                    <div slot="online">
                      <div class="online-badge"></div>
                    </div>
                    <div slot="offline">
                      <div class="offline-badge"></div>
                    </div>
                  </detectNetwork>
                </div>
                <span>Fahmi irsyad khairi</span>
                <div class="logoutSvg" @click="$modal.show('confirm-modal')">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="#ec008c" viewBox="0 0 24 24">
                    <path d="M14 12h-4v-12h4v12zm4.213-10.246l-1.213 1.599c2.984 1.732 5 4.955 5 8.647 0 5.514-4.486 10-10 10s-10-4.486-10-10c0-3.692 2.016-6.915 5-8.647l-1.213-1.599c-3.465 2.103-5.787 5.897-5.787 10.246 0 6.627 5.373 12 12 12s12-5.373 12-12c0-4.349-2.322-8.143-5.787-10.246z"
                    />
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </header>
    <content>
      <aside>
        <div class="admin-aside-menu">
          <div class="admin-aside-menu__content">
            <div class="admin-aside-menu--items is-collapse">
              <div class="admin-aside-menu--items__header is--selected-admin">
                <h4>Main Boards</h4>
              </div>
              <div class="admin-aside-menu--items__content">
                <ul>
                  <li>
                    <a href="javascript:void(0)" @click="currentView='admin-main'" :class="{activeAdminMenuItems: currentView === 'admin-main'}">
                      <p>Main boards</p>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0)" @click="currentView='admin-tracking'" :class="{activeAdminMenuItems: currentView === 'admin-tracking'}">
                      <p>General students setting</p>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0)" @click="$modal.show('error-modal')">
                      <p>Project tracking</p>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0)" @click="$modal.show('create-project-modal')">
                      <p>Create Project</p>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="admin-aside-menu--items">
              <div class="admin-aside-menu--items__header is--selected-admin">
                <a href="">Inbox</a>
              </div>
            </div>
            <div class="admin-aside-menu--items">
              <div class="admin-aside-menu--items__header" :class="{activeAdminMenu: currentView === 'admin-profile'}">
                <a href="javascript:void(0)" @click="currentView='admin-profile'">Profile settings</a>
              </div>
            </div>
          </div>
        </div>
      </aside>
      <div id="admin-content-core">
        <div class="admin-content__wrap">
          <div class="admin-bar-alert-wrapper">
            <detectNetworkBar @detected-condition="detected">
              <div slot="online">

              </div>
              <div slot="offline">
                <div class="loading high-noon">
                  <p>Trying to connect to the serve.</p>
                </div>
              </div>
            </detectNetworkBar>
            <div class="admin-notify-bar is-admin-notify-bar--default">
              <p>This is
                <b>Public Beta Release of Nightly Dashboard</b>. Report to me if you found error</p>
            </div>
          </div>
          <component :is="currentView" style="padding-top: 65px;"></component>
        </div>
      </div>
    </content>
  </div>
</template>
<style>


</style>
<script>
  // import component
  import axios from 'axios'
  import router from './../../router';
  import store from './../../store/index'
  import AdminMain from "./admin-dashboard.Main"
  import AdminTracking from "./admin-dashboard.tracking"
  import CreateProjectPopup from "../events/createProject"
  import ConfirmPopup from "../events/confirmPopup"
  const AdminProfile = r => require.ensure([], () => r(require('./admin-dashboard.Profile')),
    'big-pages')

  export default {
    components: {
      'admin-main': AdminMain,
      'admin-tracking': AdminTracking,
      'admin-profile': AdminProfile,
      'create-project': CreateProjectPopup,
      'confirm-popup': ConfirmPopup,
    },
    data() {
      return {
        currentView: 'admin-main',
        resizable: false,
        adaptive: false,
        draggable: false,
        canBeShown: false,
        state: null,
        token: localStorage.getItem('token'),
      }
    },
    beforeCreate(){
      if (store.state.isLogged === false){
        router.push('/login')
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
          this.$modal.show('example-modal');
        })
      },
      detected(e) {
        this.state = e;
      },
    },
  }

</script>
