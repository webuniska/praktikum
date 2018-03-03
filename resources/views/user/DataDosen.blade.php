@extends('user.Layout.Master')
@section('content')
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Data Dosen</h3>
        </div>
      </div>
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <button onclick="redirect('{{route('TambahDataDosen')}}')" class="btn btn-success">
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
                      <th>Username</th>
                      <th>Nama</th>
                      <th>No. Telepon</th>
                      <th>Email</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($Dosen as $Index=>$DataDosen)
                      <tr>
                        <td>{{$Index+=1}}</td>
                        <td>{{$DataDosen->nomorinduk}}</td>
                        <td>{{$DataDosen->User->username}}</td>
                        <td>{{$DataDosen->nama}}</td>
                        <td>{{$DataDosen->nohp}}</td>
                        <td>{{$DataDosen->email}}</td>
                        <td>{{$DataDosen->status}}</td>

                        <td class="text-center">
                          <button class="btn-xs btn-primary" v-on:click="dosenJson({{$DataDosen->id}})" data-toggle="modal" data-target="#exampleModalCenter">
                            <i class="fa fa-info"></i> Info
                          </button>
                          <button class="btn-xs btn-info" onclick="redirect('{{route('EditDataDosen', ['Id' => IDCrypt::Encrypt($DataDosen->id)])}}')">
                            <i class="fa fa-pencil"></i> Edit
                          </button>
                          <button class="btn-xs btn-danger" onclick="{{$DataDosen->id == DataUser::DataUser(Auth::user())->id ? 'cant' : ''}}hapus('{{route('HapusDataDosen', ['Id' => IDCrypt::Encrypt($DataDosen->id)])}}')">
                            <i class="fa fa-trash"></i> Hapus
                          </button>
                        </td>
                      </tr>
                    @endforeach
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
          <h5 class="modal-title" id="exampleModalLongTitle" @click.right="Info()">Info Data Dosen</h5>
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
