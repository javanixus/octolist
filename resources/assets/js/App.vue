<template>
  <div id="app">
    <router-view/>
    <vue-topprogress ref="topProgress"></vue-topprogress>
  </div>
</template>

<script>
  import { mapState } from 'vuex'
  import { vueTopprogress } from 'vue-top-progress'

  export default {
    mounted () {
      this.$refs.topProgress.start(),
      this.$store.commit('SET_TITLE', 'Hello Laravel, Vue, and Vuex')
      // Use setTimeout for demo
      setTimeout(() => {
        this.$refs.topProgress.done()
      }, 2000)
    },
    components: {
      vueTopprogress
    },
    computed: mapState({
      // read state from store
      title: state => state.title
    }),
  }
</script>

<style>
</style>
