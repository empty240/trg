<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="author" content="">
  <meta name="description" content="">
  <meta name="format-detection" content="telephone=no, address=no, email=no">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <link rel="publisher" href="">
  <link rel="canonical" href="">
  <link rel="apple-touch-icon" href="">
  <title>日報登録システム</title>

    <link
        rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous"
    >
    <link rel="stylesheet" href="{{ asset('css/lib/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lib/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lib/perfect-scrollbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lib/jquery.skeduler.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lib/fontawesome/css/all.css') }}">

    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datetimepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flash.css') }}">
    @yield('css')
</head>
<body>
    @include('header_navi')

    @yield('content')

    <script src="{{ asset('js/lib/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/lib/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/lib/moment.js') }}"></script>
    <script src="{{ asset('js/lib/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/lib/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('js/lib/locale/ja.js') }}"></script>
    <script src="{{ asset('js/lib/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('js/lib/jquery.skeduler.js') }}"></script>
    <script src="{{ asset('js/lib/jquery.ganttView.js') }}"></script>
    <script src="{{ asset('js/lib/highcharts.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{ asset('js/lib/jquery-ui-datepicker-ja.js') }}"></script>
    <script src="{{ asset('js/common.js') }}"></script>
    <script src="{{ asset('js/datetimepicker.js') }}"></script>
    <script src="{{ asset('js/data.js') }}"></script>
    @yield('js')
</body>
</html>
