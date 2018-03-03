<template lang="html">
	<div class="board">
	<div class="navbar">
      <div class="navbar__profile navbar__profile--profile-page">
      <span style="margin: 0 auto!important;"><router-link :to="{path: '/board'}"><img style="margin-left: 15px;" class="octolist-logo" src="/images/octolist.svg"></router-link></span>
        <div class="wrapper-profile right-menu">
          <div class="profile-badge">
            <a href="javascript:void(0)"></a>
            <div class="borderProfile">
              <div id="avatar-dp-id" class="avatar avatar--s avatar-dp" @click.prevent="$modal.show('profile-popup-modal')">
                <img class="avatar-img" alt="" />
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="navbarExtendsProject">
        <div class="navbarExtendsProjectCore">
          <h4>Octolist Alpha</h4>
          <div class="navbarExtendProject_member">
          <!-- awal add member dynamic -->
          <span class="addMember">
            <img src="http://localhost:8000/images/member-add.svg" alt="add_member" title="add member">
          </span>
          <member-project v-for="member in members" :who="member" :key="project.id_projects"></member-project>
          </div>
        </div>
      </div>
      <div class="navbarExtends">
        <ul>
          <li @click="currentView='board-storage'" :class="{DashboardNavbarExtendsActive: currentView === 'board-storage'}">Project</li>
          <li @click="currentView='board-deck'" :class="{DashboardNavbarExtendsActive: currentView === 'board-deck'}">Decks</li>
          <li @click="currentView='board-team'" :class="{DashboardNavbarExtendsActive: currentView === 'board-team'}">Team</li>
        </ul>
      </div>
    </div>
	<div class="content">
		<component :is="currentView"></component>
	</div>
	</div>
</template>

<style scoped>
  .DashboardNavbarExtendsActive {
    color: #0f55eb!important;
  }
</style>

<script>
import axios from 'axios'
import store from './../../store/index'
import router from './../../router'
import boardDeck from './boardDeck'
import boardStorage from './boardStorage'
import boardTeam from './boardTeam'
import boardMember from './memberProjectApp'

export default {
    data(){
    return {
      currentView: 'board-storage',
      dataUser: [],
      projectInfo: []
    }
  },
  beforeCreate(){
    axios.get('http://localhost:8000/api/v1/project/'+ this.$route.params.projectId +'/cards',{
      headers: {
        "Authorization": `Bearer ${window.localStorage.getItem('token')}`
      }
    }).then((response) =>{
      console.log(response)
    }).catch((error) =>{
      console.log(error.response.data)
      if(error.response.status == 500){
        router.push('/404')
      }
    })
  },
  components:{
	  'board-storage': boardStorage,
	  'board-deck': boardDeck,
	  'board-team': boardTeam,
    'member-project': boardMember
  }
}
</script>
