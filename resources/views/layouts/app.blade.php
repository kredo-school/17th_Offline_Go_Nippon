<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>

  {{-- CSSの読み込み --}}
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <script src="https://kit.fontawesome.com/xxxxxxx.js" crossorigin="anonymous"></script>
</head>

<body>
  {{-- === ヘッダー === --}}
  <header>
    {{-- ここに後でfunctionを追加予定 --}}
  </header>

  {{-- === メインコンテンツ === --}}
  <main>
    @yield('content')
  </main>

  {{-- === フッター === --}}
  <footer>
  </footer>
</body>
</html>