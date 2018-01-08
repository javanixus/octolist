<template>
  
</template>
<script>
  import { HTTP } from './../../router';
  import store from './../../store/index';
  import router from './../../router';
  
  export default {
        beforeCreate() {
            window.localStorage.removeItem('key');
        },
        mounted() {
            window.localStorage.removeItem('token');
            store.commit('LOGOUT_USER');
            router.push('/login');
        }
    };
</script>