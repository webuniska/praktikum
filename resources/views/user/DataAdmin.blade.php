@extends('user.Layout.Master')
@section('content')
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Data Admin</h3>
        </div>
      </div>
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <button onclick="redirect('{{route('TambahDataAdmin')}}')" class="btn btn-success">
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
                    @foreach ($Admin as $Index=>$DataAdmin)
                      <tr>
                        <td>{{$Index+=1}}</td>
                        <td>{{$DataAdmin->nomorinduk}}</td>
                        <td>{{$DataAdmin->nama}}</td>
                        <td>{{$DataAdmin->User->username}}</td>
                        <td class="text-center">
                          <button class="btn-xs btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                            <i class="fa fa-info"></i> Info
                          </button>
                          <button class="btn-xs btn-info" onclick="redirect('{{route('EditDataAdmin', ['Id' => IDCrypt::Encrypt($DataAdmin->id)])}}')">
                            <i class="fa fa-pencil"></i> Edit
                          </button>
                          <button class="btn-xs btn-danger" onclick="{{$DataAdmin->id == DataUser::DataUser(Auth::user())->id ? 'cant' : ''}}hapus('{{route('HapusDataAdmin', ['Id' => IDCrypt::Encrypt($DataAdmin->id)])}}')">
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
@endsection
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Info Data Admin</h5>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning">
          <i class="fa fa-close"></i>
          Tutup
        </button>
      </div>
    </div>
  </div>
</div>
