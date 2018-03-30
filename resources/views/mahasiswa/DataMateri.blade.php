@extends('dosen.Layout.Master')
@section('content')
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Hai Mahasiswa</h3>
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
            <div class="x_content">
                @foreach ($MateriPraktikum as $Index=>$DataMateriPraktikum)
              <div class="col-md-4">
                           <div class="thumbnail" >
                             <div class="image view view-first">
                                 <img src="{{asset('images/Materi').'/'.$DataMateriPraktikum->foto}}" style="width: 100%; display: block; position:cover;" >
                               <div class="mask">
                                 <p>Minimal Semester {{$DataMateriPraktikum->semesterminimal}}</p>
                                 <div class="tools tools-bottom">
                                   <a href="#">{{$DataMateriPraktikum->namamateri}}</a>

                                 </div>
                               </div>
                             </div>
                             <div class="caption text-center">
                              <a href="#"class="btn btn-info">Ambil</a>
                             </div>
                           </div>
                         </div>
                @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
