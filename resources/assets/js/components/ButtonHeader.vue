<template>
  <button class="btn btn-success" v-if="status" @click="ubahstatus">
    <i class="fa fa-plus-circle"></i>
    Tambah Data
  </button>
  <button class="btn btn-info" v-else @click="ubahstatus">
    <i class="fa fa-arrow-circle-left"></i>
    Kembali
  </button>
</template>

<script>
export default {
  props: ['status'],
  methods: {
    ubahstatus() {
      if (vm.status) {
        vm.status = 0
        vm.datavalue = ''
      }else{
        vm.status = 1
      }
      vm.formstatus = 'create'
    }
  },
}
</script>
