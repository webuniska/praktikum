<template>
  <span class="badge bg-green" v-if="this.status == 1">Aktif</span>
  <span class="badge bg-red" v-else>Non-Aktif</span>
</template>

<script>
export default {
  props: ['status'],
  data: function(){
    return {
      datastatus: '',
    }
  },
  mounted() {
    
  }
}
</script>
