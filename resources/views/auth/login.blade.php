@extends('auth.Layout.Master')
@section('content')
  <div @click="ForceUser(0)">
    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content" v-if="status">
          <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <h1>Login</h1>
            <img :src="foto" alt="01-01-2011" class="img-circle profile_img modal_img login_img">
            <div>
              <input type="text" class="form-control" placeholder="Username" name="username" required v-model="username" @keyup="LoginUser()">
            </div>
            <div>
              <input type="password" class="form-control" placeholder="Password" name="password" required @keyup.esc="ForceUser(1)" v-model="password">
            </div>
            <div>
              <button class="btn btn-success col-md-12">Login</button>
            </div>
            <div class="clearfix"></div>
          </form>
          <div class="separator">
            <a href="#">
              <button class="btn btn-warning col-md-12">Lupa Password</button>
            </a>
            <div class="row">
              <div class="col-md-6">
                <a href="/register-dosen">
                  <button class="btn btn-info full-width">Register Dosen</button>
                </a>
              </div>
              <div class="col-md-6">
                <a href="/register-mahasiswa">
                  <button class="btn btn-primary full-width">Register Mahasiswa</button>
                </a>
              </div>
            </div>
            <div class="clearfix"></div>
            <br />
          </div>
        </section>
        <div v-else v-cloak>
          <div class="text-center">
            <h3>@{{juduldepan}}</h3>
            <img :src="foto" alt="01-01-2011" class="img-circle profile_img modal_img">
            <h3>@{{Author.nama}}</h3>
            <h3>@{{Author.email}}</h3>
            <h3>@{{Author.github}}</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
