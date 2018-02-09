<template lang="html">
<div id="getStarted">
  <div class="wrapper-getStarted">
    <h1 class="textGradient">Hi.</h1>
    <p>Packing your Project with Octolist </p>
    <p class="getStarted-desc">Lets start your journey , click start.</p>
    <router-link :to="'/getstarted/hello'"><button type="button" name="button" class="textAlignCenter button button-landing button--xl borderRadius-s button--melting-blue">Let's start</button></router-link>
  </div>
  <svg style="
    position: absolute; right: 100px; bottom: 100px;" width="167px" height="274px" viewBox="0 0 167 374" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <title>getStarted-1</title>
    <desc>Created with Sketch.</desc>
    <defs>
        <rect id="path-1" x="35" y="0" width="98" height="204" rx="27"></rect>
        <rect id="path-3" x="0" y="122" width="167" height="252" rx="40"></rect>
    </defs>
    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <mask id="mask-2" fill="white">
            <use xlink:href="#path-1"></use>
        </mask>
        <rect stroke="#4E4F4F" stroke-width="12" x="41" y="6" width="86" height="192" rx="27"></rect>
        <mask id="mask-4" fill="white">
            <use xlink:href="#path-3"></use>
        </mask>
        <use id="Rectangle" fill="#E6FBFF" xlink:href="#path-3"></use>
        <rect id="Rectangle-2" fill="#D8ECF7" mask="url(#mask-4)" x="60" y="184" width="10" height="129" rx="5"></rect>
        <rect id="Rectangle-2" fill="#D8ECF7" mask="url(#mask-4)" x="97" y="184" width="10" height="129" rx="5"></rect>
        <rect id="Rectangle-3" fill="#D700FF" mask="url(#mask-4)" x="25" y="122" width="19" height="252"></rect>
        <rect id="Rectangle-3" fill="#D700FF" mask="url(#mask-4)" x="123" y="120" width="19" height="256"></rect>
    </g>
  </svg>
</div>
</template>
<script>
export default {
}
</script>

<style lang="css" scoped>
  p {
    color: white;
  }
  button {
    background-color: white;
    color: #1f2d3d;
  }

  button:active {
    background: #E6FBFF;
  }

  .textGradient{
    color: white;
  }
  .getStarted-desc{
    color: hsla(0,0%,100%,.6);
  }
  #getStarted {
      background-color: #7F6ADD;
  }
  .koper {
    width: auto;
    height: 120px;
    position: absolute;
  }
</style>
