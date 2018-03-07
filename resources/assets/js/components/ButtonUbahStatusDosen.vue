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
      swal({
        title   : "Ubah Status Dosen",
        text    : "Yakin Ingin Mengubah Status Dosen?",
        icon    : "info",
        buttons : [
          "Tidak",
          "Iya",
        ],
      })
      .then((hapus) => {
        if (hapus) {
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
        } else {
          swal({
            title  : "Batal",
            text   : "Batal Mengubah Status Dosen",
            icon   : "info",
            timer  : 2500,
          })
        }
      });
    }
  }
}
</script>
