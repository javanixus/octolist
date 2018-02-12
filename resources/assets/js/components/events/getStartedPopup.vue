<template>
    <modal name="getstarted-siswa-popup-modal" :classes="['v--modal', 'error-modal']" :pivot-y="0.5" transition="nice-modal-fade" :min-width="300" :min-height="200" :adaptive="true" :reset="true" width="20%" height="auto" :scrollable="true" :clickToClose="true">
        <div class="createProjectModal-wrapper">
            <div class="createProjectModal-content nopadding">
                <div class="profileMenuPopupWrapper">
                    <div class="profileMenuPopup__Header" v-bind:style="{ 'backgroundImage': 'url(' + this.profilePopupCover + ')' }">
                        <div id="avatar-dp-id" class="avatar avatar-get avatar--m">
                            <img class="avatar-img" :src="dataUser.avatar" alt="" />
                        </div>
                    </div>
                    <div class="profileMenuPopup__Content">
                        <h3 class="getStartedTitle">Congrats !!</h3>
                        <span></span>
                        <h3 class="getStartedTitle" style="font-size: 17px;">{{dataUser.name}}</h3>
                        <p class="getStartedDesc">yay ! you have been participate on <q style="color: #1f2d3d;">Beta Preview program</q> send your feedback , help us to improve this web</p>
                    </div>
                </div>
            </div>
        </div>
    </modal>  
</template>
<style scoped>
        * {
        margin: 0;
        list-style: none;
    }
    .nopadding {
        padding: 0;
    }
    .avatar-get{
        position: absolute;
        bottom: 10px;
        right: 80px;
        border: 5px solid white;
    }
    .redColor:hover {
        color: #ec008c!important;
    }
    .profileMenuPopup__Header {
        height: 200px;
        position: relative;
    }
    .getStartedTitle {
        text-align: center;
        font-size: 20px;
    } 
    .getStartedDesc {
        font-size: 12px;
        text-align: center;
        color: #8492A6;
    }  
</style>
<script>
import axios from 'axios'
import router from './../../router'
export default {
  data() {
      return {
          profilePopupCover: 'images/sneek.gif',
          dataUser:[]
      }
  },
        beforeCreate(){
            const key_id = window.localStorage.getItem('key');
            // decrypt phase //
            const becrypt_slice_one = key_id.slice(7);
            const becrypt_zero = becrypt_slice_one / 100101010;
            const becrypt_pharse = becrypt_zero / 8084334125;
            // end decrypt //
            axios.get('http://localhost:8000/api/v1/user/' + becrypt_pharse , {
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
