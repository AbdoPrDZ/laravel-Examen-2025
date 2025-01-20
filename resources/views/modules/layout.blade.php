<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laravel Examen</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  @vite(['resources/css/app.css'])
</head>
<body data-bs-theme="dark">
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark">
      <a class="navbar-brand" href="{{ route('home') }}">
        <img src="{{ asset('storage/logo.png') }}" alt="Logo" height="30">
        Laravel Examen
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('modules.index') }}">Modules</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('modules.create') }}">Create</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('modules.factory') }}">Factory</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('modules.delete') }}">Delete All</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  @if(isset($message))
    <div class="alert alert-{{ $message['type'] }} alert-dismissible fade show" role="alert">
      {{ $message['content'] }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <main class="container mt-4">
    @yield('content')
  </main>

  <footer class="text-center py-3 mt-4 fixed-bottom">
    <p>&copy; 2025 <a href="https://github.com/AbdoPrDZ" target="__blank">@AbdoPrDZ</a>. All rights reserved.</p>
  </footer>

  <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
