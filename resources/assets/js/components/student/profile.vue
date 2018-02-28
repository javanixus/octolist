<template lang="html">
	<div id="profile-siswa">
    <confirm-popup />
    <profile-popup />
    <report-popup />
    <editprofile-siswa-popup />
    <div class="navbar navbar--fixed">
      <div class="navbar__profile navbar__profile--profile-page">
        <span><router-link :to="{path: '/board'}">Octolist</router-link></span>
        <div class="navbar-searchbar">
          <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" type="text" name="" value="" class="navbar-searchbar input-nofill input-text fontSize-s borderRadius-m" placeholder="Search" /> <img src="images/search.svg" style="width: 20px; height: 20px; position: absolute;top: 12px;right: 12px;"
            alt="" />
        </div>
        <div class="wrapper-profile right-menu">
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
    <div class="profileContainer">
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
						<p style="color: rgb(111, 111, 111);text-align: center;font-size: 12px; margin-bottom: 12px;">{{this.dataUser.email}}</p>
					</div>
					<div class="profile-head__quotes">
						<q style="color: #6F6F6F;">{{this.dataUser.bio}}</q>
					</div>
          <div class="profile-head__buttonChange">
            <button @click.prevent="popupEditProfileSiswaClick()" :disabled="this.disabled" class="button buttonExtend button--l button--nofill borderRadius-s">Edit profile</button>
          </div>
				</div>
        <div class="wrapper-profile-content">
          <div class="wrapper-profile-content__header">
            <p>Badges</p>
            <p class="grey">Tampilkan semua</p>
          </div>
          <div class="wrapper-profile-content__badges">
            <p class="textAlignCenter">coming soon</p>
          </div>
        </div>
			</div>
		</header>
    <div class="profile-content">
      <component :is="currentView"></component>
    </div>
    </div>
	</div>
</template>

<script>
  import profileMenuPopup from './../events/profilemenuPopup.vue';
  import ConfirmPopup from './../events/confirmPopup';
  import reportPopup from './../events/reportBugsPopup';
  import editProfileSiswaPopup from './../events/editProfileSiswaPopup';
  import profileMain from './profileMain';
  import store from './../../store/index';
  import axios from 'axios';
  import router from './../../router';

  export default {
      beforeCreate(){
            if(store.state.isLogged){
              axios.get('http://localhost:8000/api/v1/student',{
                  headers: {
                      "Authorization": `Bearer ${window.localStorage.getItem('token')}`,
                  }
              })
              .then((response) => {
                  this.dataUser = response.data.profile
              })
            } else {
              router.push('/logout')
            }
        },
    data(){
      return {
        state: null,
        isOpened: false,
        disabled: false,
        currentView: 'profile-main',
        dataUser: []
      }
    },
    methods: {
      popupCreateProjectClickOpen(){
        this.$modal.show('create-project-modal');
      },
      popupEditProfileSiswaClick(){
        this.$modal.show('editprofile-siswa-popup-modal');
      }
    },
    components: {
      'profile-popup': profileMenuPopup,
      'confirm-popup': ConfirmPopup,
      'report-popup': reportPopup,
      'editprofile-siswa-popup': editProfileSiswaPopup,
      'profile-main': profileMain
    }
  }
</script>

<style lang="css">
.grey {
  color: #6f6f6f;
}

.profile-head__title h4{
	text-align: center!important;
}

.profile-head__quotes {
  text-align: center;
}

.alignCenter {
  text-align: center;
}
.profile-head__buttonChange {
  width: inherit;
  padding: 20px 0 0 0;
  text-align: center;
}

.buttonExtend {
  width: 100%;
  text-align: center;
}

.navbar__profile {
  border: none!important;
  box-shadow: 0 3px 10px 0 rgba(0,0,0,.03);
}

</style>
