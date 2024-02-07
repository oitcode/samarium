{{--
@extends('errors::minimal')
@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found'))
--}}

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="height: 100% !important;">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/fontawesome-free/css/all.css') }}" rel="stylesheet">

    <style>
      html, body {
        overflow-x: hidden;
      }
    </style>
</head>

<body style="height: 100% !important;">

  <div class="d-flex justify-content-center h-100">
    <div class="d-flex flex-column justify-content-center">
        <div class="mb-3 text-center">
          <div class="mb-3">
            @if (\App\Company::first())
              <img src="{{ asset('storage/' . \App\Company::first()->logo_image_path) }}"
                  class="img-fluid-rm"
                  alt="{{ \App\Company::first()->name }} logo"
                  style="height: 75px !important;">
            @else
              <i class="fas fa-check-circle mr-1"></i>
            @endif
          </div>
        </div>


        {{-- Main error message display. --}}
        <div>
          <h1 class="h1 font-weight-bold text-center">
            404 | Page not found
          </h1>
        </div>


        {{-- Error message brief description. --}}
        <div class="text-muted p-3 text-center">
          Content you are looking for could not be found.
          Please go to <a href="/">home</a> page.
        </div>


    </div>
  </div>

</body>
</html>
