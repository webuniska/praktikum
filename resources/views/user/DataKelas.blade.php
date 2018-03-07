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
              <button-header
                :status="status"
              ></button-header>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div v-if="status == 0" v-cloak>
                <form-kelas
                  urlform = {{ route('TambahDataKelas') }}
                  token = {{ csrf_token() }}
                  :datavalue = "datavalue"
                  v-if="formstatus == 'create'"
                ></form-kelas>
                <form-kelas
                  :urlform = "urlform"
                  token = {{ csrf_token() }}
                  :datavalue = "datavalue"
                  v-else
                ></form-kelas>
              </div>
              <div v-if="status == 1">
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
                          <button-edit
                            auth = {{Auth::user()->api_token}}
                            tabel = "kelas"
                            iddata = {{ IDCrypt::Encrypt($DataKelas->id) }}
                            url = {{ route('EditDataKelas', ['id' => IDCrypt::Encrypt($DataKelas->id)]) }}
                          ></button-edit>
                          <button-hapus
                            url = "{{route('HapusDataKelas', ['id' => IDCrypt::Encrypt($DataKelas->id)])}}"
                            jumlahrelasi = {{count($DataKelas->Mahasiswa)}}
                          ></button-hapus>
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
  </div>
@endsection
