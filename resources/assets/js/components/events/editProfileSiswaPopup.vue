<template>
    <modal name="editprofile-siswa-popup-modal" :classes="['v--modal', 'error-modal']" :pivot-y="0.5" transition="nice-mo dal-fade" :min-width="500" :min-height="200" :adaptive="true" :reset="true" width="20%" height="auto" :clickToClose="false">
        <div class="createProjectModal-wrapper">
            <div class="createProjectModal-content nopadding">
                <div class="profileMenuPopupWrapper">
                    <form action="POST">
                        <div class="editProfileSiswaMenuPopup__Header">
                            <avatar-upload field="img" v-model="show" :width="300" langType="en" :height="300" url="https://httpbin.org/post" :params="paramAvatar" img-format="jpg"></avatar-upload>
                            <img @click="toggleShow" style="cursor: pointer" :src="imgDataUrl">
                        </div>
                        <div class="profileMenuPopup__Content">
    
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </modal>
</template>

<style>
    
</style>

<script>
    import avatarUpload from 'vue-image-crop-upload';
    
    export default {
        data() {
            return {
                en: {
                    hint: 'Click or drag the file here to upload',
                    loading: 'Uploading…',
                    noSupported: 'Browser is not supported, please use IE10+ or other browsers',
                    success: 'Upload success',
                    fail: 'Upload failed',
                    preview: 'Preview',
                    btn: {
                        off: 'Cancel',
                        close: 'Close',
                        back: 'Back',
                        save: 'Save'
                    },
                    error: {
                        onlyImg: 'Image only',
                        outOfSize: 'Image exceeds size limit: ',
                        lowestPx: 'Image\'s size is too low. Expected at least: '
                    }
                },
                paramAvatar: {
                    token: window.localStorage.getItem('token'),
                },
                imgDataUrl: '/images/avatar0.jpg',
                show: false
            }
        },
        components: {
            'avatar-upload': avatarUpload
        },
        methods: {
            toggleShow() {
				this.show = !this.show;
			},
        }
    }
</script>
