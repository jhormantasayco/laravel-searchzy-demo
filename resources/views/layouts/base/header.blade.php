<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <div class="navbar-brand-box navigation">
                <ul class="navbar-nav ml-auto" id="topnav-menu" >
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('welcome') }}" title="{{ config('constants.app.name') }}">{{ config('constants.app.name') }}</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="d-flex">
            <div class="d-inline-block d-lg-block">
                <div class="">
                    <nav class="navbar navbar-expand-lg navigation">
                        <div class="collapse navbar-collapse">
                            <ul class="navbar-nav ml-auto" id="topnav-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ config('constants.app.github') }}">
                                        <i class="fab fa-github mr-1"></i> Github
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
