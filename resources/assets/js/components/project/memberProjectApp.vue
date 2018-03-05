<template>
  <div class="memberProject">
    <div class="avatar avatar--xs avatar-dp" style="margin-left:8px;">
      <img class="avatar-img" :alt="who.name" :title="who.name" :src="'http://localhost:8000/avatar/'+who.avatar"/>
    </div>
    <div class="memberProjectDelete" alt="remove" title="remove" @click="onDeleteMember">
      <p>-</p>
    </div>
  </div>
</template>
<style scoped>
  .memberProjectDelete {
    text-align: center;
  }
</style>
<script>
import axios from 'axios'
export default {
  props: ['who'],
  methods:{
    onDeleteMember(){
      this.$emit('memberDeleted', this.who.id)
      axios.delete('http://localhost:8000/api/v1/project/'+ this.who.id_projects + '/member/' + this.who.id + '/delete',{
        headers:{
          "Authorization": `Bearer ${window.localStorage.getItem('token')}`
        }
      }).then((response) =>{

      }).catch((error) =>{
        console.log(error.response.data)
      })
    }
  }
}
</script>
