<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute">
    <div class="container">
        <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">{{ __('Primera verision modificada (Hugo)') }}</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nc-icon nc-chart-pie-35"></i> {{ __('Estadisticas') }}
                    </a>
                </li>
                <li class="nav-item @if($activePage == 'register') active @endif">
                    <a href="{{ route('register') }}" class="nav-link">
                        <i class="nc-icon nc-badge"></i> {{ __('Registrar') }}
                    </a>
                </li>
                <li class="nav-item @if($activePage == 'login') active @endif">
                    <a href="{{ route('login') }}" class="nav-link">
                        <i class="nc-icon nc-mobile"></i> {{ __('Iniciar sesión') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>