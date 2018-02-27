<template>
  <div id="profileSetup">
      <div class="profileSetup__Container">
        <div class="profileForm">
            <div class="profileForm__Title">
                <h3>Welcome to Octolist</h3>
                <p>Let's get your profile setup, so that your teammates recognize you.</p>
            </div>
            <div class="profileForm__Content">
                <input type="hidden" name="newState" v-model="patchUser.new">
                <fieldset>
                    <label for="stateName">Nama lengkap</label>
                    <input type="text" placeholder="Fahmi irsyad dkk" @focus="$event.target.select()" class="input--default input--default-full input-text fontSize-s" name="stateName">
                    <label for="stateEmail">Email</label>
                    <input type="text" placeholder="fahmi@fmail.com" @focus="$event.target.select()" class="input--default input--default-full input-text fontSize-s" name="stateEmail">
                </fieldset>
                <fieldset>
                    <label for="statePass">Password lama</label>
                    <input type="password" placeholder="masukkan password lama" @focus="$event.target.select()" class="input--default input--default-full input-text fontSize-s">
                    <label for="stateNewPass">Password baru</label>
                    <input type="password" placeholder="masukkan password baru" @focus="$event.target.select()" class="input--default input-text fontSize-s">
                    <input type="password" placeholder="konfirmasi password baru" @focus="$event.target.select()" class="input--default input-text fontSize-s">
                </fieldset>
                <button :disabled="!patchUserIsPassed" @click.prevent="profileRenew" class="button button-landing button--xl borderRadius-s button--melting-blue">Let's Begin</button>
            </div>
        </div>
      </div>
  </div>
</template>
<style scoped>
    #profileSetup {
        width: 100%;
        height: 100vh;
        background-color: white;
    }
    button {
      margin-top: 15px;
      width: 100%;
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
              codes: 'secret',
              new: '1',
              email: 'fahmiirsyad11@icloud.com',
              name: 'fahmi irysad khairi'
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
            axios.get('http://localhost:8000/api/v1/student', {
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
            axios.patch('http://localhost:8000/api/v1/student', this.patchUser, {
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
