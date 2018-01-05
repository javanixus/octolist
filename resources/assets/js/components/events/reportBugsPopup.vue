<template>
      <modal name="report-popup-modal" :classes="['v--modal', 'error-modal']" :pivot-y="0.8" :pivot-x="0.95" transition="nice-modal-fade" :min-width="200" :min-height="200" :adaptive="true" :reset="true" width="20%" height="auto" :clickToClose="true">
        <div class="createProjectModal-wrapper">
            <div class="createProjectModal-content">
                <form action="">
                    <input v-validate="'required|alpha'" :class="{'input-nofill': true}" type="text" placeholder="ex: Critical bugs on kanban" style="font-size: 14px; font-family: 'sf-pro-text';" v-model="report.title" class="input-nofill input-text fontSize-s" name="" id="">
                    <br />
                    <editable :content="report.desc" v-model="report.desc" class="editableWrapper" />
                    <br />
                    <button @click.prevent="submitReportBugs" :class="{'loading':report.loader}" :disabled="!isFillPassed" type="button" name="button" class="login-button textAlignCenter button button-landing button--xl borderRadius-s button--melting-blue">submit</button>
                </form>
            </div>
        </div>
    </modal>  
</template>
<style>

</style>
<script>
import editor from 'vue2-medium-editor'

export default {
  data(){
      return {
            report: {
                title: '',
                desc: '',
                loader: false,
        }
      }
  },
  components: {
    'editable': {
         template: '<div contenteditable="true" placeholder="isi deskripsi..." style="font-size: 14px; font-weight: lighter; overflow: hidden;"></div>'
    },
  },
  computed: {
    isFillPassed() {
        return this.report.title;
      },
    },
  
}
</script>
