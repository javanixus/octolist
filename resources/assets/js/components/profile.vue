<template lang="html">
	<div>
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
    <report-popup />
    <div class="navbar navbar--fixed">
      <div class="navbar__profile navbar__profile--profile-page">
        <span><router-link :to="{path: '/dashboard'}">Octolist</router-link></span>
        <div class="navbar-searchbar">
          <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" type="text" name="" value="" class="navbar-searchbar input-nofill input-text fontSize-s borderRadius-m" placeholder="Search" /> <img src="images/search.svg" style="width: 20px; height: 20px; position: absolute;top: 12px;right: 12px;"
            alt="" />
        </div>
        <div class="wrapper-profile right-menu">
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
    </div>
 		<header>
			<div class="wrapper-profile-head">
				<div class="profile-head marginMagic">
					<div class="profile-head__avatar marginBottom-s">
						<div class="avatar avatar--xl avatar--glow marginMagic">
							<img alt="" class="avatar-img" src="/images/avatar0.jpg">
						</div>
					</div>
					<div class="profile-head__title">
						<h4 class="fontSize-l">{{this.profile.name}}</h4>
					</div>
					<div class="profile-head__quotes">
						<q style="color: #6F6F6F;">{{this.profile.quote}}</q>
					</div>
				</div>
				<div class="wrapper-profile-menu paddingBottom-l">
					<ul class="profile-menu marginMagic">
						<li class="profile-menu__items">
							<a href="#">Feed</a>
						</li>
						<li class="profile-menu__items">
							<a href="#">Activity</a>
						</li>
						<li class="profile-menu__items">
							<a href="#">Contribution</a>
						</li>
					</ul>
				</div>
			</div>
		</header>
	</div>
</template>

<script>
  import dashboardBoard from './partials/dashboardBoard.vue';
  import createProjectPopup from './events/createProject.vue';
  import profileMenuPopup from './events/profilemenuPopup.vue';
  import ConfirmPopup from './events/confirmPopup';
  import reportPopup from './events/reportBugsPopup';

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
		profile: {
			name:'Fahmi Irsyad K',
			quote:'semua bisa diraih kalau punya niat dan semangat'
		}
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
    }
  }
</script>

<style lang="css">
.profile-head__title h4{
	text-align: center!important;
}
</style>
