<template>
  <div class="adminDashboardTableStudent">
      <div class="adminDashboardHeader">
        <div class="adminDashboardHeader__Title">
          <h3>Students</h3>
        </div>
        <div class="adminDashboardHeader__Profile">
          <p>{{admin.name}}</p>
        </div>
      </div>
      <div class="adminDashboardContent">
        <div class="studentTable">
          <div class="studentTableSort">
              <ul>
                <li>id</li>
                <li>name</li>
                <li>username</li>
                <li>email</li>
                <li>gender</li>
                <li>phone</li>
                <li>nis</li>
              </ul>
          </div>
        </div>
      </div>
  </div>
</template>
<style scoped>
.adminDashboardContent{
}
</style>
<script>
export default {
  props:['admin','students']
}
</script>
