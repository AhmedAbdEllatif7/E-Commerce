<meta charset="utf-8">
<title>@yield('title')</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="eCommerce" name="keywords">
<meta content="eCommerce" name="description">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="base-url" content="{{ url()->to('/') }}">
<meta http-equiv="content-language" content="{{ app()->getLocale() }}">

<!-- Favicon -->
<link href="{{ URL::asset('temp/img/favicon.ico') }}" rel="icon">
<link rel="shortcut icon" href="{{ URL::asset('assets/images/ECommerce.png') }}" type="image/x-icon" />

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">


<!-- CSS Libraries -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="{{ URL::asset('temp/lib/slick/slick.css') }}" rel="stylesheet">
<link href="{{ URL::asset('temp/lib/slick/slick-theme.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('temp/summernote/summernote-bs4.min.css') }}">



<!-- Template Stylesheet -->
<link href="{{ URL::asset('temp/css/style.css') }}" rel="stylesheet">
<title>{{ config('app.name') }}</title>
