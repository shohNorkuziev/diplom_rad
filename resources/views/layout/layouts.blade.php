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
                            @if ($data->role=='quest')
                                <a href="/login">Вход</a>
                            @endif
                            @if ($data->role=='user'||$data->role=='admin')
                                <a href="/basket" class="basket">
                                    <img src="{{asset('public/images/basket.png')}}" alt="" class="basket-img">
                                    {{-- @if ($data->qte>1)
                                        <div class="basket-qty">2</div>
                                    @endif --}}
                                </a>
                                <a href="/logout">Выход</a>
                            @endif
                        </div>
                    </div>
                    <nav>
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
                            <li>
                                <a href="/create">
                                    Создание сотрудника
                                </a>
                            </li>
                            <li>
                                <a href="/info">
                                    Контакты
                                </a>
                            </li>
                        </ul>
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
