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
          <form class="wrap-login--form" action="index.html" method="post">
            <h3 class="fontSize-l fontWeight-4 textAlignCenter">Selamat Datang</h3>
            <h3 class="fontSize-l fontWeight-4 textAlignCenter marginBottom-xl">Kembali</h3>
            <div class="marginBottom-s">
              <input type="text" v-model="username" class="input-nofill input-text fontSize-s" placeholder="Username">
              <input type="password" v-model="password" class="input-nofill input-text fontSize-s" placeholder="Password">
            </div>
            <div class="marginTop-l">
              <button @click.prevent="authUser" type="button" name="button" class="login-button textAlignCenter button button-landing button--xl borderRadius-s button--melting-blue">Login</button>
            </div>
            {{ msg }}
          </form>
        </div>
      </div>
    </main>
  </div>
</template>

<script>
  import axios from 'axios';

  const HTTP = axios.create({
    baseURL: 'http://localhost:8000/',
    headers: {
      Authorization: 'Bearer {token}'
    }
  });

  export default {
    data() {
      return {
        username: '',
        password: '',
        msg: ''
      }
    },
    methods: {
      authUser() {
        HTTP.post('http://localhost:8000/api/v1/user/signin', {
          username: this.username,
          password: this.password
        }).then((response) => {
          if(response.data.msg === "true"){
              this.$router.push('/');
          } else {
              this.$router.push('/dasboard');
          }
        });
      }
    }
  }
</script>

<style lang="css" module>
  .BgWhite {
    background: white!important;
    height: 100vh;
  }
</style>
