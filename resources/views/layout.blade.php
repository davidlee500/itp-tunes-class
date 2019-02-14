<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
</head>
<body>
    <div style="float:right;">
      <a href="/genres" class="btn-link">Genres</a> <a href="/tracks" class="btn-link">Tracks</a>
    </div>
    @yield('main')

</body>
</html>