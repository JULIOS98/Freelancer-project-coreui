<template>
  <div id="app">
      @yield('contenido2')
  </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component Dashboard.')
        }
    }
</script>
