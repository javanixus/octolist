<template lang="html">
	<div id="profile-siswa">
    <create-project />
    <confirm-popup />
    <profile-popup />
    <report-popup />
    <editprofile-siswa-popup />
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
                <img class="avatar-img" :src="dataUser.avatar" alt="" />
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
							<img alt="" class="avatar-img" :src="dataUser.avatar">
						</div>
					</div>
					<div class="profile-head__title">
						<h4 class="fontSize-l">{{this.dataUser.name}}</h4>
					</div>
					<div class="profile-head__quotes">
						<q style="color: #6F6F6F;">{{this.dataUser.bio}}</q>
					</div>
          <div class="profile-head__buttonChange">
            <button @click.prevent="popupEditProfileSiswaClick()" :disabled="this.disabled" class="ghost--button alignCenter">Edit profile</button>
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
  import editProfileSiswaPopup from './events/editProfileSiswaPopup';
  import store from './../store/index';
  import axios from 'axios';
  import router from './../router';

  export default {
    beforeCreate(){
      if(store.state.isLogged === false){
        router.push('/logout')
      }
    },
        mounted(){
            const key_id = window.localStorage.getItem('key');
            // decrypt phase //
            const becrypt_slice_one = key_id.slice(7);
            const becrypt_zero = becrypt_slice_one / 100101010;
            const becrypt_pharse = becrypt_zero / 8084334125;
            // end decrypt //
            axios.get('http://localhost:8000/api/v1/user/', {
                headers: {
                    "Authorization": `Bearer ${window.localStorage.getItem('token')}`,
                }
            })
            .then((response) => {
                this.dataUser = response.data.profile
                // console.log(response);
            })
        },
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
        disabled: false,
        dataUser: []
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
      },
      popupEditProfileSiswaClick(){
        this.$modal.show('editprofile-siswa-popup-modal');
      }
    },
    components: {
      'dashboard-app': dashboardBoard,
      'create-project': createProjectPopup,
      'profile-popup': profileMenuPopup,
      'confirm-popup': ConfirmPopup,
      'report-popup': reportPopup,
      'editprofile-siswa-popup': editProfileSiswaPopup,
    }
  }
</script>

<style lang="css">
.profile-head__title h4{
	text-align: center!important;
}
.alignCenter {
  text-align: center;
}
.profile-head__buttonChange {
  width: inherit;
  padding: 20px 0 0 0;
  text-align: center;
}
.ghost--button {
  cursor: pointer;
  outline: none;
  border: 2px solid #8492A6;
  background: #8492a6;
  color: white;
  padding: 8px;
  border-radius: 3px;
  max-width: 150px;
  transition: ease-in-out .2s;
}
.ghost--button:hover {
  background: rgb(110, 123, 139);
  transition: ease-in-out .3s;
}
</style>
