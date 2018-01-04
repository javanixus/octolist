<template>
      <modal name="profile-popup-modal" :classes="['v--modal', 'error-modal']" :pivot-y="0.13" :pivot-x="0.93" transition="nice-modal-fade" :min-width="200" :min-height="200" :adaptive="true" :reset="true" width="20%" height="auto" :clickToClose="true">
        <div class="createProjectModal-wrapper">
            <div class="createProjectModal-content nopadding">
                <div class="profileMenuPopupWrapper">
                    <div class="profileMenuPopup__Header" v-blur="blurConfig" v-bind:style="{ 'backgroundImage': 'url(' + this.profilePopupCover + ')' }">
                    </div>
                    <div class="profileMenuPopup__Content">
                        <ul>
                            <li>Profile</li>
                            <li>Help</li>
                            <li>Report Bugs</li>
                            <li>Keluar</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </modal>
</template>
<style>
    * {
        margin: 0;
        text-align: left;
        list-style: none;
    }
    .nopadding {
        padding: 0;
    }
</style>
<script>
export default {
  data() {
      return {
          profilePopupCover: 'images/avatar0.jpg',
          blurConfig: {
            isBlurred: true, // activate and deactivate blur directive , i always turning on it
            opacity: 1,
            filter: 'blur(1px)',
            transition: 'all .3s linear'
          }
      }
  }
}
</script>
