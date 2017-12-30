<template lang="html">
  <div :class="$style.BgWhite">
    <header class="navbar">
      <div class="navbar--landing">
        <div class="button-forgotpass">
          <router-link :to="{ path: '/forgot' , query:{ auth: 'passforgot'}}">
            <a class="button button--xl button--nofill borderRadius-s">
                Lupa Password
            </a>
          </router-link>
        </div>
      </div>
    </header>
    <main>
      <div class="wrap-login universe">
        <div class="wrap-login--content marginMagic">
          <form @keyup.enter.prevent="authUser" class="wrap-login--form" action="index.html" method="post">
            <h3 class="fontSize-l fontWeight-4 textAlignCenter">Selamat Datang</h3>
            <h3 class="fontSize-l fontWeight-4 textAlignCenter marginBottom-xl">Kembali</h3>
            <div class="marginBottom-s">
              <input type="text" v-validate="'required|alpha'" :class="{'input-nofill': true, 'input--danger': errors.has('username') }" v-model="logItIn.username" class="input-text fontSize-s" placeholder="Username" name="username">
              <span style="font-size: 12px; color: red;" v-if="errors.has('username')">
                {{ errors.first('username') }}
              </span>
              <input type="password" v-validate="'required|alpha'" v-model="logItIn.password" name="password" :class="{'input-nofill': true, 'input--danger': errors.has('password') }" class="input-nofill input-text fontSize-s" placeholder="Password">
              <span style="font-size: 12px; color: red;" v-if="errors.has('password')">
                {{ errors.first('password') }}
              </span>
            </div>
            <div class="marginTop-l">
              <button @click.prevent="authUser" :disabled="!authUserIsPassed" type="button" name="button" class="login-button textAlignCenter button button-landing button--xl borderRadius-s button--melting-blue">Login</button>
            </div>
            {{ logItIn.msg }}
          </form>
        </div>
      </div>
    </main>
  </div>
</template>

<script>
  import { HTTP } from './../../router';
  export default {
    data() {
      return {
        logItIn : {
          username: '',
          password: '',
          msg: '',
      },
      }
    },
    computed: {
      authUserIsPassed() {
        return this.logItIn.username && this.logItIn.password;
      },
    },
    methods: {
      authUser() {
        HTTP.post('http://localhost:8000/api/v1/user/signin', this.logItIn)
        .then((response) => {
          const token = response.data.token; // tanam tanam token , tak perlu dibajak
          if(response.data.passed === true){
              // this code below will run background ( not reloading )
              const base64Url = token.split('.')[1]; // make a const named baseurl64 to delete . from token
              const base64 = base64Url.replace('-','+').replace('_','/'); // sama aja tod 
              console.log(JSON.parse(window.atob(base64))); // nge log hati yang kosong hehe
              localStorage.setItem('token', token); // not recommended actually to crud token on localstorage , better with cookie but more complex to code
              localStorage.getItem('token'); // get the token 
              this.$router.push('/admin' + '?token=' + token); // pushing to target page
          } else {
            this.logItIn.msg = (response.data.msg);
          }
<<<<<<< HEAD
        });
      }
=======
        })
      } 
>>>>>>> c007ab6ccb21db11c1ac3866664f2c22f1290222
    }
  }
</script>

<style lang="css" module>
  .BgWhite {
    background: white!important;
    height: 100vh;
  }
</style>
