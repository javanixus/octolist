<template>
    <div id="precreate">
    <precreate-project-setup /> 
    <modal name="pre-project-modal" :classes="['v--modal']" :pivot-y="0.5" transition="nice-modal-fade" :min-width="700" :min-height="200" :adaptive="true" :scrollable="true" :reset="true" height="auto" :clickToClose="true"> 
      <div class="preProject__Container">
          <div class="preProjectTitle">
              <h4>Pilih tipe project</h4>
          </div>
          <div class="preProjectList">
              <div class="preProjectList__item">
                  <div class="preProjectItem__header">
                      <img src="/images/public.svg" alt="">
                  </div>
                  <div class="preProjectItem__content">
                      <h3>Publik</h3>
                      <p>Project bisa diakses siapa saja, tetapi modifikasi butuh persutujuan anda</p>
                      <button style="bottom: -50px;" disabled class="button button-landing fontSize-s button--xl borderRadius-s button--melting-blue">Coming soon</button>
                  </div>                  
              </div>
              <div class="preProjectList__item">
                  <div class="preProjectItem__header">
                      <img src="/images/private.svg" alt="">
                  </div>
                  <div class="preProjectItem__content">
                      <h3>Privat</h3>
                      <p>Project tidak bisa diakses oleh siapapun kecuali anda</p>
                      <button style="bottom: -65px;" disabled class="button button-landing fontSize-s button--xl borderRadius-s button--melting-blue">Coming soon</button>
                  </div>                  
              </div>
              <div class="preProjectList__item">
                  <div class="preProjectItem__header">
                      <img src="/images/mentor.svg" alt="">
                  </div>
                  <div class="preProjectItem__content">
                        <h3>Mentor</h3>
                        <p>Project bisa diakses dan dimodifikasi oleh anggota tim, mentor hanya bisa mengakses saja</p>
                        <button @click.prevent="createProject" class="button button-landing fontSize-s button--xl borderRadius-s button--melting-blue">Buat project</button>   
                  </div>                                    
              </div>
          </div>
      </div>
    </modal>
    </div>
</template>
<style scoped>

</style>
<script>
import preCreateProjectSetup from './preCreateProjectSetup';

export default {
  methods: {
      createProject(){
        this.$nextTick(() => {
            this.$modal.hide('pre-project-modal');
            this.$modal.show('pre-project-setup-modal');
        })        
      }
  },
  components: {
      'precreate-project-setup': preCreateProjectSetup,
  }
}
</script>
