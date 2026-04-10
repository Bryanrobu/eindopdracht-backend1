<header class="header">
    <div class="container">
        <nav class="nav">
            <a href="{{ route('home') }}" class="logo">De WaalBurger</a>
            <ul class="nav-menu">
                <li>
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('menu') }}" class="nav-link {{ request()->routeIs('menu*') ? 'active' : '' }}">
                        Menukaart
                    </a>
                </li>
                <li>
                    <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                        Contact
                    </a>
                </li>
                
                @auth
                    {{-- Wat de ingelogde gebruiker ziet --}}
                    <li>
                        <a href="{{ route('dashboard') }}" class="nav-link nav-link-admin">
                            Dashboard
                        </a>
                    </li>
                @else
                    {{-- Wat een bezoeker (niet ingelogd) ziet --}}
                    <li>
                        <a href="{{ route('login') }}" class="nav-link nav-link-admin">
                            Log in
                        </a>
                    </li>
                    
                    {{-- Optioneel: Haal dit uit de comment tags als je ook een 'Registreer' knop wilt --}}
                    {{-- 
                    @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}" class="nav-link nav-link-admin">
                                Registreer
                            </a>
                        </li>
                    @endif 
                    --}}
                @endauth
            </ul>
        </nav>
    </div>
</header>