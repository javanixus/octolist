<template>
  <div id="profileSetup">
      <div class="profileSetup__Container">
            <div class="titleHello">
                <div class="titleHelloDesc">
                    <!-- <h2 class="h2Hello">Wrapping up With One Tools</h2>
                    <p class="getStarted-desc">with Octolist u can set deadline event also wrap up html , css , php</p> -->
                    <p>Masukkan password lama</p>
                    <input type="password" v-model="dataUser.codes">
                    <p>Masukkan password baru</p>
                    <input type="password" v-model="dataUser.newpass">
                    <p>konfirmasi password baru</p>
                    <input type="password" v-model="dataUser.retypepass">
                    <br/>
                    <button :disabled="!patchUserIsPassed" @click.prevent="profileRenew" class="button button-landing button--xl borderRadius-s button--melting-blue">Let's Begin</button>
                </div>
            </div>
      </div>
    <svg width="254px" height="182px" style="position: absolute; bottom: 2vh; left: 42.5vw;z-index: 2;" viewBox="0 0 249 189" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <!-- Generator: Sketch 48.2 (47327) - http://www.bohemiancoding.com/sketch -->
    <title>Group</title>
    <desc>Created with Sketch.</desc>
    <defs>
        <linearGradient x1="31.3428566%" y1="-122.977405%" x2="56.157051%" y2="64.292202%" id="linearGradient-1">
            <stop stop-color="#E8F1F5" offset="0%"></stop>
            <stop stop-color="#C1D3DC" offset="100%"></stop>
        </linearGradient>
        <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="linearGradient-2">
            <stop stop-color="#E8F1F5" offset="0%"></stop>
            <stop stop-color="#C1D3DC" offset="100%"></stop>
        </linearGradient>
        <linearGradient x1="50%" y1="3.11902105%" x2="44.6057014%" y2="71.5643288%" id="linearGradient-3">
            <stop stop-color="#BACCD6" offset="0%"></stop>
            <stop stop-color="#DCEBF4" offset="100%"></stop>
        </linearGradient>
        <linearGradient x1="46.2326407%" y1="12.6973365%" x2="46.2326417%" y2="89.5310013%" id="linearGradient-4">
            <stop stop-color="#BACCD6" offset="0%"></stop>
            <stop stop-color="#DBEBF4" offset="100%"></stop>
        </linearGradient>
        <linearGradient x1="-7.46683703%" y1="-53.7211266%" x2="48.1582203%" y2="66.182589%" id="linearGradient-5">
            <stop stop-color="#ECF3F7" offset="0%"></stop>
            <stop stop-color="#D4E3EC" offset="100%"></stop>
        </linearGradient>
        <linearGradient x1="50%" y1="-21.2585169%" x2="54.1018728%" y2="36.9712178%" id="linearGradient-6">
            <stop stop-color="#ECF3F7" offset="0%"></stop>
            <stop stop-color="#D4E3EC" offset="100%"></stop>
        </linearGradient>
    </defs>
    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="Group">
            <polygon id="Path" fill="url(#linearGradient-1)" points="2.55259771 45.6346778 83.6757112 16.2897167 193.467241 43.3486219 111.619775 72.6472244"></polygon>
            <polygon id="Path-6" fill="url(#linearGradient-2)" points="83.6703644 16.2845764 84.197625 65.8088879 111.77535 72.6097084 193.37123 43.3089934"></polygon>
            <polygon id="Path-3" fill="url(#linearGradient-3)" points="111.751573 72.6554463 111.751573 188.092825 0.583636526 156.166728 2.59211672 45.5139688"></polygon>
            <polygon id="Path-5" fill="url(#linearGradient-4)" points="111.680232 72.6253507 193.400581 43.2850184 194.39993 153.028612 111.114461 188.228381"></polygon>
            <polygon id="Path-7" fill="url(#linearGradient-5)" points="55 59 133 28 193 44 112 73"></polygon>
            <polygon id="Path-8" fill="url(#linearGradient-6)" points="3 46 84 16 133 28 56 59"></polygon>
        </g>
    </g>
</svg>
  </div>
</template>
<style scoped>
    #profileSetup {
        width: 100%;
        height: 100vh;
        background-color: white;
    }
    .titleHello {
        width: 100%;
        height: 400px;
        padding-top: 100px;
        display: flex;
        justify-content: center;
    }
    .h2Hello {
        font-size: 30px;
    }
    .titleHelloDesc {
        text-align: center;
    }
</style>
<script>
import axios from 'axios';
import store from './../../store/index';
import router from './../../router';

export default {
  data(){
      return {
          patchUser: {
              codes: '',
              new: '1'
          },
          dataUser:[]
      }
  },
  computed: {
      patchUserIsPassed() {
        return this.dataUser.codes && this.dataUser.newpass && this.dataUser.retypepass;
      },
  },
  beforeCreate(){
            axios.get('http://localhost:8000/api/v1/user', {
                headers: {
                    "Authorization": `Bearer ${window.localStorage.getItem('token')}`,
                }
            })
            .then((response) => {
                this.dataUser = response.data.profile;
                console.log(response);
            })
        },
  methods: {
      profileRenew(){
            console.log(this.dataUser);
            axios.patch('http://localhost:8000/api/v1/user', this.patchUser, {
                headers: {
                    "Authorization": `Bearer ${window.localStorage.getItem('token')}`,
                }
            }).then((response) => {
                // this.patchUser = response.data.profile
                console.log(response)
            }).catch((error) =>{
                console.log(error.response.data)
            })
      }
  }
}
</script>
