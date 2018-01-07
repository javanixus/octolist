<template>
  <div class="project-item">
    <div class="project-item__header">
      <span class="overlay-dark">
        <a href="javascript:void(0)">
          <img class="icon" src="images/edit.svg" alt="" />
        </a>
      </span>
      <img src="images/dragon-girl.png" alt="" />
    </div>
    <div class="project-item__content">
      <h5>
        Typography Culture
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
        <span>Open project</span>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ['pj'],
  data(){
    return {

    }
  }
};
</script>