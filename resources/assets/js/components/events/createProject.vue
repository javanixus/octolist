<template>
    <modal name="create-project-modal" :classes="['v--modal', 'error-modal']" :pivot-y="0.5" transition="nice-modal-fade" :min-width="300" :min-height="200" :adaptive="true" :scrollable="true" :reset="true" height="auto" :clickToClose="false">
        <div class="createProjectModal-wrapper">
            <div class="createProjectModal-content">
                <form>
                    <div class="createProjectForm">
                        <p>Nama project</p>
                        <input type="text" v-model="createProjectFormInput.projectNameForm" class="input-nofill input-text fontSize-s" placeholder="ex: Project Umbrella">
                        <p>Deskripsi project</p>
                        <textarea name="create.project.desc" id="create.project.desc.pro" class="editableWrapper" v-model="createProjectFormInput.projectDescForm"/>
                        <p>Tambah anggota</p>
                        <v-select multiple :debounce="250" :on-search="getOptions" :options="options" label="name" v-model="selected"></v-select>
                    </div>
                </form>
                <div class="createProjectModal-footer modifyFooter">
                    <div class="button button-landing button--xl borderRadius-s button--melting-blue red-bg" @click="$modal.hide('create-project-modal')">Batalkan</div>
                    <div class="button button-landing button--xl borderRadius-s button--melting-blue" @click.prevent="createProject" :disabled="!createProjectIsPassed">Buat project</div>
                </div>
            </div>
        </div>
    </modal>
</template>

<style scoped>
    .v--modal-overlay {
        background: rgba(0, 0, 0, 0.6);
    }
    .createProjectForm {
        padding: 15px 0;
    }
    .createProjectModal-content {
        padding: 15px;
    }
    .createProjectForm p {
        font-size: 14px;
        text-align: left;
        margin: 8px 0;
    }

    .modifyFooter {
        display: inline-flex;
        align-items: center;
        justify-content: flex-end;
    }

    .button--xl {
        max-width: 200px!important;
        max-height: 50px!important;
        margin-left: 15px;
        font-size: 14px;
    }
</style>

<script>
    import vue2Dropzone from 'vue2-dropzone'
    import 'vue2-dropzone/dist/vue2Dropzone.css'
    import axios from 'axios'
    import vSelect from 'vue-select'
    import router from './../../router'

    export default {
        data() {
            return {
                createProjectFormInput: {
                    projectNameForm: '',
                    projectDescForm: '',
                    projectMemberForm: ''
                },
                dropzoneOptions: {
                    url: 'https://httpbin.org/post',
                    addRemoveLinks: true,
                    thumbnailWidth: 150,
                    maxFilesize: 0.5,
                    dictDefaultMessage: "Drag or click to upload cover",
                    maxFiles: 1,
                    parallelUploads: 1,
                    headers: {
                        "Authorization": `Bearer ${window.localStorage.getItem('token')}`
                    }
                },
                options: [],
                selected: null,
            }
        },
        components: {
            'vue-dropzone': vue2Dropzone,
            'v-select': vSelect,
        },
        methods: {
            getOptions(search) {
                axios.get('http://localhost:8000/api/v1/users', {
                    params: {
                        q: search
                    },
                    headers: {
                        "Authorization": `Bearer ${window.localStorage.getItem('token')}`,
                    },
                }).then(response => {
                    this.options = response.data.students
                    console.log(response.data.students)
                    loading(false)
                })
            },
            createProject() {
                axios.post('http://localhost:8000/api/v1/project/create', this.createProjectFormInput)
                    .then((response) => {
                        router.push('/board')
                        if (router.push('/board') === false) {
                            // add behavior here
                        }
                    })
            }
        },
        computed: {
            createProjectIsPassed() {
                return this.createProjectFormInput.projectNameForm && this.createProjectFormInput.projectDescForm && this.createProjectFormInput.projectMemberForm;
            }
        },
        props: ['content'],
    }
</script>
