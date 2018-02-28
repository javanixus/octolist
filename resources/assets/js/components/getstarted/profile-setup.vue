<template>
  <div id="profileSetup">
      <div class="profileSetup__Container">
        <div class="profileForm">
            <div class="profileForm__Title">
                <h3>Welcome to Octolist</h3>
                <p>Let's get your profile setup, so that your teammates recognize you.</p>
            </div>
            <div class="profileForm__Content">
                <fieldset>
                    <label for="stateEmail">Email</label>
                    <input v-validate="'required|email'" type="text" placeholder="fahmi@fmail.com" @focus="$event.target.select()" :class="{'input-nofill': true, 'input--danger': errors.has('stateEmail') }" class="input--default input--default-full input-text fontSize-s" name="stateEmail" v-model="patchUser.email">
                    <span style="font-size: 12px; color: red;" v-if="errors.has('stateEmail')">
                    {{ errors.first('stateEmail') }}
                    </span>
                </fieldset>
                <fieldset>
                    <label for="statePass">Password lama</label>
                    <input name="passwordlama" type="password" v-validate="'required'" placeholder="masukkan password lama" @focus="$event.target.select()" :class="{'input-nofill': true, 'input--danger': errors.has('passwordlama') }" class="input--default input--default-full input-text fontSize-s" v-model="patchUser.codes">
                    <span style="font-size: 12px; color: red;" v-if="errors.has('passwordlama')">
                    {{ errors.first('passwordlama') }}
                    </span>
                    <label for="stateNewPass">Password baru</label>
                    <input name="password" v-validate="'required'" type="password" placeholder="masukkan password baru" @focus="$event.target.select()" :class="{ 'input--danger': errors.has('password') }" class="input--default input-text fontSize-s" v-model="patchUser.password">
                    <input name="password_confirmation" v-validate="'required|confirmed:password'" type="password" placeholder="konfirmasi password baru" @focus="$event.target.select()" :class="{'input--danger': errors.has('password_confirmation') }" class="input--default input-text fontSize-s" v-model="patchUser.password_confirmation">
                </fieldset>
                      <div v-show="errors.any()">
                    <span style="font-size: 12px; color: red;" v-if="errors.has('password')">
                    {{ errors.first('password') }}
                    </span>
                    <span style="font-size: 12px; color: red;" v-if="errors.has('password_confirmation')">
                    {{ errors.first('password_confirmation') }}
                    </span>
                </div>
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
  beforeCreate(){
            if(store.state.isLogged){
              axios.get('http://localhost:8000/api/v1/student',{
                  headers: {
                      "Authorization": `Bearer ${window.localStorage.getItem('token')}`,
                  }
              })
              .then((response) => {
                  this.dataUser = response.data.profile
                  if(this.dataUser.new == 1){
                      router.push('/board')
                  }
              })
            } else {
              router.push('/logout')
            }
  },
  data(){
      return {
          patchUser: {
            email: '',
            codes: '',
            password: '',
            password_confirmation: '',
          },
          dataUser: [],
          disabled: true
      }
  },
  computed: {
      patchUserIsPassed() {
        return this.patchUser.email && this.patchUser.codes && this.patchUser.password && this.patchUser.password_confirmation;
      },
  },
  methods: {
      profileRenew(){
        this.$validator.validateAll().then((result) => {
        if (result) {

            console.log(this.patchUser);
            axios.post('http://localhost:8000/api/v1/student/started', this.patchUser, {
                headers: {
                    "Authorization": `Bearer ${window.localStorage.getItem('token')}`,
                }
            }).then((response) => {
                window.localStorage.setItem('resolution_renew', this.patchUser.password);
                store.commit('START_USER');
                router.push('/start/final')
            }).catch((error) =>{
                console.log(error.response.data)
            })
          return;
        }
      });
      }
  }
  }
</script>
