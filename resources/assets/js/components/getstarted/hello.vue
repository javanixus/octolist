<template lang="html">
  <div id="getStarted">
    <div class="wrapper-getStarted">
      <div class="GetStarted-illustration borderRadius-circle">
      </div>

      <h1 class="textGradient">Hi.</h1>
      <p>Organize your project easily</p>
      <p class="getStarted-desc">Lets start your journey , click start.</p>
      <router-link :to="'/getstarted/profile-setup'">
      <button type="button" name="button" class="textAlignCenter button button-landing button--xl borderRadius-s button--melting-blue">Next step</button>
      </router-link>
    </div>
  </div>
</template>

<script>
export default {
}
</script>

<style lang="css">
</style>
