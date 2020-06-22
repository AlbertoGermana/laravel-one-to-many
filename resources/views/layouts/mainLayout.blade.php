<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/app.css">
    <title>Relazioni</title>
  </head>
  <body>
    <header>
      @include('components.header')
    </header>

    <main>
      @yield('content')
    </main>

    <footer>
      @include('components.footer')
    </footer>
  </body>
</html>
