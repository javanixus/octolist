<template>
  <div id="startFinal">
  <div class="startFinal__navbar">
    <p>Octolist</p>
  </div>
  <div class="startFinal__Title">
    <h3>{{dataUser.name}}</h3>
    <h3>You are already to start.</h3>
    <p>Start the journey with click i'm ready below.</p>
    <button @click="startPortal">I'm Ready</button>
  </div>
      <svg style="position: absolute; bottom: 0px;" width="400px" height="158px" viewBox="0 0 400 158" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <defs>
        <linearGradient x1="65.0364027%" y1="-4.37439917%" x2="9.38124499%" y2="60.5456248%" id="linearGradient-1">
            <stop stop-color="#66546B" offset="0%"></stop>
            <stop stop-color="#5F4E63" offset="100%"></stop>
        </linearGradient>
    </defs>
    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="Group">
            <path d="M0,61 L176,0 L198,14 L198,36 L213,36 C220.981617,53.8315914 227.648284,66.8315914 233,75 C234.78711,77.727694 239.068309,77.6815669 241,80 C243.56866,83.0829296 246.901994,87.7495962 251,94 L248,125 L277,143 L348,158 L0,158 L0,61 Z" id="Path-2" fill="url(#linearGradient-1)"></path>
            <path d="M238.171875,68.325 L234,75 L242.215385,73.3569231 L258,93 L254,124 L276,142 L400,158 L265,158 L243,126 L247,93 L238,80 L188,118 L230,72 L212,48 L192,48 L78,106 L188,37 L192,20 L175.581194,8.37001248 L168,3 L176,0 L198,14 L198,36 L213,37 L238.171875,68.325 Z" id="Combined-Shape" fill="#50445C"></path>
            <polygon id="Path-5" fill="#50445C" points="178 7 170 2 14 57"></polygon>
        </g>
    </g>
</svg>
<div class="sun"></div>
  </div>
</template>
<style scoped>

</style>
<script>
import axios from 'axios';
import router from './../../router';
import store from './../../store/index';

export default {
    data(){
        return {
            dataUser: []
        }
    },
    mounted(){
        if(store.state.isLogged){
                axios.get('http://localhost:8000/api/v1/student',{
                    headers: {
                        "Authorization": `Bearer ${window.localStorage.getItem('token')}`,
                    }
                })
                .then((response) => {
                    this.dataUser = response.data.profile
                    if(store.state.start == false){
                        router.push('/start')
                    }
                })
                } else {
                router.push('/logout')
                }
        },
    methods: {
        startPortal(){
            store.commit('END_START_USER');
            router.push('/board')
        }
    }
  }
</script>
