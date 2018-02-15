@extends('auth.Layout.Master')
@section('content')
  <body class="login">
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            {!! Form::open(['url'=>Request::url(),'files'=>true,'class'=>'register-form', 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form']) !!}
            {{ csrf_field() }}
              <h1>Register Dosen</h1>
              <div>
                <input type="text" class="form-control" placeholder="NIDN" name="nidn" pattern="[0-9]+" required oninvalid="this.setCustomValidity('Masukkan angka')">
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Nama" name="nama" required pattern="[a-zA-Z]+">
              </div>
              <div>
                <input type="text" class="form-control" placeholder="No Handphone" name="nohp" required pattern="[0-9]+">
              </div>
              <div>
                <input type="email" class="form-control" placeholder="E-Mail" name="email" pattern="[^ @]*@[^ @]*.[a-zA-Z]{2,}" autofocus required oninvalid="this.setCustomValidity('Masukkan email dengan benar')">
              </div>
              <hr>
              <div>
                <input type="text" class="form-control" placeholder="Username" name="username" required pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{7,20}$" oninvalid="this.setCustomValidity('Input hanya boleh huruf a-z tanpa spasi!')">
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
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
