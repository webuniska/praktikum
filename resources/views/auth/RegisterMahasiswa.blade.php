@extends('auth.Layout.Master')
@section('content')
  <div>
    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          {!! Form::open(['url'=>Request::url(),'files'=>true,'class'=>'register-form', 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form']) !!}
          {{ csrf_field() }}
            <h1>Register Mahasiswa</h1>
            <div>
              <input type="text" class="form-control" placeholder="NPM" name="npm" value="{{old('npm')}}" required pattern="[0-9]+" title="Input hanya boleh angka dan tidak menggunakan spasi">
            </div>
            <div>
              <input type="text" class="form-control" placeholder="Nama" name="nama" value="{{old('nama')}}" required pattern="(.,[a-z]\s)(.,[A-Z]\s).{6,}+" title="Input tidak menggunakan angka">
            </div>
            <div>
              <input type="text" class="form-control" placeholder="No Handphone" name="nohp" value="{{old('nohp')}}" required  pattern="[0-9]+" title="Input hanya boleh angka dan tidak menggunakan spasi">
            </div>
            <div>
              <input type="email" class="form-control" placeholder="E-Mail" name="email" value="{{old('email')}}" required>
            </div>
            <select class="form-control" name="kelas_id" required>
              <option selected hidden value=''>Kelas</option>
              @foreach ($Kelas as $DataKelas)
                <option value="{{$DataKelas->id}}" {{old('kelas_id') == $DataKelas->id ? 'selected' : ''}}>{{$DataKelas->namakelas}}</option>
              @endforeach
            </select>
            <hr>
            <div>
              <input type="text" class="form-control" placeholder="Username" name="username" value="{{old('username')}}" required pattern="^[A-Za-z0-9_.,]{6,}$" title="Input tidak menggunakan spasi">
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
@endsection
