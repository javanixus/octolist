<template>
    <div id="loginAdmin">
        <div class="adminLoginContainter">
            <div class="adminLogin__Cover">
            </div>
            <div class="adminLogin__Form">
                <div class="adminLoginFormTitle">
                    <h4 class="adminLoginFormTitle__Big">
                        signin admin
                    </h4>
                </div>
                <form action="POST">
                <div class="adminLoginFormCore">
                    <p>Username</p>
                    <input @focus="$event.target.select()" v-validate="'required'" type="text" class="input--default input--default-full input-text fontSize-s" :class="{'input--default': true, 'input--danger': errors.has('username') }" placeholder="fahmiirsyad" name="username" id="username" v-model="AdminAuth.username">
                    <span style="font-size: 12px; color: red;" v-if="errors.has('username')">
                        {{ errors.first('username') }}
                    </span>
                    <p>Password</p>
                    <input @focus="$event.target.select()" v-validate="'required'" type="password" class="input--default input--default-full input-text fontSize-s" :class="{'input--default': true, 'input--danger': errors.has('password') }" placeholder="password" name="password" id="password" v-model="AdminAuth.password">
                    <span style="font-size: 12px; color: red;" v-if="errors.has('password')">
                        {{ errors.first('password') }}
                    </span>
                    <p>{{ AdminAuth.msg }}</p>
                    <div class="adminLoginFormCore__button">
                    <button :disabled="!authAdminIsPassed" @click.prevent="adminAuth" class="button button-landing button--xl borderRadius-s button--melting-blue"><div style="background-image: url('/images/spinner.png');" :class="{'spinner':logItIn.loader}"></div>{{ state.login }}</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</template>
<style scoped>

</style>
<script>
import axios from 'axios';
import store from './../../store/index';
import router from './../../router';

export default {
    data(){
        return {
            AdminAuth: {
                username:'',
                password:'',
                msg: ''
            },
            logItIn: {
                loader: false,
            },
            state: {
                login: 'Masuk'
            }
        }
    },
    methods: {
        adminAuth(){
            this.logItIn.loader = true,
            this.state.login = ''
            axios.post('http://localhost:8000/api/v1/admin/login', this.AdminAuth,{
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            withCredentials: true
            })
            .then((response) => {
            console.log(response)
            if (response.data.user === 1){
                window.localStorage.setItem('token', response.data.token);
                // store.commit('LOGIN_USER');
                router.push('/admin');
            }
            else {
                this.AdminAuth.msg = (response.data.msg);
                this.logItIn.loader = false;
                this.state.login = 'Login';
            }
            () => {
                this.logItIn.loader = false
            }
            }).catch((error) =>{
                console.log(error.response.data)
            })
        }
    },
    computed: {
      authAdminIsPassed() {
        return this.AdminAuth.username && this.AdminAuth.password;
      },
    },
}
</script>
