@extends('user.Layout.Master')
@section('content')
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Data Materi Praktikum</h3>
        </div>
      </div>
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <button onclick="redirect('{{route('DataMateriPeriode')}}')" class="btn btn-success">
                <i class="fa fa-arrow-circle-left"></i>
                Kembali
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
                  @foreach ($MateriPraktikum as $Index=>$DataMateriPraktikum)
                    <tr>
                      <td>{{$Index+=1}}</td>
                      <td>{{$DataMateriPraktikum->kodemateri}}</td>
                      <td>{{$DataMateriPraktikum->namamateri}}</td>
                      <td>{{$DataMateriPraktikum->semesterminimal}}</td>
                      <td class="text-center">
                        @if (ArrayHelper::SearchValue($AddedIdMateriPeriode, $DataMateriPraktikum->id))
                          <button class="btn-xs btn-warning" onclick="statusmateriperiode('{{IDCrypt::Encrypt($DataMateriPraktikum->id)}}','TambahDataMateriPeriode')">
                            <i class="fa fa-minus-circle"></i> Hapus
                          </button>
                        @else
                          <button class="btn-xs btn-info" onclick="statusmateriperiode('{{IDCrypt::Encrypt($DataMateriPraktikum->id)}}','TambahDataMateriPeriode')">
                            <i class="fa fa-plus-circle"></i> Tambah
                          </button>
                        @endif
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
