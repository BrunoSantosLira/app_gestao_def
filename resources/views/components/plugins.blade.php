<div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
        <i class="material-icons py-2">settings</i>
    </a>
    <div class="card shadow-lg">
        <div class="card-header pb-0 pt-3">
            <div class="float-start">
                <h5 class="mt-3 mb-0">Configurações</h5>
                <p>Configurações disponíveis</p>
            </div>
            <div class="float-end mt-4">
                <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                    <i class="material-icons">clear</i>
                </button>
            </div>
            <!-- End Toggle Button -->
        </div>
        <hr class="horizontal dark my-1">
        <div class="card-body pt-sm-3 pt-0">
            <!-- Sidebar Backgrounds -->
            <!-- Sidenav Type -->
            <div class="mt-3">
                <h6 class="mb-0">Tipo de barra de navegação</h6>
                <p class="text-sm">Escolha entre três tipos diferentes de barra de navegação</p>
            </div>
            <div class="d-flex">
                <button class="btn bg-gradient-dark px-2 mb-2 active" data-class="bg-gradient-dark"
                    onclick="sidebarType(this)">Escuro</button>
                <button class="btn bg-gradient-dark px-2 mb-2 ms-2" data-class="bg-transparent"
                    onclick="sidebarType(this)">Transparente</button>
                <button class="btn bg-gradient-dark px-2 mb-2 ms-2" data-class="bg-white"
                    onclick="sidebarType(this)">Branco</button>
            </div>
            <p class="text-sm d-xl-none d-block mt-2">Você consegue mudar o tipo da barra de navegação apenas em Desktop</p>
            <!-- Navbar Fixed -->
            <div class="mt-3 d-flex">
                <h6 class="mb-0">Barra de navegação Fixa</h6>
                <div class="form-check form-switch ps-0 ms-auto my-auto">
                    <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed"
                        onclick="navbarFixed(this)">
                </div>
            </div>
            <hr class="horizontal dark my-3">
            <div class="mt-2 d-flex">
                <h6 class="mb-0">Claro / Escuro</h6>
                <div class="form-check form-switch ps-0 ms-auto my-auto">
                    <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version"
                        onclick="darkMode(this)">
                </div>
            </div>
            <hr class="horizontal dark my-sm-4">
            
            </div>
        </div>
    </div>
</div>
