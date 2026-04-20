    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link @isset($home_menu_link_active) {{ 'active' }} @endisset" href="{{ asset('home') }}">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link @isset($about_menu_link_active) {{ 'active' }} @endisset" href="{{ asset('about') }}">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link @isset($contact_menu_link_active) {{ 'active' }} @endisset" href="{{ asset('contact') }}">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link @isset($cv_menu_link_active) {{ 'active' }} @endisset" href="{{ asset('cv') }}">CV</a>
      </li>
      <li class="nav-item">
        <a class="nav-link @isset($technologies_menu_link_active) {{ 'active' }} @endisset" href="{{ asset('technologies') }}">Technologies</a>
      </li>      
    </ul>
      