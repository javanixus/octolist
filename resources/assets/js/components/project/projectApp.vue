<template>
  <div class="projectApp">
    <div class="project-item">
      <div class="project-item__header">
          <progressive-img src="images/projectsample.jpg"
            placeholder="images/projectsample2x.jpg"
            :blur="30"
            :delay="2000"
            alt="" />
      </div>
      <div class="project-item__content">
        <h5>
          {{ prog.project_title }}
        </h5>
      <div class="content-red">
        <div class="content-desc">
            <div class="content-people">
                <img src="images/kecil1.png" alt="" />
                    <img src="images/kecil6.jpg" alt="" />
                <img src="images/kecil5.jpg" alt="" />
            </div>
        </div>
      </div>
    </div>
    <div class="project-item__footer">
      <div class="project-item__footer-items">
          <router-link :to="'/board/p'"><span>Open project</span></router-link>
      </div>
    </div>      
  </div>
  </div>
</template>
<style scoped>
.project-item__header{
  padding: 0;
}
</style>
<script>
export default {
  props: ['prog']
}
</script>
