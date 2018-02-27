<template>
  <div>
    <div class="content__header">
        <div class="header-menu">
          <div class="header-menu__right paddingRight-xxl">
            <div id="add-task" style="max-width: 300px;" @click="popupCreateProjectClickOpen()" class="button button-landing fontSize-s button--xl borderRadius-s button--melting-blue">
              Buat Tugas Baru
            </div>
          </div>
        </div>
      </div>
      <div class="content__items">
        <div class="project">
          <div class="project__header marginTop-m">
            <span>4 Projects Showed</span>
          </div>
          <div class="project__content">
            <div class="project project__teacher">
              <!-- awal item dynamic -->
              <div class="project-item project-item__teacher">
                  <div class="project-item__header">
                    <div class="project-item__extends">
                      <p>28 Feb 2018</p>
                    </div>
                    <div class="avatar avatar--l avatar-dp project-dp-id">
                      <img class="avatar-img" alt="" src="http://localhost:8000/images/gradient1.svg"/>
                    </div>
                  </div>
                  <div class="project-item__content project-item__content__teacher">
                    <h5>
                      Project umbrella
                    </h5>
                    <p class="project-status project-status__inactive">Inactive</p>
                    <div class="content-red content-red__teacher">
                      <div class="content-desc">
                        <div class="content-people content-people__teacher">
                          <img src="http://localhost:8000/images/kecil1.png" alt="" />
                          <img src="http://localhost:8000/images/kecil6.jpg" alt="" />
                          <img src="http://localhost:8000/images/kecil5.jpg" alt="" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="project-item__footer">
                    <div class="project-item__footer-items">
                         <router-link :to="'/board/p'"><span>Download project</span></router-link>
                    </div>
                  </div> 
              </div>
              <!-- awal item dynamic -->
              <div class="project-item project-item__teacher">
                  <div class="project-item__header">
                    <div class="project-item__extends">
                      <p>28 Feb 2018</p>
                    </div>
                    <div class="avatar avatar--l avatar-dp project-dp-id">
                      <img class="avatar-img" alt="" src="http://localhost:8000/images/gradient1.svg"/>
                    </div>
                  </div>
                  <div class="project-item__content project-item__content__teacher">
                    <h5>
                      Project umbrella
                    </h5>
                    <p class="project-status project-status__inactive">Inactive</p>
                    <div class="content-red content-red__teacher">
                      <div class="content-desc">
                        <div class="content-people content-people__teacher">
                          <img src="http://localhost:8000/images/kecil1.png" alt="" />
                          <img src="http://localhost:8000/images/kecil6.jpg" alt="" />
                          <img src="http://localhost:8000/images/kecil5.jpg" alt="" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="project-item__footer">
                    <div class="project-item__footer-items">
                         <router-link :to="'/board/p'"><span>Download project</span></router-link>
                    </div>
                  </div> 
              </div>
              <!-- akhir -->
              </div>
            </div>
          </div>
    </div>
  </div>
</template>
<style>

</style>
<style scoped>
</style>
