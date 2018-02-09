<template>
    <modal name="editprofile-siswa-popup-modal" :classes="['v--modal', 'error-modal']" :pivot-y="0.5" transition="nice-modal-fade" :min-width="500" :min-height="200" :adaptive="true" :reset="true" width="20%" height="auto" :scrollable="true" :clickToClose="false">
        <div class="createProjectModal-wrapper">
            <div class="createProjectModal-content nopadding">
                <div class="profileMenuPopupWrapper">
                    <form action="POST">
                        <div class="editProfileSiswaMenuPopup__Header">
                            <avatar-upload field="avatar" v-model="show" :width="300" langType="en" :height="300" url="http://localhost:8000/api/v1/user/6" :params="paramAvatar" :headers="headerToken" img-format="jpg"></avatar-upload>
                            <img @click="toggleShow" style="cursor: pointer" :src="imgDataUrl">
                        </div>
                        <div class="profileMenuPopup__Content">
                            <div class="createProjectForm">
                                <p>Nama Lengkap</p>
                                <input type="text" v-validate="'required'" :class="{'input-nofill': true, 'input--danger': errors.has('nama-lengkap') }" v-model="dataUser.name" class="input-nofill input-text fontSize-s" name="nama-lengkap" placeholder="Nama lengkap">
                                <span style="font-size: 12px; color: red;" v-if="errors.has('nama-lengkap')">
                                    {{ errors.first('nama-lengkap') }}
                                </span>
                                <p>Bio</p>
                                <editable :content="dataUser.bio" class="editableWrapper" />
                                <p>Email</p>
                                <input type="text" v-validate="'required|email'" :class="{'input-nofill': true, 'input--danger': errors.has('email') }" v-model="dataUser.email" class="input-nofill input-text fontSize-s" placeholder="lorem@ipsum.com" name="email">
                                <span style="font-size: 12px; color: red;" v-if="errors.has('email')">
                                    {{ errors.first('email') }}
                                </span>
                                <p>Phone</p>
                                <input type="text" v-validate="'required|digits:12'" :class="{'input-nofill': true, 'input--danger': errors.has('phone') }" v-model="dataUser.phone" class="input-nofill input-text fontSize-s" placeholder="081666666" name="phone">
                                <span style="font-size: 12px; color: red;" v-if="errors.has('phone')">
                                    {{ errors.first('phone') }}
                                </span>
                                <p>Confirmasi password</p>
                                <input type="password" v-validate="'required'" :class="{'input-nofill': true, 'input--danger': errors.has('konfirmasi-password') }" v-model="dataUser.codes" class="input-nofill input-text fontSize-s" name="konfirmasi-password" placeholder="Konfirmasi Password">
                                <span style="font-size: 12px; color: red;" v-if="errors.has('konfirmasi-password')">
                                    {{ errors.first('konfirmasi-password') }}
                                </span>
                            </div>
                            <div class="createProjectModal-footer modifyFooter">
                                <div class="button button-landing button--xl borderRadius-s button--melting-blue red-bg" @click="$modal.hide('editprofile-siswa-popup-modal')">Batalkan</div>
                                <button :disabled="!editProfileIsPassed" @click.prevent="editProfileAuth" class="button button-landing button--xl borderRadius-s button--melting-blue green-bg">Update profile</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </modal>
</template>

<style scoped>
    .profileMenuPopup__Content {
        padding: 15px;
    }

    .v--modal-overlay.scrollable {
        padding: 10px 0;
    }

    .modifyFooter {
        display: inline-flex;
        align-items: center;
        justify-content: flex-end;
        padding-top: 15px;
    }

    .button--xl {
        max-width: 200px!important;
        max-height: 50px!important;
        margin-right: 15px;
        font-size: 14px;
    }

    .red-bg {
        background: #ec008c;
    }
    .createProjectForm p {
        font-size: 14px;
        text-align: left;
        margin: 8px 0;
    }
    .createProjectModal-footer button {
        width: auto;
        padding: 10px 20px;
    }
</style>

<script>
    import avatarUpload from 'vue-image-crop-upload'
    import editor from 'vue2-medium-editor'
    import axios from 'axios'
    import router from './../../router'

    export default {
        beforeCreate(){
            const key_id = window.localStorage.getItem('key');
            // decrypt phase //
            const becrypt_slice_one = key_id.slice(7);
            const becrypt_zero = becrypt_slice_one / 100101010;
            const becrypt_pharse = becrypt_zero / 8084334125;
            // end decrypt //
            axios.get('http://localhost:8000/api/v1/user/' + becrypt_pharse , {
                headers: {
                    "Authorization": `Bearer ${window.localStorage.getItem('token')}`,
                }
            })
            .then((response) => {
                this.dataUser = response.data.data
                console.log(response);
            })
        },
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
                        lowestPx: 'Image\'s size is too low. Expected at least:'
                    }
                },
                paramAvatar: {
                    token: window.localStorage.getItem('token'),
                },
                headerToken: {
                    Authorization: 'Bearer ' + window.localStorage.getItem('token'),
                },
                imgDataUrl: '/spoiler/avatar0.jpg',
                show: false,
                dataUser: []
            }
        },
        components: {
            'avatar-upload': avatarUpload,
            'editable': {
                template: '<div contenteditable="true" placeholder="isi deskripsi..." style="font-size: 14px; font-weight: lighter; overflow: hidden;"></div>'
            },
        },
        methods: {
            toggleShow() {
                this.show = !this.show;
            },
            editProfileAuth() {
                const key_id_patch = window.localStorage.getItem('key');
                // decrypt //
                const becrypt_slice_one = key_id_patch.slice(7);
                const becrypt_zero = becrypt_slice_one / 100101010;
                const becrypt_pharse = becrypt_zero / 8084334125;
                // end decrypt //
                axios.patch('http://localhost:8000/api/v1/user/' + becrypt_pharse , this.dataUser, {
                    headers: {
                        "Authorization": `Bearer ${window.localStorage.getItem('token')}`,
                    }
                })
                .then((response) => {
                    router.go('/profile')
                    this.dataUser = response.data.data;
                 })
            }
        },
        computed: {
            editProfileIsPassed(){
                return this.dataUser.name && this.dataUser.phone && this.dataUser.email && this.dataUser.codes;
            }
        }
    }
</script>
