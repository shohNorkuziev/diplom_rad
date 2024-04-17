<header class="bg-gray-200 py-4">
        <div>
            <h1><a href="{{ route('home') }}">Laravel App</a></h1>
        </div>
        @auth()
        @if (Auth::user()->role == 'admin')
            <div>
                <a href="{{ route('createWorkerPage')}}">Создать сотрудника</a>
            </div>
        @endif
        @endauth

        <div>
            @guest
            <a href="{{ route('login') }}">
                Вход
            </a>
            @endguest
        </div>
        <div>
            @auth
                <a href="{{ route('logout') }}">
                    Выход
                </a>
            @endauth
        </div>
    </div>
</header>
