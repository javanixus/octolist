<template>
    <modal name="profile-popup-modal" :classes="['v--modal', 'error-modal']" :pivot-y="0.13" :pivot-x="0.95" transition="nice-modal-fade" :min-width="200" :min-height="200" :adaptive="true" :reset="true" width="20%" height="auto" :clickToClose="true">
        <div class="createProjectModal-wrapper">
            <div class="createProjectModal-content nopadding">
                <div class="profileMenuPopupWrapper">
                    <div class="profileMenuPopup__Header" v-blur="blurConfig" v-bind:style="{ 'backgroundImage': 'url(' + this.dataUser.avatar + ')' }">
                    </div>
                    <div class="profileMenuPopup__Content">
                        <ul>
                            <li><router-link :to="{path: '/profile'}">Profile</router-link></li>
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
        color: #ec008c!important;
    }
</style>
<script>
    import axios from 'axios'
    import router from './../../router'
export default {
  data() {
      return {
          profilePopupCover: 'images/avatar0.jpg',
          blurConfig: {
            isBlurred: true, // activate and deactivate blur directive , i always turning on it
            opacity: 1,
            filter: 'blur(1px)',
            transition: 'all .3s linear'
          },
          dataUser:[]
      }
  },
        mounted(){
            const key_id = window.localStorage.getItem('key');
            // decrypt phase //
            const becrypt_slice_one = key_id.slice(7);
            const becrypt_zero = becrypt_slice_one / 100101010;
            const becrypt_pharse = becrypt_zero / 8084334125;
            // end decrypt //
            axios.get('http://localhost:8000/api/v1/user/' , {
                headers: {
                    "Authorization": `Bearer ${window.localStorage.getItem('token')}`,
                }
            })
            .then((response) => {
                this.dataUser = response.data.data
                console.log(response);
            })
    },
}
</script>
