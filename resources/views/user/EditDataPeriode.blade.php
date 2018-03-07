@extends('user.Layout.Master')
@section('content')
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Edit Data Periode</h3>
        </div>
      </div>
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <button onclick="redirect('{{route('DataPeriode')}}')" class="btn btn-success">
                <i class="fa fa-arrow-circle-left"></i>
                Kembali
              </button>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              {!! Form::open(['url'=>route('submitEditDataPeriode', ['id' => IDCrypt::Encrypt($Periode->id)]),'files'=>true,'class'=>'register-form', 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                {{ csrf_field() }}
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">
                    Periode
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control col-md-12 col-xs-12" name="namaperiode" value="{{$Periode->namaperiode}}" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">
                    Tanggal Buka
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="date" class="form-control col-md-12 col-xs-12" name="tanggalbuka" value="{{$Periode->tanggalbuka}}" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">
                    Tanggal Tutup
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="date" class="form-control col-md-12 col-xs-12" name="tanggaltutup" value="{{$Periode->tanggaltutup}}" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">
                    Status
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="form-control col-md-12 col-xs-12" name="status" required>
                      <option value="1" {{$Periode->status ? 'selected' : ''}}>Aktif</option>
                      <option value="0" {{$Periode->status ? '' : 'selected'}}>Non-Aktif</option>
                    </select>
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
