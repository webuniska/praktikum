@extends('auth.Layout.Master')
@section('content')
  <div @click="ForceUser(0)">
    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content" v-if="status">
          <login-form
            urlform = {{ route('login') }}
            token = {{ csrf_token() }}
          ></login-form>
        </section>
      </div>
    </div>
  </div>
@endsection
