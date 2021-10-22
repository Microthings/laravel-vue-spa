@php
$config = [
    'appName' => config('app.name'),
    'locale' => $locale = app()->getLocale(),
    'locales' => config('app.locales'),
    'githubAuth' => config('services.github.client_id'),
];
$appJs = mix('dist/js/app.js');
$appCss = mix('dist/css/app.css');
@endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#206bc4" />

  <title>{{ config('app.name') }}</title>

{{--  <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon"/>--}}
  <link rel="stylesheet" href="{{ (str_starts_with($appCss, '//') ? 'http:' : '').$appCss }}">
</head>
<body class="antialiased">
  <div class="wrapper">
    <div id="app"></div>
  </div>

  <script>
    window.config = @json($config);
  </script>

  <script src="{{ (str_starts_with($appJs, '//') ? 'http:' : '').$appJs }}"></script>
</body>
</html>
