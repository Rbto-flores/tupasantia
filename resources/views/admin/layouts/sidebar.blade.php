<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                        class="fas fa-search"></i></a></li>
        </ul>

    </form>
    <ul class="navbar-nav navbar-right">

        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="imagen" src="{{ asset(auth()->guard('admin')->user()->image) }}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hola, {{ auth()->guard('admin')->user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">

                <a href="{{ route('admin.profile.index') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Perfil
                </a>
                <a href="{{ route('admin.site-settings.index') }}" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Configuración
                </a>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf

                    <a href="{{ route('admin.logout') }}"
                        onclick="event.preventDefault();
                    this.closest('form').submit();"
                        class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Cerrar sesión
                    </a>
                </form>

            </div>
        </li>
    </ul>
</nav>

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Panel de control</li>

            <li class="{{ setSidebarActive(['admin.dashboard']) }}">
                <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Panel de control</span></a>

            </li>
            <li class="menu-header">Inicio</li>
            @if (canAccess(['order index']))
            <li class="{{ setSidebarActive(['admin.orders.*']) }}"><a class="nav-link" href="{{ route('admin.orders.index') }}"><i class="fas fa-cart-plus"></i> <span>Pedidos</span></a></li>
            @endif

            @if (canAccess(['job category create', 'job category update', 'job category delete']))
            <li class="{{ setSidebarActive(['admin.job-categories.*']) }}"><a class="nav-link" href="{{ route('admin.job-categories.index') }}"><i class="fas fa-list"></i> <span>Categoría de Trabajo</span></a></li>
            @endif

            @if (canAccess(['job create', 'job update', 'job delete']))
            <li class="{{ setSidebarActive(['admin.jobs.*']) }}"><a class="nav-link" href="{{ route('admin.jobs.index') }}"><i class="fas fa-briefcase"></i> <span>Publicación de Empleo</span></a></li>
            @endif


            @if (canAccess(['job attributes']))

            <li class="dropdown {{ setSidebarActive(
                ['admin.industry-types.*',
                'admin.organization-types.*',
                'admin.languages.*',
                'admin.professions.*',
                'admin.skills.*',
                'admin.educations.*',
                'admin.job-types.*',
                'admin.salary-types.*',
                'admin.tags.*',
                'admin.job-experiences.*'] ) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Atributos</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.industry-types.*']) }}"><a class="nav-link" href="{{ route('admin.industry-types.index') }}">Tipo de Industria</a></li>
                    <li class="{{ setSidebarActive(['admin.organization-types.*']) }}"><a class="nav-link" href="{{ route('admin.organization-types.index') }}">Tipo de Organización</a></li>

                    <li class="{{ setSidebarActive(['admin.languages.*']) }}"><a class="nav-link" href="{{ route('admin.languages.index') }}">Idiomas</a></li>

                    <li class="{{ setSidebarActive(['admin.professions.*']) }}"><a class="nav-link" href="{{ route('admin.professions.index') }}">Profesiones</a></li>

                    <li class="{{ setSidebarActive(['admin.skills.*']) }}"><a class="nav-link" href="{{ route('admin.skills.index') }}">Habilidades</a></li>
                    <li class="{{ setSidebarActive(['admin.educations.*']) }}"><a class="nav-link" href="{{ route('admin.educations.index') }}">Educación</a></li>
                    <li class="{{ setSidebarActive(['admin.job-types.*']) }}"><a class="nav-link" href="{{ route('admin.job-types.index') }}">Tipos de Trabajo</a></li>
                    <li class="{{ setSidebarActive(['admin.salary-types.*']) }}"><a class="nav-link" href="{{ route('admin.salary-types.index') }}">Tipos de Salario</a></li>
                    <li class="{{ setSidebarActive(['admin.tags.*']) }}"><a class="nav-link" href="{{ route('admin.tags.index') }}">Etiquetas</a></li>
                </ul>
            </li>
            @endif

            @if (canAccess(['job locations']))
            <li class="dropdown {{ setSidebarActive(['admin.countries.*', 'admin.states.*', 'admin.cities.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-map"></i>
                    <span>Ubicaciones</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.countries.*']) }}"><a class="nav-link" href="{{ route('admin.countries.index') }}">Países</a></li>
                    <li class="{{ setSidebarActive(['admin.states.*']) }}"><a class="nav-link" href="{{ route('admin.states.index') }}">Estados</a></li>
                    <li class="{{ setSidebarActive(['admin.cities.*']) }}"><a class="nav-link" href="{{ route('admin.cities.index') }}">Ciudades</a></li>


                </ul>
            </li>
            @endif

            @if (canAccess(['sections']))
            <li class="dropdown {{ setSidebarActive([
                'admin.hero.index',
                'admin.why-choose-us.index',
                'admin.learn-more.*',
                'admin.counter.*',
                'admin.job-location.*',
                'admin.reviews.*',
                ]) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-puzzle-piece"></i>
                    <span>Secciones</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.hero.index']) }}"><a class="nav-link" href="{{ route('admin.hero.index') }}">Héroe</a></li>
                    <li class="{{ setSidebarActive(['admin.why-choose-us.*']) }}"><a class="nav-link" href="{{ route('admin.why-choose-us.index') }}">Por Qué Elegirnos</a></li>
                    <li class="{{ setSidebarActive(['admin.learn-more.*']) }}"><a class="nav-link" href="{{ route('admin.learn-more.index') }}">Saber Más</a></li>
                    <li class="{{ setSidebarActive(['admin.counter.*']) }}"><a class="nav-link" href="{{ route('admin.counter.index') }}">Contador</a></li>
                    <li class="{{ setSidebarActive(['admin.job-location.*']) }}"><a class="nav-link" href="{{ route('admin.job-location.index') }}">Ubicaciones de Trabajo</a></li>
                    <li class="{{ setSidebarActive(['admin.reviews.*']) }}"><a class="nav-link" href="{{ route('admin.reviews.index') }}">Reseñas</a></li>
                </ul>
            </li>
            @endif

            @if (canAccess(['site pages']))
            <li class="dropdown {{ setSidebarActive(['admin.about-us.*', 'admin.page-builder.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file"></i>
                    <span>Páginas</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.about-us.*']) }}"><a class="nav-link" href="{{ route('admin.about-us.index') }}">Sobre nosotros</a></li>
                    <li class="{{ setSidebarActive(['admin.page-builder.*']) }}"><a class="nav-link" href="{{ route('admin.page-builder.index') }}">Constructor de Páginas</a></li>

                </ul>
            </li>
            @endif

            @if (canAccess(['site footer']))
            <li class="dropdown {{ setSidebarActive(['admin.footer.*', 'admin.social-icon.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-shoe-prints"></i>
                    <span>Pie de Página</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.footer.*']) }}"><a class="nav-link" href="{{ route('admin.footer.index') }}">Detalles del Pie de Página</a></li>

                    <li class="{{ setSidebarActive(['admin.social-icon.*']) }}"><a class="nav-link" href="{{ route('admin.social-icon.index') }}">Iconos Sociales</a></li>
                </ul>
            </li>
            @endif

            @if (canAccess(['blogs']))
            <li class="{{ setSidebarActive(['admin.blogs.*']) }}"><a class="nav-link" href="{{ route('admin.blogs.index') }}"><i class="fab fa-blogger-b"></i> <span>Blogs</span></a></li>
            @endif
            @if (canAccess(['price plan']))
            <li class="{{ setSidebarActive(['admin.plans.*']) }}"><a class="nav-link" href="{{ route('admin.plans.index') }}"><i class="fas fa-box"></i> <span>Plan de Precios</span></a></li>
            @endif

            @if (canAccess(['news letter']))
            <li class="{{ setSidebarActive(['admin.newsletter.*']) }}"><a class="nav-link" href="{{ route('admin.newsletter.index') }}"><i class="fas fa-mail-bulk"></i> <span>Boletín</span></a></li>
            @endif

            @if (canAccess(['menu builder']))
            <li class="{{ setSidebarActive(['admin.menu-builder.*']) }}"><a class="nav-link" href="{{ route('admin.menu-builder.index') }}"><i class="fas fa-shapes"></i> <span>Constructor de Menú</span></a></li>
            @endif

            @if (canAccess(['access management']))
            <li class="dropdown {{ setSidebarActive(['admin.role-user.*', 'admin.role.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user-shield"></i>
                    <span>Gestión de Acceso</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.role-user.*']) }}"><a class="nav-link" href="{{ route('admin.role-user.index') }}">Usuarios con Roles</a></li>
                    <li class="{{ setSidebarActive(['admin.role.*']) }}"><a class="nav-link" href="{{ route('admin.role.index') }}">Roles</a></li>
                </ul>
            </li>
            @endif

            @if (canAccess(['payment settings']))
            <li class="{{ setSidebarActive(['admin.payment-settings.index']) }}"><a class="nav-link" href="{{ route('admin.payment-settings.index') }}"><i class="fas fa-wrench"></i> <span>Configuración de Pago</span></a></li>
            @endif

            @if (canAccess(['site settings']))

            <li class="{{ setSidebarActive(['admin.payment-settings.index']) }}"><a class="nav-link" href="{{ route('admin.site-settings.index') }}"><i class="fas fa-cog"></i> <span>Configuración del Sitio</span></a></li>
            @endif

            @if (canAccess(['database clear']))
            <li class="{{ setSidebarActive(['admin.clear-database.index']) }}"><a class="nav-link" href="{{ route('admin.clear-database.index') }}"><i class="fas fa-skull-crossbones"></i> <span>Limpiar Base de Datos</span></a></li>
            @endif

        </ul>
    </aside>
</div>