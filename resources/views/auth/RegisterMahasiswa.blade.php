@extends('auth.Layout.Master')
@section('content')
  <body class="login">
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            {!! Form::open(['url'=>Request::url(),'files'=>true,'class'=>'register-form', 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form']) !!}
            {{ csrf_field() }}
              <h1>Register Mahasiswa</h1>
              <div>
                <input type="text" class="form-control" placeholder="NPM" name="npm" required>
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Nama" name="nama" required>
              </div>
              <div>
                <input type="text" class="form-control" placeholder="No Handphone" name="nohp" required>
              </div>
              <div>
                <input type="email" class="form-control" placeholder="E-Mail" name="email" required>
              </div>
              <select class="form-control" name="kelas_id" required>
                <option selected hidden value=''>Kelas</option>
                @foreach ($Kelas as $DataKelas)
                  <option value="{{$DataKelas->id}}">{{$DataKelas->namakelas}}</option>
                @endforeach
              </select>
              <hr>
              <div>
                <input type="text" class="form-control" placeholder="Username" name="username" required>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password" required>
              </div>
              <div>
                <button type="submit" class="btn btn-success col-md-12">Daftar</button>
              </div>
              <div class="clearfix"></div>
            {{ Form::close() }}
            <div class="separator">
              <a href="/login">
                <button class="btn btn-info col-md-12">Login</button>
              </a>
              <div class="clearfix"></div>
              <br />
            </div>
          </section>
        </div>
      </div>
    </div>
  </body>
@endsection
