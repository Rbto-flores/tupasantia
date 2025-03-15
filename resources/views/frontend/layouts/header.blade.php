<header class="header sticky-bar">
  <div class="container">
    <div class="main-header">
      <div class="header-left">
        <div class="header-logo"><a class="d-flex" href="{{ url('/') }}"><img alt="joblist"
              src="{{ config('settings.site_logo') }}"></a></div>
      </div>
      <div class="header-nav">
        <nav class="nav-main-menu">
          @php
          $navigationMenu = \Menu::getByName('Navigation Menu');

          @endphp
          <ul class="main-menu">
            @foreach ($navigationMenu as $menu)

            @if ($menu['child'])
            <li class="has-children"><a href="{{ $menu['link'] }}">{{ $menu['label'] }}</a>
              <ul class="sub-menu">
                @foreach ($menu['child'] as $childMenu)
                <li><a href="{{ $childMenu['link'] }}">{{ $childMenu['label'] }}</a></li>
                @endforeach
              </ul>
            </li>
            @else
            @if (auth()->user()?->role == 'candidate' && $menu['link'] != '/pricing')
            <li class="has-children"><a class="" href="{{ $menu['link'] }}">{{ $menu['label'] }}</a></li>
            @else
            <li class="has-children"><a class="" href="{{ $menu['link'] }}">{{ $menu['label'] }}</a></li>

            @endif
            @endif

            @endforeach

          </ul>
        </nav>
        <div class="burger-icon burger-icon-white"><span class="burger-icon-top"></span><span
            class="burger-icon-mid"></span><span class="burger-icon-bottom"></span></div>
      </div>
      <div class="header-right">
        <div class="block-signin">
          <!-- <a class="text-link-bd-btom hover-up" href="page-register.html">Register</a> -->
          @guest
          <a class="btn btn-default btn-shadow ml-40 hover-up" href="{{ route('login') }}">Iniciar sesión</a>
          @endguest
          @auth
          @if (auth()->user()->role === 'company')
          <a class="btn btn-default btn-shadow ml-40 hover-up" style="width: 200px" href="{{ route('company.dashboard') }}">Panel de Empresa</a>
          @elseif(auth()->user()->role === 'candidate')
          <a class="btn btn-default btn-shadow ml-40 hover-up" style="width: 200px" href="{{ route('candidate.dashboard') }}">Panel de Candidato</a>
          @endif
          @endauth
        </div>
      </div>
    </div>
  </div>
</header>

