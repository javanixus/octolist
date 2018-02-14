<template>
    <div id="loginAdmin">
        <div class="adminLoginContainter">
            <div class="adminLogin__Cover">
            </div>
            <div class="adminLogin__Form">
                <div class="adminLoginFormTitle">
                    <h4 class="adminLoginFormTitle__Big">
                        Login untuk Admin
                    </h4>
                    <p class="adminLoginFormTitle__Desc">
                        
                    </p>
                </div>
                <form action="POST">
                <div class="adminLoginFormCore">
                    <p>Username</p>
                    <input type="text" class="input--default input--default-full input-text fontSize-s" placeholder="fahmiirsyad" name="usernameAdmin" id="usernameAdmin" v-model="this.AdminAuth.username">
                    <p>Password</p>
                    <input type="text" class="input--default input--default-full input-text fontSize-s" placeholder="password" name="passwordAdmin" id="passwordAdmin" v-model="this.AdminAuth.password">
                    <div class="adminLoginFormCore__button">
                        <button :class="{'loading':logItIn.loader}" class="button button-landing button--xl borderRadius-s button--melting-blue">Masuk</button>
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
export default {
    data(){
        return {
            AdminAuth: {
                username:'',
                password:''
            },
            logItIn: {
                loader: true,
            }
        }
    }
}
</script>
