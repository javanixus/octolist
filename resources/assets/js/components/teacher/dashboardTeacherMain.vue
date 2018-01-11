<template>
  <div class="teacherMainWrapper">
      <div class="studentProjectWrapper">
        <div class="studentProject">
          <div class="studentProject--item">
            <div class="studentProjectItem__Header">
              <div class="studentProjectHeaderMenu">
                <span>edit</span>
                <span>edit</span>
              </div>
            </div>
            <div class="studentProjectItem__Cover">
              <div class="studentProjectCircleCover" v-bind:style="{ 'backgroundImage': 'url(' + this.projectCover + ')' }">
              </div>
            </div>
            <div class="studentProjectItem__Title">
              <div class="studentProjectItemTitle">
                <h4>Project Manta</h4>
                <span>a web app it have ability to clone other web with a single click</span>
              </div>
            </div>
            <div class="studentProjectItemDetails">
    
            </div>
          </div>
          <!-- item list  -->
                    <div class="studentProject--item">
            <div class="studentProjectItem__Header">
              <div class="studentProjectHeaderMenu">
                <span>edit</span>
                <span>edit</span>
              </div>
            </div>
            <div class="studentProjectItem__Cover">
              <div class="studentProjectCircleCover" v-bind:style="{ 'backgroundImage': 'url(' + this.projectCover1 + ')' }">
              </div>
            </div>
            <div class="studentProjectItem__Title">
              <div class="studentProjectItemTitle">
                <h4>Project Prism</h4>
                <span>a progressive web app with beatifull design</span>
              </div>
            </div>
            <div class="studentProjectItemDetails">
    
            </div>
          </div>
          <!-- item list  -->
          <div class="studentProject--item">
            <div class="studentProjectItem__Header">
              <div class="studentProjectHeaderMenu">
                <span>edit</span>
                <span>edit</span>
              </div>
            </div>
            <div class="studentProjectItem__Cover">
              <div class="studentProjectCircleCover" v-bind:style="{ 'backgroundImage': 'url(' + this.projectCover2 + ')' }">
              </div>
            </div>
            <div class="studentProjectItem__Title">
              <div class="studentProjectItemTitle">
                <h4>Animate Design</h4>
                <span>a web app it have ability to clone other web with a single click</span>
              </div>
            </div>
            <div class="studentProjectItemDetails">
    
            </div>
          </div>
                    <!-- item list  -->
          <div class="studentProject--item">
            <div class="studentProjectItem__Header">
              <div class="studentProjectHeaderMenu">
                <span>edit</span>
                <span>edit</span>
              </div>
            </div>
            <div class="studentProjectItem__Cover">
              <div class="studentProjectCircleCover" v-bind:style="{ 'backgroundImage': 'url(' + this.projectCover3 + ')' }">
              </div>
            </div>
            <div class="studentProjectItem__Title">
              <div class="studentProjectItemTitle">
                <h4>Project Manta</h4>
                <span>a web app it have ability to clone other web with a single click</span>
              </div>
            </div>
            <div class="studentProjectItemDetails">
    
            </div>
          </div>
                    <!-- item list  -->
          <div class="studentProject--item">
            <div class="studentProjectItem__Header">
              <div class="studentProjectHeaderMenu">
                <span>edit</span>
                <span>edit</span>
              </div>
            </div>
            <div class="studentProjectItem__Cover">
              <div class="studentProjectCircleCover" v-bind:style="{ 'backgroundImage': 'url(' + this.projectCover4 + ')' }">
              </div>
            </div>
            <div class="studentProjectItem__Title">
              <div class="studentProjectItemTitle">
                <h4>Project Manta</h4>
                <span>a web app it have ability to clone other web with a single click</span>
              </div>
            </div>
            <div class="studentProjectItemDetails">
    
            </div>
          </div>
        </div>
      </div>
  </div>
</template>
<style>

</style>
<script>
export default {
  data(){
    return {
      projectCover: 'images/avatar0.jpg',
      projectCover1: 'images/prism.png',
      projectCover2: 'images/gradient1.svg',
      projectCover3: 'images/love.png',
      projectCover4: 'images/plants.png',
    }
  }
}
</script>
