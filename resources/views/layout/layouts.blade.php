<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ресторан | @yield('title','Home')</title>
        <link rel="stylesheet" href="{{asset('public/css/app.css')}}">
    </head>
    <body>
        <div class="wrapper">
            <header class="wrapper-item">
                <div class="border-content">
                    <div class="header-log">
                        <div>
                            <h1 class="header-title">Ресторан</h1>
                        </div>
                        <div class="header-log-menu">
                            @guest
                                <a href="/login">Вход</a>
                            @endguest
                            @if (Auth::user()->role=='user'||Auth::user()->role=='admin')
                                <a href="/logout">Выход</a>
                            @endif
                        </div>
                    </div>
                    <nav>
                        @auth
                            <ul class="nav">
                                <li>
                                    <a href="/categories">
                                        Категории
                                    </a>
                                </li>
                                <li>
                                    <a href="/catalog">
                                        Товары
                                    </a>
                                </li>


                                @if(Auth::user()->role=='admin')
                                    <li>
                                        <a href="/create">
                                            Создание сотрудника
                                        </a>
                                    </li>
                                @endif

                                <li>
                                    <a href="/info">
                                        Контакты
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('tables')}}">
                                        Столы
                                    </a>
                                </li>
                            </ul>
                        @endauth
                    </nav>
                </div>
            </header>
            <div class="content">
                <div class="border-content">
                    @yield('content')
                </div>
            </div>
            <footer>
                <div class="border-content">
                    <h1>Здесь будет футер</h1>
                </div>
            </footer>
        </div>
        <script src="{{asset('public/js/js.js')}}">

        </script>
    </body>
</html>
