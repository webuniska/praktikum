@extends('auth.Layout.Master')
@section('content')
  <body class="login">
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form>
              <h1>Login</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required>
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
        </div>
      </div>
    </div>
  </body>
@endsection
