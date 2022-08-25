<template>
  <v-app :style="bgImage" class="bg-image">
    <v-content>
      <HelloWorld />
    </v-content>
  </v-app>
</template>

<script>
import HelloWorld from "./components/HelloWorld";

export default {
  name: "App",

  components: {
    HelloWorld
  },

  data: () => ({
    bgImage: {
      background:
        "url(" + require("@/assets/bg.jpg") + ") no-repeat center center fixed"
    }

    //
  })
};
</script>
<style>
.bg-image {
  height: 100%;
  overflow: hidden;
  background-size: cover !important;
}
</style>
