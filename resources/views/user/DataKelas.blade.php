@extends('user.Layout.Master')
@section('content')
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Data Kelas</h3>
        </div>
      </div>
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <a href="{{route('TambahDataKelas')}}" class="btn btn-success">
                <i class="fa fa-plus-circle"></i>
                Tambah Data
              </a>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <table id="datatable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama Kelas</th>
                    <th>Jumlah Mahasiswa</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($Kelas as $Index=>$DataKelas)
                    <tr>
                      <td>{{$Index+1}}</td>
                      <td>{{$DataKelas->namakelas}}</td>
                      <td>{{count($DataKelas->Mahasiswa)}}</td>
                      <td class="text-center">
                        <button class="btn-sm btn-info" onclick="redirect('{{route('EditDataKelas', ['id' => IDCrypt::Encrypt($DataKelas->id)])}}')">
                          <i class="fa fa-pencil"></i> Edit
                        </button>
                        <button class="btn-sm btn-danger" onclick="{{count($DataKelas->Mahasiswa) ? 'cant' : ''}}hapus('{{route('HapusDataKelas', ['id' => IDCrypt::Encrypt($DataKelas->id)])}}')">
                          <i class="fa fa-trash"></i> Hapus
                        </button>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
