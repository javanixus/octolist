<template>
    <modal name="profile-popup-modal" :classes="['v--modal', 'error-modal']" :pivot-y="0.13" :pivot-x="0.95" transition="nice-modal-fade" :min-width="200" :min-height="200" :adaptive="true" :reset="true" width="20%" height="auto" :clickToClose="true">
        <div class="createProjectModal-wrapper">
            <div class="createProjectModal-content nopadding">
                <div class="profileMenuPopupWrapper">
                    <div class="profileMenuPopup__Header" v-bind:style="{ 'backgroundImage': 'url(' + this.dataUser.avatar + ')' }">
                    </div>
                    <div class="profileMenuPopup__Content">
                        <ul>
                            <li><router-link :to="{path: '/teacher/profile'}">Profile</router-link></li>
                            <li>Help</li>
                            <li @click="$modal.show('report-popup-modal')" class="redColor">Report Bugs</li>
                            <li @click="$modal.show('confirm-modal'),$modal.hide('profile-popup-modal') ">Keluar</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </modal>
</template>
<style>
    * {
        margin: 0;
        text-align: left;
        list-style: none;
    }
    .nopadding {
        padding: 0;
    }
    .redColor:hover {
        color: #FF4949!important;
    }
</style>
<script>
import axios from 'axios'
import router from './../../../router'
export default {
  data() {
      return {
          dataUser:[]
      }
  },
        beforeCreate(){
            axios.get('http://localhost:8000/api/v1/teachers' , {
                headers: {
                    "Authorization": `Bearer ${window.localStorage.getItem('token')}`,
                }
            })
            .then((response) => {
                this.dataUser = response.data.profile;
                // console.log(response);
            })
    },
}
</script>
