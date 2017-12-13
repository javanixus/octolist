<template>
  <div :class="$style.BgWhite">
    <div class="wrapper-nothingpage">
      <div class="container-nothingpage">
        <div class="container-nothingpage__title">
          <div class="wrapper-nothingpage-bigtitle marginBottom-xl">
            <h1 class="bigtitle1">404</h1>
            <h1 class="bigtitle2">404</h1>
            <h1 class="bigtitle3">404</h1>
          </div>
          <span>Oops. The page you were looking for doesn't exist.</span>
          <p>if you found something strange on this page.</p>
        </div>
        <div class="container-nothingpage__content marginBottom-s">
          <div class="wrapper-nothingpage-input">
            <input type="text" class="borderRadius-m" name="" value="" placeholder="Search the missing page">
          </div>
        </div>
        <p style="color: #62676d;" class="marginBottom-l">or</p>
        <router-link v-bind:to="'/'" >
          <a class="button button-landing button--xl borderRadius-s button--melting-blue">
              Take me home
          </a>
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
export default {
}
</script>

<style lang="css" module>
.BgWhite {
  background: white!important;
  height: 100vh;
}
</style>
