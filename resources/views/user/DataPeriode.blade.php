@extends('user.Layout.Master')
@section('content')
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Data Periode</h3>
        </div>
      </div>
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <button onclick="redirect('{{route('TambahDataPeriode')}}')" class="btn btn-success">
                <i class="fa fa-plus-circle"></i>
                Tambah Data
              </button>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <table id="datatable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama Periode</th>
                    <th>Tanggal Buka</th>
                    <th>Tanggal Tutup</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($Periode as $Index=>$DataPeriode)
                    <tr>
                      <td>{{$Index+=1}}</td>
                      <td>{{$DataPeriode->namaperiode}}</td>
                      <td>{{Tanggal::Output($DataPeriode->tanggalbuka)}}</td>
                      <td>{{Tanggal::Output($DataPeriode->tanggaltutup)}}</td>
                      <td class="text-center">
                        @if ($DataPeriode->status)
                          @if ($DataPeriode->tanggaltutup < Carbon::now())
                            <span class="label label-warning">Aktif</span>
                          @else
                            <span class="label label-success">Aktif</span>
                          @endif
                        @else
                          <span class="label label-danger">Non-Aktif</span>
                        @endif
                      </td>
                      <td class="text-center">
                        <button class="btn-xs btn-info" onclick="redirect('{{route('EditDataPeriode', ['id' => IDCrypt::Encrypt($DataPeriode->id)])}}')">
                          <i class="fa fa-pencil"></i> Edit
                        </button>
                        <button class="btn-xs btn-primary" onclick="ubahstatusperiode('{{IDCrypt::Encrypt($DataPeriode->id)}}')">
                          <i class="fa fa-exchange"></i> Ubah Status
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
