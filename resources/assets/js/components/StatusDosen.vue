<template>
  <span class="badge bg-green" v-if="statusdosen[dosenid] == 1">Aktif</span>
  <span class="badge bg-red" v-else>Non-Aktif</span>
</template>

<script>
export default {
  props: ['statusdosen', 'auth', 'dosenid'],
  created() {
    axios({
      method: 'get',
      url: '/api/status-dosen',
      headers: { Authorization: 'Bearer '+this.auth }
    }).then((response) => {
      vm.statusDosen = response.data
    })
  }
}
</script>
