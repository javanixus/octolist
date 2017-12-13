<template>
  <modal name="confirm-modal"
         :classes="['v--modal', 'error-modal']"
         :pivot-y="0.4"
         :width="400"
         :height="150"
  >
    <div class="createProjectModal-wrapper">
      <div class="createProjectModal-content">
        <p>Apakah kamu yakin ?</p>
      </div>
      <div class="createProjectModal-footer">
        <router-link :to="'/'"><button class="green-button">iya</button></router-link>
        <button class="red-button" @click="$modal.hide('confirm-modal')">ga, jadi</button>
      </div>
    </div>
  </modal>
</template>
<style>

</style>
<script>
  export default {}
</script>
