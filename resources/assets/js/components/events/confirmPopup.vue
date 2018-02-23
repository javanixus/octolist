<template>
  <modal name="confirm-modal"
         :classes="['v--modal', 'error-modal']"
         :pivot-y="0.4"
         :width="400"
         :height="150"
  >
    <div class="createProjectModal-wrapper">
      <div class="createProjectModal-content">
        <div class="confirmContainer">
          <h4>Apakah kamu yakin ?</h4>
        </div>
      </div>
      <div class="createProjectModal-footer">
        <button @click.prevent="logout" class="button button-landing button--xl borderRadius-s button--melting-blue">Keluar</button>
        <button class="button button-landing button--xl borderRadius-s button--melting-blue red-bg" @click="$modal.hide('confirm-modal')">Batalkan</button>
      </div>
    </div>
  </modal>
</template>
<style>

</style>
<script>
  import router from './../../router'

  export default {
    methods: {
      logout() {
        router.push('/logout')
      }
    }
  }
</script>
