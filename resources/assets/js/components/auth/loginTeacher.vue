<template>
  <div class="loginTeacherWrapper">
      <div class="coverImageLogin">
          <img src="/images/background.jpg" alt="">
                <div class="qoutesTeacher">
          <div class="qoutesTeacher__Desc">
            <h3>Octolist make it easy to enjoy what matters the most in the life</h3>
            <p>images Displayed are solely for representation purposes only, All work copyright of respective owner, otherwise © {{ new Date().getFullYear() }} Javanixus</p>
          </div>
      </div>
      </div>
      <div class="loginTeacher__Login">
          <form method="POST">
              <div class="loginTeacherForm">
                  <h4>Octolist Teacher</h4>
                  <p>signin into your account</p>
                  <div class="formTeacherAuth">
                  <label for="teacherusername">username</label>
                    <input type="text" v-validate="'required'" :class="{'input-nofill': true, 'input--danger': errors.has('username') }" v-model="teacherAuth.username" class="input-text fontSize-s" placeholder="Username" name="username">
                    <span style="font-size: 12px; color: red;" v-if="errors.has('username')">
                        {{ errors.first('username') }}
                    </span>
                  <label for="teacherpassword">password</label>
                  <input type="password" v-validate="'required'" v-model="teacherAuth.password" name="password" :class="{'input-nofill': true, 'input--danger': errors.has('password') }" class="input-nofill input-text fontSize-s" placeholder="Password">
                  <span style="font-size: 12px; color: red;" v-if="errors.has('password')">
                    {{ errors.first('password') }}
                  </span>
                  <button>Sign in</button>
                  </div>
              </div>
          </form>
      </div>
  </div>
</template>
<style scoped>

</style>
<script>
export default {
    data(){
        return {
            teacherAuth: {
                username:'',
                password:''
            }
        }
    }
}
</script>
