<template>
  <button class="btn-xs btn-danger" @click="hapus(url, jumlahrelasi)">
    <i class="fa fa-trash"></i> Hapus
  </button>
</template>

<script>
export default {
  props: ['url', 'jumlahrelasi'],
  methods: {
    hapus(url, jumlahrelasi){
      if (jumlahrelasi > 0) {
        swal({
          title: 'Hapus',
          text: 'Data Tidak dapat di Hapus',
          icon: 'warning',
          button: "OK",
        });
      }else{
        swal({
          title   : "Ubah Status",
          text    : "Yakin Ingin Menghapus Data?",
          icon    : "warning",
          buttons : [
            "Tidak",
            "Iya",
          ],
        })
        .then((hapus) => {
          if (hapus) {
            window.location = url;
          } else {
            swal({
              title  : "Batal",
              text   : "Batal Menghapus Data",
              icon   : "info",
              timer  : 2500,
            })
          }
        });
      }
    }
  }
}
</script>
