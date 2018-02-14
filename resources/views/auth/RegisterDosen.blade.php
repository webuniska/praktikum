@extends('auth.Layout.Master')
@section('content')
  <body class="login">
    <script type="text/javascript">
      @if (count($errors) != 0)
        swal({
          title: "Error",
          text: "{{$errors->first()}}",
          icon: "error",
          button: "OK",
        });
        @endif
    </script>
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            {!! Form::open(['url'=>Request::url(),'files'=>true,'class'=>'register-form', 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form']) !!}
            {{ csrf_field() }}
              <h1>Register Dosen</h1>
              <div>
                <input type="text" class="form-control" placeholder="NIDN" name="nidn" value="{{old('nidn')}}" required>
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Nama" name="nama" value="{{old('nama')}}" required>
              </div>
              <div>
                <input type="text" class="form-control" placeholder="No Handphone" name="nohp" value="{{old('nohp')}}" required>
              </div>
              <div>
                <input type="email" class="form-control" placeholder="E-Mail" name="email" value="{{old('email')}}" required>
              </div>
              <hr>
              <div>
                <input type="text" class="form-control" placeholder="Username" name="username" value="{{old('username')}}" required>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password" required>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Ulangi Password" name="password_confirmation" required>
              </div>
              <div>
                <button type="submit" class="btn btn-success col-md-12">Daftar</button>
              </div>
              <div class="clearfix"></div>
            {{ Form::close() }}
            <div class="separator">
              <a href="/login">
                <button class="btn btn-info col-md-12">Sudah Punya Akun dan Login</button>
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
