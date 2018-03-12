<template>
  <form class="form-horizontal" :action="urlform" method="POST">
    <input type="hidden" name="_token" id="csrf-token" :value="token">
    <div class="form-group">
      <label class="control-label col-md-2 col-sm-2 col-xs-12">
        Nama Kelas
      </label>
      <div class="col-md-9 col-sm-9 col-xs-12">
        <input type="text" class="form-control col-md-12 col-xs-12" name="namakelas" :value="datavalue.namakelas" required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-12 col-sm-12 col-xs-12 text-center">
        <button type="submit" class="btn btn-success">Submit</button>
        <button type="submit" class="btn btn-danger">Batal</button>
      </div>
    </div>
  </form>
</template>

<script>
export default {
  props: ['urlform', 'token', 'datavalue'],
  methods: {
    ubahstatus() {
      if (vm.status) {
        vm.status = 0
      }else{
        vm.status = 1
      }
    }
  },
}
</script>
