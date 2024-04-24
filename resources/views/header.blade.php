<header>
    <nav class="navbar navbar-expand-mb navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Учет выполнения задач и персональной продуктивности</a>
            @if(Auth::user())
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" aria-current="page" data-bs-toggle="dropdown"
                        href={{url('types_of_activity')}}>Виды активностей</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('types_of_activity') }}">Все виды активности</a></li>
                            <li><a class="dropdown-item" href="{{ url('/user/' . Auth::user()->id) }}">Мои виды активности</a></li>
                            <li><a class="dropdown-item" href="{{ url('type_of_activity/create') }}">Создать вид активности</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Активности</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Персоны</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <a class="nav-link active" href="#">
                        <i class="fa fa-user" style="font-size:20px;color:white;"></i><span>  </span>{{Auth::user()->name}}
                    </a>
                    <a class="btn btn-outline-success my-2 my-sm-0" href="{{url('logout')}}">Выйти</a>
                </ul>
            </div>
            @endif
        </div>
    </nav>
</header>
