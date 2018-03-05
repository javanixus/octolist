<template>
  <div class="adminDashboardMain">
    <div class="adminDashboardHeader">
      <div class="adminDashboardHeader__Title">
        <h3>Dashboard</h3>
      </div>
      <div class="adminDashboardHeader__Profile">
        <p>{{admin.name}}</p>
      </div>
    </div>
    <div class="adminDashboardContent">
      <div class="adminDashboardContent__MansorySmall">
        <div class="adminBox box--small borderRadius-s box-greeting">
          <span>
            <div class="box-greeting__details">
              <h4>Welcome, {{admin.name}}</h4>
              <p>selamat datang kembali</p>
            </div>
          </span>
        </div>
        <div class="adminBox box--small borderRadius-s box-version">
          Gate Key
          <p>Click the EYE to get the key, pls dont share the key for security reason</p>
          <label for="key">Access Key</label>
          <input name="key" type="text" @focus="$event.target.select()" :value="token">
          <p>Get new gate key > </p>
        </div>
      </div>
      <div class="adminDashboardContent__MansoryBig">
        <div class="adminBox box--big borderRadius-s box-big1">
          <span>
            <div class="box-details">
              <p>Teachers</p>
              <div class="box-details__info">
                <p>Totals:</p>
                <h3>10</h3>
              </div>
            </div>
            <div class="box-details" style="background-image:url('/images/students.png')!important">
              <p>Students</p>
              <div class="box-details__info">
                <p>Totals:</p>
                <h3>210</h3>
              </div>
            </div>
          </span>
        </div>
      </div>
      <div class="adminDashboardContent__MansoryBig">
        <div class="adminBox box--big borderRadius-s box-big2">
          <div class="box-big2__info">
            <h3><i>Creativity</i> and <i>believing</i> in your work is absolutely a necessary part of success.</h3>
            <p>Ingvar Kamprad - Founder IKEA</p>
          </div>
        </div>
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
      token: window.localStorage.getItem('token_admin'),
      dataStudentsCount: '',
      dataTeacherCount: ''
    }
  },
  mounted(){
  },
  props: ['admin']
}
</script>