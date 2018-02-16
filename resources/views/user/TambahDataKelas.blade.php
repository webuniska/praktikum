@extends('user.Layout.Master')
@section('content')
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Tambah Data Kelas</h3>
        </div>
      </div>
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <a href="{{route('DataKelas')}}" class="btn btn-success">
                <i class="fa fa-arrow-circle-left"></i>
                Kembali
              </a>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              {!! Form::open(['url'=>route('submitTambahDataKelas'),'files'=>true,'class'=>'register-form', 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                {{ csrf_field() }}
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">
                    Nama Kelas
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control col-md-12 col-xs-12" name="namakelas" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <button type="submit" class="btn btn-danger">Batal</button>
                  </div>
                </div>
              {{ Form::close() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
