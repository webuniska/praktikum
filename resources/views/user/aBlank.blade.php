@extends('user.Layout.Master')
@section('content')
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Plain Page</h3>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Plain Page</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content" id="InfoAdmin">
              Add content to the page ...<br>
              Ini Langsung di blade : @{{values['nama']}}
              <button type="button" name="button" v-on:click="adminJson(1)">1</button>
              <button type="button" name="button" v-on:click="adminJson(3)">3</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
