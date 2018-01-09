<template>
    <modal name="teacher-profile-popup" :classes="['v--modal', 'error-modal']" :pivot-y="0.13" :pivot-x="0.95" transition="nice-modal-fade" :min-width="200" :min-height="200" :adaptive="true" :reset="true" width="20%" height="auto" :clickToClose="true">
        <div class="createProjectModal-wrapper">
            <div class="createProjectModal-content nopadding">
                <div class="profileMenuPopupWrapper">
                    <div class="profileMenuPopup__Header">
                    </div>
                    <div class="profileMenuPopup__Content">
                        <ul>
                            <li>Help</li>
                            <li @click="$modal.show('report-popup-modal')" class="redColor">Report Bugs</li>
                            <li @click="$modal.show('confirm-modal'),$modal.hide('profile-popup-modal') ">Keluar</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </modal>
</template>
<style scoped>
    * {
        margin: 0;
        text-align: left;
        list-style: none;
    }
    .nopadding {
        padding: 0;
    }
    .redColor:hover {
        color: #ec008c!important;
    }
    .profileMenuPopup__Header {
        height: 15px!important;
        background: #5fd063!important;
    }
    .profileMenuPopup__Content {
        border: none;
        background: #303232;

    }
    .profileMenuPopup__Content ul li {
        color: #dfe3e2;
    }
    .profileMenuPopup__Content ul li:hover {
        color: #5fd063;
    }
</style>
<script>
export default {
  data() {
      return {

      }
  }
}
</script>
