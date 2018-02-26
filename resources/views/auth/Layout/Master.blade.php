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
</head>
<body class="login" id="body">
  <div id="app">
    @yield('content')
  </div>
  <script src="{{ asset('js/app.js') }}"></script>
  <script type="text/javascript">
    @if (session('success'))
      notif('success', 'Berhasil', '{{session('success')}}');
    @endif
    @if (count($errors) != 0)
      notif('error', 'Error', '{{$errors->first()}}');
    @endif
  </script>
</body>
</html>
