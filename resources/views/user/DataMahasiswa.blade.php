@extends('user.Layout.Master')
@section('content')
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Data Mahasiswa</h3>
        </div>
      </div>
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <button onclick="redirect('{{route('TambahDataMahasiswa')}}')" class="btn btn-success">
                <i class="fa fa-plus-circle"></i>
                Tambah Data
              </button>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <table id="datatable" class="table table-striped table-bordered">
                <div style="overflow-x: auto; overflow-y: auto;">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>No .Induk</th>
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>

                      <tr>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td class="text-center">
                          <button class="btn-xs btn-primary" onclick="">
                            <i class="fa fa-info"></i> Info
                          </button>
                          <button class="btn-xs btn-info" onclick=" ">
                            <i class="fa fa-pencil"></i> Edit
                          </button>
                          <button class="btn-xs btn-danger" onclick=" ">
                            <i class="fa fa-trash"></i> Hapus
                          </button>
                        </td>
                      </tr>

                  </tbody>
                </div>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle" @click.right="Info()">Info Data Mahasiswa</h5>
        </div>
        <div class="modal-body">
          <div class="text-center">
            <img :src="foto" alt="01-01-2011" class="img-circle profile_img modal_img">
          </div>
          <table class="table table-info">
            <tr>
              <td>Nomor Induk</td>
              <td>@{{nomorinduk}}</td>
            </tr>
            <tr>
              <td>Nama</td>
              <td>@{{nama}}</td>
            </tr>
            <tr>
              <td>Nomor Telepon</td>
              <td>@{{nohp}}</td>
            </tr>
            <tr>
              <td>E-Mail</td>
              <td>@{{email}}</td>
            </tr>
            <tr>
              <td>Username</td>
              <td>@{{username}}</td>
            </tr>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">
            <i class="fa fa-close"></i>
            Tutup
          </button>
        </div>
      </div>
    </div>
  </div>
@endsection
