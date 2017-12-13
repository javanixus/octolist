<template>
  <div>
    <div id="getStarted">
      <div class="wrapper-getStarted">
        <div class="GetStarted-profile">
          <div class="profile-head__avatar marginBottom-s">
            <div class="avatar avatar--xl avatar--glow marginMagic"><img alt="" class="avatar-img" src="/resources/assets/images/avatar0.jpg"></div>
          </div>
          <div class="marginTop-m getStarted__content">
            <input type="text" name="" placeholder="Masukkan nama lengkap" class="input--default borderRadius-m marginBottom-s">
            <input type="text" name="" placeholder="Masukkan password" class="input--default borderRadius-m marginBottom-s">
            <input type="text" name="" placeholder="Confirm password" class="input--default borderRadius-m marginBottom-s">
          </div>
        </div>
        <router-link :to="'/dashboard'"><button type="button" name="button" class="textAlignCenter button button-landing button--xl borderRadius-s button--melting-blue">Let's go</button></router-link>
      </div>
    </div>
  </div>
</template>
<style>

</style>
<script>
  export default {}
</script>
