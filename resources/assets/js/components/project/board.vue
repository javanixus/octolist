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
                <img class="avatar-img" alt="" :src="dataUser.avatar"/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="navbarExtendsProject">
        <div class="navbarExtendsProjectCore">
          <h4>{{projectInfo.project_title}}</h4>
          <div class="navbarExtendProject_member">
          <!-- awal add member dynamic -->
          <div v-if="addMemberEvent" class="addMember__panel">
            <!-- <input @keyup.esc="addMemberClickCancel" @keyup.enter="addMemberClickDone" v-validate="'required'" type="text" placeholder="masukkan id teman..." @focus="$event.target.select()" :class="{'input-nofill': true, 'input--danger': errors.has('addMember') }" class="input-text fontSize-xs" name="addMember" v-model="id_students">
             <span style="font-size: 12px; color: red;" v-if="errors.has('addMember')">
                isi terlebih dahulu
              </span> -->
              <v-select :on-search="getOptions" :options="dataSearch" label="name" @input="catchInput">
              <template slot="selected-option" slot-scope="option">
                <div class="selected">
                  <img class="selected-img" :src="'http://localhost:8000/avatar/'+avatarStudent"/> 
                  <p style="margin-left: 8px; font-weight: 600;">{{ dataNameStudent }}</p>
                </div>
              </template>
              </v-select>
              <button @click.prevent="addMemberClickDone">send</button>
          </div>
          <div v-if="!addMemberEvent" class="addMember__panel">
            <span class="addMember">
              <img @click="addMemberClick" src="http://localhost:8000/images/member-add.svg" alt="add_member" title="add member">
                <member-project v-for="member in members" :who="member" :key="members.id" @memberDeleted="onMemberDelete($event)"></member-project>
            </span>
          </div>
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
  .selected-img {
    height: 25px;
    width: 25px;
    border-radius: 50%;
  }
  .selected {
    display: -webkit-box!important;
  }
</style>

<script>
import axios from 'axios'
import vSelect from 'vue-select'
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
      members: [],
      dataUser: [],
      id_students: '',
      projectInfo: [],
      dataNameStudent: '',
      avatarStudent: '',
      dataSearch: [],
      addMemberEvent: false,
    }
  },
  beforeCreate(){
    axios.get('http://localhost:8000/api/v1/project/'+ this.$route.params.projectId,{
      headers: {
        "Authorization": `Bearer ${window.localStorage.getItem('token')}`
      }
    }).then((response) =>{
      this.projectInfo = response.data.projects
      axios.get('http://localhost:8000/api/v1/student',{
        headers: {
          "Authorization": `Bearer ${window.localStorage.getItem('token')}`
        }
      }).then((response) =>{
          this.dataUser = response.data.profile
          axios.get('http://localhost:8000/api/v1/project/'+ this.$route.params.projectId+'/members',{
            headers: {
              "Authorization": `Bearer ${window.localStorage.getItem('token')}`
            }
          }).then((response) =>{
            this.members = response.data.msg
          }).catch((error) =>{
            console.log(error.response.data)
          })
      }).catch((error) =>{
          console.log(error.response.data)
      })
    }).catch((error) =>{
      console.log(error.response.data)
      if(error.response.status == 500,400,404){
        router.push('/404')
      }
    })
  },
  created(){
    this.fetchData()
    window.addEventListener('keyup', e => {
      if(e.keyCode === 27){
        this.addMemberClickCancel()   
      }
    })
  },
  components:{
	  'board-storage': boardStorage,
	  'board-deck': boardDeck,
	  'board-team': boardTeam,
    'member-project': boardMember,
    'v-select': vSelect,
  },
  methods:{
    getOptions(search) {
      axios.get('http://localhost:8000/api/v1/students', {
        params: {
          q: search
        },
        headers: {
          "Authorization": `Bearer ${window.localStorage.getItem('token')}`,
        },
        }).then(response => {
            this.dataSearch = response.data.students
        }).catch((error) =>{
            console.log(error.response.data)
        })
    },
    catchInput(value){
      console.log(value.id_students)
      this.dataNameStudent = value.name
      this.avatarStudent = value.avatar
      this.id_students = value.id_students
    },
    addMemberClick(){
      this.addMemberEvent = true
    },
    addMemberClickDone(){
      axios.post('http://localhost:8000/api/v1/project/'+ this.$route.params.projectId +'/member/add',{
        id_students: this.id_students
      },{
        headers: {
          "Authorization": `Bearer ${window.localStorage.getItem('token')}`
        }
      }).then((response) => {
          console.log(response)
          this.fetchData()
      }).catch((error) =>{
          console.log(error.response.data)
      })
      this.id_students = ''
      this.errors.clear();
      this.addMemberEvent = false
    },
    addMemberClickCancel(){
      this.id_students = ''
      this.errors.clear();
      this.addMemberEvent = false
    },
    fetchData(){
          axios.get('http://localhost:8000/api/v1/project/'+ this.$route.params.projectId+'/members',{
          headers: {
          "Authorization": `Bearer ${window.localStorage.getItem('token')}`
        }
    }).then((response) =>{
      // console.log(response)
      this.members = response.data.msg
    }).catch((error) =>{
    console.log(error.response.data)
    })
    },
    onMemberDelete(id){
      const position = this.members.findIndex((element) =>{
        return element.id == id
      })
      this.members.splice(position, 1);
    }
  }
}
</script>
