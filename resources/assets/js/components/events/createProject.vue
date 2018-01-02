<template>
  <modal name="create-project-modal"
         :classes="['v--modal', 'error-modal']"
         :pivot-y="0.5"
        transition="nice-modal-fade"
        :min-width="200"
        :min-height="200"
        :adaptive="true"
        :scrollable="true"
        :reset="true"
        width="60%"
        height="auto"
        :clickToClose="true"
  >
    <div class="createProjectModal-wrapper">
      <div class="createProjectModal-content">
        <form action="">
            <vue-dropzone ref="myVueDropzone" id="dropzone" :options="dropzoneOptions">
            </vue-dropzone>
            <div style="width: 10px; height: 400px; background: red;"></div>
        </form>
      </div>
      <div class="createProjectModal-footer">
        <!-- <!-- <router-link :to="'/logout'"><button class="green-button">iya</button></router-link> -->
        <button class="red-button" @click="$modal.hide('create-project-modal')">ga, jadi</button>
      </div>
    </div>
  </modal>
</template>
<style scoped>
    .v--modal-overlay {
        background: rgba(0, 0, 0, 0.6);
    }
</style>
<script>
  import vue2Dropzone from 'vue2-dropzone'
  import 'vue2-dropzone/dist/vue2Dropzone.css'

  export default {
    data() {
        return {
        dropzoneOptions: {
          url: 'https://httpbin.org/post',
          thumbnailWidth: 150,
          addRemoveLinks: true,
          maxFilesize: 0.5,
          headers: { "My-Awesome-Header": "header value" }
        }
        }
    },
    components: {
        'vue-dropzone': vue2Dropzone
    }
  }
</script>
