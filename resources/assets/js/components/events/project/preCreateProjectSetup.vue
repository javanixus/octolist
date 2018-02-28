<template>
    <modal name="pre-project-setup-modal" :classes="['v--modal', 'error-modal']" :pivot-y="0.5" height="auto" transition="nice-modal-fade" width="50%" :clickToClose="false" :scrollable="true" :reset="true">
        <div class="preSetup">
            <h4>Buat project</h4>
            <p>Nama project</p>
            <input type="text" class="input--default input--default-full input-text fontSize-s" v-model="project.project_title" placeholder="ex: Project Umbrella">
            <p>Deskripsi project</p>
            <textarea name="create.project.desc" id="create.project.desc.pro" v-model="project.desc" class="editableWrapper"/>
            <div class="createProjectModal-footer modifyFooter">
                <div class="button button-landing button--xl borderRadius-s button--melting-blue red-bg" @click="$modal.hide('pre-project-setup-modal')">Batalkan</div>
                <div class="button button-landing button--xl borderRadius-s button--melting-blue" @click.prevent="createProject">Buat project</div>
            </div>
        </div>
    </modal>
</template>
<style scoped>
    .modifyFooter {
        display: inline-flex;
        padding-top: 15px;
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
import axios from 'axios';
import store from './../../../store/index';
import router from './../../../router';

export default {
    data(){
        return {
            project: {
                project_title: '',
                desc: '',
            }
        }
    },
    methods:{
        createProject(){
            axios.post('http://localhost:8000/api/v1/project/create', this.project , {
                headers: {
                    "Authorization": `Bearer ${window.localStorage.getItem('token')}`
                }
            }).then((response) => {
                console.log(response)
                router.go('/board')
            }).catch((error) =>{
                console.log(error.response.data)
            })
        }
    }
}
</script>
