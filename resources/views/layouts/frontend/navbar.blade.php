<!-- My CSS -->
<link rel="stylesheet" href="{{ asset('css/css/style.css') }}" />

<nav class="navbar fixed-top navbar-expand-lg navbar-light shadow-sm" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="#page-top">
            <img src="{{ asset('images/hijau.png') }}"alt=".." height="50rem"></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('sigbs.index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#pemetaan">Pemetaan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#banksampah">Banksampah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