<div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
  <div class="mobile-header-wrapper-inner">
    <div class="mobile-header-content-area">
      <div class="perfect-scroll">
        <div class="mobile-search mobile-header-border mb-30">
          <form action="#">
            <input type="text" placeholder="Buscar…"><i class="fi-rr-search"></i>
          </form>
        </div>
        <div class="mobile-menu-wrap mobile-header-border">
          <!-- mobile menu start-->
          <nav>
            <ul class="mobile-menu font-heading">
              <li class="has-children"><a class="active" href="index.html">Inicio</a>
                <ul class="sub-menu">
                  <li><a href="index.html">Inicio 1</a></li>
                  <li><a href="index-2.html">Inicio 2</a></li>
                  <li><a href="index-3.html">Inicio 3</a></li>
                  <li><a href="index-4.html">Inicio 4</a></li>
                  <li><a href="index-5.html">Inicio 5</a></li>
                  <li><a href="index-6.html">Inicio 6</a></li>
                </ul>
              </li>
              <li class="has-children"><a href="jobs-grid.html">Encontrar Trabajo</a>
                <ul class="sub-menu">
                  <li><a href="jobs-grid.html">Cuadrícula de Trabajos</a></li>
                  <li><a href="jobs-list.html">Lista de Trabajos</a></li>
                  <li><a href="job-details.html">Detalles del Trabajo</a></li>
                  <li><a href="job-details-2.html">Detalles del Trabajo 2</a></li>
                </ul>
              </li>
              <li class="has-children"><a href="companies-grid.html">Reclutadores</a>
                <ul class="sub-menu">
                  <li><a href="companies-grid.html">Reclutadores</a></li>
                  <li><a href="company-details.html">Detalles de la Empresa</a></li>
                </ul>
              </li>
              <li class="has-children"><a href="candidates-grid.html">Candidatos</a>
                <ul class="sub-menu">
                  <li><a href="candidates-grid.html">Cuadrícula de Candidatos</a></li>
                  <li><a href="candidate-details.html">Detalles del Candidato</a></li>
                </ul>
              </li>
              <li class="has-children"><a href="blog-grid.html">Páginas</a>
                <ul class="sub-menu">
                  <li><a href="page-about.html">Sobre Nosotros</a></li>
                  <li><a href="page-pricing.html">Plan de Precios</a></li>
                  <li><a href="page-contact.html">Contáctenos</a></li>
                  <li><a href="page-register.html">Registrarse</a></li>
                  <li><a href="page-signin.html">Iniciar Sesión</a></li>
                  <li><a href="page-reset-password.html">Restablecer Contraseña</a></li>
                  <li><a href="page-content-protected.html">Contenido Protegido</a></li>
                </ul>
              </li>
              <li class="has-children"><a href="blog-grid.html">Blog</a>
                <ul class="sub-menu">
                  <li><a href="blog-grid.html">Cuadrícula del Blog</a></li>
                  <li><a href="blog-grid-2.html">Cuadrícula del Blog 2</a></li>
                  <li><a href="blog-details.html">Entrada del Blog</a></li>
                </ul>
              </li>
              <li><a href="http://wp.alithemes.com/html/joblist/demos/dashboard" target="_blank">Panel</a></li>
            </ul>
          </nav>
        </div>
        <div class="mobile-account">
          <h6 class="mb-10">Tu Cuenta</h6>
          <ul class="mobile-menu font-heading">
            <li><a href="#">Perfil</a></li>
            <li><a href="#">Preferencias de Trabajo</a></li>
            <li><a href="#">Configuración de la Cuenta</a></li>
            <li><a href="#">Hacerse Pro</a></li>
            <li><a href="page-signin.html">Cerrar Sesión</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
  <div class="mobile-header-wrapper-inner">
    <div class="mobile-header-content-area">
      <div class="perfect-scroll">
        <div class="mobile-search mobile-header-border mb-30">
          <form action="#">
            <input type="text" placeholder="Buscar…"><i class="fi-rr-search"></i>
          </form>
        </div>
        <div class="mobile-menu-wrap mobile-header-border">
          <!-- mobile menu start-->
          <nav>
            <ul class="mobile-menu font-heading">
              <li class="has-children"><a class="active" href="index.html">Inicio</a>
                <ul class="sub-menu">
                  <li><a href="index.html">Inicio 1</a></li>
                  <li><a href="index-2.html">Inicio 2</a></li>
                  <li><a href="index-3.html">Inicio 3</a></li>
                  <li><a href="index-4.html">Inicio 4</a></li>
                  <li><a href="index-5.html">Inicio 5</a></li>
                  <li><a href="index-6.html">Inicio 6</a></li>
                </ul>
              </li>
              <li class="has-children"><a href="jobs-grid.html">Encontrar Trabajo</a>
                <ul class="sub-menu">
                  <li><a href="jobs-grid.html">Cuadrícula de Trabajos</a></li>
                  <li><a href="jobs-list.html">Lista de Trabajos</a></li>
                  <li><a href="job-details.html">Detalles del Trabajo</a></li>
                  <li><a href="job-details-2.html">Detalles del Trabajo 2</a></li>
                </ul>
              </li>
              <li class="has-children"><a href="companies-grid.html">Reclutadores</a>
                <ul class="sub-menu">
                  <li><a href="companies-grid.html">Reclutadores</a></li>
                  <li><a href="company-details.html">Detalles de la Empresa</a></li>
                </ul>
              </li>
              <li class="has-children"><a href="candidates-grid.html">Candidatos</a>
                <ul class="sub-menu">
                  <li><a href="candidates-grid.html">Cuadrícula de Candidatos</a></li>
                  <li><a href="candidate-details.html">Detalles del Candidato</a></li>
                </ul>
              </li>
              <li class="has-children"><a href="blog-grid.html">Páginas</a>
                <ul class="sub-menu">
                  <li><a href="page-about.html">Sobre Nosotros</a></li>
                  <li><a href="page-pricing.html">Plan de Precios</a></li>
                  <li><a href="page-contact.html">Contáctenos</a></li>
                  <li><a href="page-register.html">Registrarse</a></li>
                  <li><a href="page-signin.html">Iniciar Sesión</a></li>
                  <li><a href="page-reset-password.html">Restablecer Contraseña</a></li>
                  <li><a href="page-content-protected.html">Contenido Protegido</a></li>
                </ul>
              </li>
              <li class="has-children"><a href="blog-grid.html">Blog</a>
                <ul class="sub-menu">
                  <li><a href="blog-grid.html">Cuadrícula del Blog</a></li>
                  <li><a href="blog-grid-2.html">Cuadrícula del Blog 2</a></li>
                  <li><a href="blog-details.html">Entrada del Blog</a></li>
                </ul>
              </li>
              <li><a href="http://wp.alithemes.com/html/joblist/demos/dashboard" target="_blank">Panel</a></li>
            </ul>
          </nav>
        </div>
        <div class="mobile-account">
          <h6 class="mb-10">Tu Cuenta</h6>
          <ul class="mobile-menu font-heading">
            <li><a href="#">Perfil</a></li>
            <li><a href="#">Preferencias de Trabajo</a></li>
            <li><a href="#">Configuración de la Cuenta</a></li>
            <li><a href="#">Hacerse Pro</a></li>
            <li><a href="page-signin.html">Cerrar Sesión</a></li>
          </ul>
        </div>
        <div class="site-copyright">Copyright 2022 &copy; joblist. <br>Diseñado por AliThemes.</div>
      </div>
    </div>
  </div>
</div>