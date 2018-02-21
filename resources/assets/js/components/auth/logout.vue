<template>
  
</template>
<script>
  import store from './../../store/index';
  import router from './../../router';
  
  export default {
        mounted() {
            window.localStorage.removeItem('token');
            store.commit('LOGOUT_USER');
            router.push('/login');
        }
    };
</script>