@extends('user.Layout.Master')
@section('content')
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Data Materi Periode {{count($Periode) ? $Periode->namaperiode : '-'}}</h3>
        </div>
      </div>
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <button onclick="redirect('{{route('TambahDataMateriPeriode')}}')" class="btn btn-success" {{count($Periode) ? '' : 'disabled'}}>
                <i class="fa fa-plus-circle"></i>
                Tambah Materi
              </button>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <table id="datatable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Kode Materi</th>
                    <th>Nama Materi</th>
                    <th>Semester Minimal</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($MateriPeriode as $Index=>$DataMateriPeriode)
                    <tr>
                      <td>{{$Index+=1}}</td>
                      <td>{{$DataMateriPeriode->MateriPraktikum->kodemateri}}</td>
                      <td>{{$DataMateriPeriode->MateriPraktikum->namamateri}}</td>
                      <td>{{$DataMateriPeriode->MateriPraktikum->semesterminimal}}</td>
                      <td class="text-center">
                        <button class="btn-xs btn-warning" onclick="statusmateriperiode('{{IDCrypt::Encrypt($DataMateriPeriode->MateriPraktikum->id)}}','DataMateriPeriode')">
                          <i class="fa fa-minus-circle"></i> Hapus
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
