<template>
  <button class="btn-xs btn-primary" @click="ubahstatusdosen(dosenid)"><i class="fa fa-exchange"></i>
    Ubah Status
  </button>
</template>

<script>
export default {
  props: ['dosenid', 'auth'],
  methods: {
    ubahstatusdosen(id){
      axios({
        method: 'get',
        url: '/api/ubah-status-dosen/'+id,
        headers: { Authorization: 'Bearer '+this.auth }
      }).then((response) => {
        axios({
          method: 'get',
          url: '/api/status-dosen',
          headers: { Authorization: 'Bearer '+this.auth }
        }).then((response) => {
          vm.statusDosen = response.data
        })
      })
    }
  }
}
</script>
