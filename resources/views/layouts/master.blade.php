<!DOCTYPE html>
<html lang="en"><head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   {{-- hier wird der Wert von der section "title" eines blade templates ausgefüllt,
   welches dieses layout "extended"  --}}
   {{-- <title>@yield('title')</title> --}}
   <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
   <script type="text/javascript" src="{{ mix('/js/app.js') }}" defer></script>
</head>
<body>

{{-- @include('banner-beta-css') --}}

<div class="main_container">
   {{-- hier wird auch der Wert von der section "title" eines blade templates ausgefüllt,
   welches dieses layout "extended"  --}}
   <div class="title_box">
    <h1><a class="rainbow" href="/">@yield('title')</a></h1>
    <img class="banner-beta" src="{{ asset('img/bird.png')}}">
   </div>
   {{-- hier wird der Wert von der section "content" eines blade templates ausgefüllt,
   welches dieses layout "extended"  --}}
   @yield('content')
   {{-- hier wird die php Funktion date() aufgerufen mit dem Format-Pattern 'd.m.Y'
    und im html ausgegeben --}}
    {{-- <?=print_r($message);?>  --}}
   <hr><div>{{ $message->count() }} messages | Last update {{ $last_updated }}</div>
</div>
</body>
</html>
