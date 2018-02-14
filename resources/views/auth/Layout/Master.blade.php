<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Praktikum | UNISKA</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="{{ asset('js/app.js') }}"></script>
</head>
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
    @if (session('success'))
      swal({
        title: "Berhasil",
        text: "{{session('success')}}",
        icon: "success",
        button: "OK",
      });
    @endif
  </script>
  @yield('content')
</body>
</html>
