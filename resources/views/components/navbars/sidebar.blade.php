@props(['activePage'])

<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 d-flex text-wrap align-items-center" href=" {{ route('dashboard') }} ">
            <img src="{{ asset('assets') }}/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-2 font-weight-bold text-white">App Gestão</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <ul class="navbar-nav">
        <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Inicio</h6>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white {{ $activePage == 'user-profile' ? 'active bg-gradient-primary' : '' }} "
                href="{{ route('user-profile') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i style="font-size: 1.2rem;" class="fas fa-user-circle ps-2 pe-2 text-center"></i>
                </div>
                <span class="nav-link-text ms-1">Usuário</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-white {{ $activePage == 'user-profile' ? 'active bg-gradient-primary' : '' }} "
                href="{{ route('user-profile') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i style="font-size: 1.2rem;" class="fa-solid fa-users-line ps-2 pe-2 text-center"></i>
                </div>
                <span class="nav-link-text ms-1">Clientes</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-white {{ $activePage == 'user-profile' ? 'active bg-gradient-primary' : '' }} "
                href="{{ route('user-profile') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i style="font-size: 1.2rem;" class="fa-solid fa-sitemap ps-2 pe-2 text-center"></i>
                </div>
                <span class="nav-link-text ms-1">Produtos</span>
            </a>
        </li>

        
        <!-- INICIO ITENS SERVIÇOS -->
        <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Serviços</h6>
        </li>

        <li class="nav-item">
            <a class="nav-link text-white {{ $activePage == 'checklist' ? 'active bg-gradient-primary' : '' }} "
                href="{{ route('checklist.index') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i style="font-size: 1.2rem;" class="fa-solid fa-list-check ps-2 pe-2 text-center"></i>
                </div>
                <span class="nav-link-text ms-1">Checklist</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-white {{ $activePage == 'user-profile' ? 'active bg-gradient-primary' : '' }} "
                href="{{ route('user-profile') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i style="font-size: 1.2rem;" class="fa-solid fa-list-check ps-2 pe-2 text-center"></i>
                </div>
                <span class="nav-link-text ms-1">Cria lista de verificação</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-white {{ $activePage == 'user-profile' ? 'active bg-gradient-primary' : '' }} "
                href="{{ route('user-profile') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i style="font-size: 1.2rem;" class="fa-solid fa-list-check ps-2 pe-2 text-center"></i>
                </div>
                <span class="nav-link-text ms-1">Cria lista de produtos</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-white {{ $activePage == 'servicos' ? 'active bg-gradient-primary' : '' }} "
                href="{{ route('servico.index') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i style="font-size: 1.2rem;" class="fa-solid fa-list-check ps-2 pe-2 text-center"></i>
                </div>
                <span class="nav-link-text ms-1">Cria serviços</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-white {{ $activePage == 'user-profile' ? 'active bg-gradient-primary' : '' }} "
                href="{{ route('user-profile') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i style="font-size: 1.2rem;" class="fa-solid fa-list-check ps-2 pe-2 text-center"></i>
                </div>
                <span class="nav-link-text ms-1">Contratos</span>
            </a>
        </li>
        <!-- Fim SERVIÇOS -->

        <!-- inicio financeiro -->
        <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Financeiro</h6>
        </li>

        <li class="nav-item">
            <a class="nav-link text-white {{ $activePage == 'user-profile' ? 'active bg-gradient-primary' : '' }} "
                href="{{ route('user-profile') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i style="font-size: 1.2rem;" class="fa-solid fa-coins ps-2 pe-2 text-center"></i>
                </div>
                <span class="nav-link-text ms-1">Compras</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white {{ $activePage == 'user-profile' ? 'active bg-gradient-primary' : '' }} "
                href="{{ route('user-profile') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i style="font-size: 1.2rem;" class="fa-solid fa-coins ps-2 pe-2 text-center"></i>
                </div>
                <span class="nav-link-text ms-1">Vendas</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white {{ $activePage == 'user-profile' ? 'active bg-gradient-primary' : '' }} "
                href="{{ route('user-profile') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i style="font-size: 1.2rem;" class="fa-solid fa-coins ps-2 pe-2 text-center"></i>
                </div>
                <span class="nav-link-text ms-1">Impostos</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-white {{ $activePage == 'user-profile' ? 'active bg-gradient-primary' : '' }} "
                href="{{ route('user-profile') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i style="font-size: 1.2rem;" class="fa-solid fa-coins ps-2 pe-2 text-center"></i>
                </div>
                <span class="nav-link-text ms-1">Taxa das máquinas</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-white {{ $activePage == 'user-profile' ? 'active bg-gradient-primary' : '' }} "
                href="{{ route('user-profile') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i style="font-size: 1.2rem;" class="fa-solid fa-coins ps-2 pe-2 text-center"></i>
                </div>
                <span class="nav-link-text ms-1">Contas a pagar</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-white {{ $activePage == 'user-profile' ? 'active bg-gradient-primary' : '' }} "
                href="{{ route('user-profile') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i style="font-size: 1.2rem;" class="fa-solid fa-coins ps-2 pe-2 text-center"></i>
                </div>
                <span class="nav-link-text ms-1">Contas a receber</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-white {{ $activePage == 'user-profile' ? 'active bg-gradient-primary' : '' }} "
                href="{{ route('user-profile') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i style="font-size: 1.2rem;" class="fa-solid fa-coins ps-2 pe-2 text-center"></i>
                </div>
                <span class="nav-link-text ms-1">Relatórios</span>
            </a>
        </li>


    </ul>
</aside>
