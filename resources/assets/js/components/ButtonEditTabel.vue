<template>
  <button class="btn-xs btn-info" @click="edit(url, tabel, iddata)">
    <i class="fa fa-pencil"></i> Edit
  </button>
</template>

<script>
export default {
  props: ['url', 'tabel', 'iddata', 'auth'],
  methods: {
    edit(url, tabel, iddata){
      axios({
        method: 'get',
        url: '/api/'+tabel+'/'+iddata,
        headers: { Authorization: 'Bearer '+this.auth }
      }).then((response) => {
        vm.datavalue = response.data
        vm.status = 0
        vm.formstatus = 'edit'
        vm.urlform = this.url
      })
    }
  }
}
</script>
