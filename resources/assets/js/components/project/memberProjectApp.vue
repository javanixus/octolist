<template>
  <div class="memberProject">
    <div class="avatar avatar--xs avatar-dp" style="margin-left:8px;">
      <img class="avatar-img" alt="" :src="'http://localhost:8000/avatar/'+who.avatar"/>
    </div>
  </div>
</template>
<style scoped>

</style>
<script>
export default {
  props: ['who']
}
</script>
