<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="{{ asset('css/lib/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom/style.css') }}">
        <script src="{{ asset('js/lib/jquery-3.7.1.min.js') }}" defer="defer"></script>
        <script src="{{ asset('js/lib/bootstrap.bundle.min.js') }}" defer="defer"></script>
        <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer="defer"></script>
    </head>
    <body>
      <div class="container">
        <header>
          <img src="{{ asset('') }}site-logo.jpg" />  
          <ul class="nav nav-tabs">
            <li class="nav-item">
               <a class="nav-link @isset($home_menu_link_active) {{ $home_menu_link_active }} @endisset" href="/home/">Home</a>
            </li>
            <li class="nav-item @isset($cart_menu_link_active) {{ $cart_menu_link_active }} @endisset">
                <a class="nav-link" href="/cart/">Cart</a>
            </li>
            <li class="nav-item @isset($about_menu_link_active) {{ $about_menu_link_active }} @endisset">
                <a class="nav-link" href="/about/">About</a>
            </li>
            <li class="nav-item @isset($contact_menu_link_active) {{ $contact_menu_link_active }} @endisset">
                <a class="nav-link" href="/contact/">Contact</a>
            </li>
            <li class="nav-item @isset($cv_menu_link_active) {{ $cv_menu_link_active }} @endisset">
                <a class="nav-link" href="/cv/">CV</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @isset($technologies_menu_link_active) {{ $technologies_menu_link_active }} @endisset" href="/technologies/">Technologies</a>
            </li>
            @if (Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard/">Back office</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout/">Log out</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="/login/">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register/">Register</a>
                </li>
            @endif
	    </ul>
      </header>
      <main clss="container mt-4  py-3">
        <div class="mb-4 bg-light rounded-3">

			<div>
				 <!-- Page Content -->
				<main>
					@yield('content')
				</main>
			</div>

        </div>
      </main>
      <footer>
        <p>Copyright &copy; 2000-2025 Synergia-Studio. All rights reserved.</p>
      </footer>
    </div>
    </body>
</html>
