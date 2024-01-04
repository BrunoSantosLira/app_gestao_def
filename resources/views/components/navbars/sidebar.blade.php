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
            <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Cadastro/Listagem</h6>
        </li>

        <li class="nav-item">
            <div class="dropdown">
                <a class="nav-link dropdown-toggle text-white {{ $activePage == 'Usuarios' ? 'active bg-gradient-primary' : '' }}" 
                   href="{{ route('usuarios.index') }}" 
                   id="navbarDropdownMenuLink2" 
                   role="button" 
                   data-bs-toggle="dropdown" 
                   aria-haspopup="true" 
                   aria-expanded="false">
                   <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i style="font-size: 1.2rem;" class="fa-solid fa-box-archive ps-2 pe-2 text-center"></i>
                    </div>
                     <span class="caret">Configurações</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                    <li>
                        <a class="dropdown-item" href="{{route('usuarios.index')}}">
                            Usuários do sistema
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('empresa.index')}}">
                            Empresa
                        </a>
                    </li>         
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <div class="dropdown">
                <a class="nav-link dropdown-toggle text-white {{ $activePage == 'Produtos' ? 'active bg-gradient-primary' : '' }}" 
                   href="{{ route('clientes.index') }}" 
                   id="navbarDropdownMenuLink2" 
                   role="button" 
                   data-bs-toggle="dropdown" 
                   aria-haspopup="true" 
                   aria-expanded="false">
                   <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i style="font-size: 1.2rem;" class="fa-solid fa-box-archive ps-2 pe-2 text-center"></i>
                    </div>
                     <span class="caret">Produtos</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                    <li>
                        <a class="dropdown-item" href="{{route('produtos.index')}}">
                            Listagem de produtos
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('produtos.create')}}">
                            Adicionar Produto
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('categorias.index')}}">
                            Listagem/Adicionar categoria
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('unidades.index')}}">
                            Listagem/Adicionar unidade
                        </a>
                    </li>
                    
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <div class="dropdown">
                <a class="nav-link dropdown-toggle text-white {{ $activePage == 'estoque' ? 'active bg-gradient-primary' : '' }}" 
                   href="" 
                   id="navbarDropdownMenuLink2" 
                   role="button" 
                   data-bs-toggle="dropdown" 
                   aria-haspopup="true" 
                   aria-expanded="false">
                   <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i style="font-size: 1.2rem;" class="fa-solid fa-boxes-packing ps-2 pe-2 text-center"></i>
                    </div>
                     <span class="caret">Estoque</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                    <li>
                        <a class="dropdown-item" href="{{route('entradas.index')}}">
                            Entradas
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('saidas.index')}}">
                            Saídas
                        </a>
                    </li>         
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <div class="dropdown">
                <a class="nav-link dropdown-toggle text-white {{ $activePage == 'OS' ? 'active bg-gradient-primary' : '' }}" 
                   href="{{ route('os.index') }}" 
                   id="navbarDropdownMenuLink2" 
                   role="button" 
                   data-bs-toggle="dropdown" 
                   aria-haspopup="true" 
                   aria-expanded="false">
                   <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i style="font-size: 1.2rem;" class="fa-solid fa-box-archive ps-2 pe-2 text-center"></i>
                    </div>
                     <span class="caret">OS</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                    <li>
                        <a class="dropdown-item" href="{{route('os.index')}}">
                            Listagem de OS
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('os.create')}}">
                            Adicionar OS
                        </a>
                    </li>         
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <div class="dropdown">
                <a class="nav-link dropdown-toggle text-white {{ $activePage == 'checklist' ? 'active bg-gradient-primary' : '' }}" 
                   href="{{ route('checklist.index') }}" 
                   id="navbarDropdownMenuLink2" 
                   role="button" 
                   data-bs-toggle="dropdown" 
                   aria-haspopup="true" 
                   aria-expanded="false">
                   <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i style="font-size: 1.2rem;" class="fa-solid fa-list-check ps-2 pe-2 text-center"></i>
                    </div>
                     <span class="caret">Checklists</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                    <li>
                        <a class="dropdown-item" href="{{route('checklist.index')}}">
                            Checklist de verificação
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('checklistProdutos.index')}}">
                            Checklist de produtos
                        </a>
                    </li>         
                </ul>
            </div>
        </li>
        
        
        <li class="nav-item">
            <a class="nav-link text-white {{ $activePage == 'servicos' ? 'active bg-gradient-primary' : '' }} "
                href="{{ route('servico.index') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i style="font-size: 1.2rem;" class="fa-solid fa-list ps-2 pe-2 text-center"></i>
                </div>
                <span class="nav-link-text ms-1">Serviços</span>
            </a>
        </li>

        
        <li class="nav-item">
            <a class="nav-link text-white {{ $activePage == 'Clientes' ? 'active bg-gradient-primary' : '' }} "
                href="{{ route('clientes.index') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i style="font-size: 1.2rem;" class="fa-solid fa-users-line ps-2 pe-2 text-center"></i>
                </div>
                <span class="nav-link-text ms-1">Clientes</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-white {{ $activePage == 'fornecedores' ? 'active bg-gradient-primary' : '' }} "
                href="{{ route('fornecedores.index') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i style="font-size: 1.2rem;" class="fa-solid fa-users-rectangle ps-2 pe-2 text-center"></i>
                </div>
                <span class="nav-link-text ms-1">Fornecedores</span>
            </a>
        </li>



        <li class="nav-item">
            <div class="dropdown">
                <a class="nav-link dropdown-toggle text-white {{ $activePage == 'contrato' ? 'active bg-gradient-primary' : '' }}" 
                   href="{{ route('contrato.index') }}" 
                   id="navbarDropdownMenuLink2" 
                   role="button" 
                   data-bs-toggle="dropdown" 
                   aria-haspopup="true" 
                   aria-expanded="false">
                   <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i style="font-size: 1.2rem;" class="fa-solid fa-file ps-2 pe-2 text-center"></i>
                    </div>
                     <span class="caret">Contratos</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                    <li>
                        <a class="dropdown-item" href="{{route('contrato.index')}}">
                            Listagem de Contratos
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('contrato.create')}}">
                            Adicionar Contratos
                        </a>
                    </li>         
                </ul>
            </div>
        </li>
        <!-- Fim SERVIÇOS -->

        <!-- inicio financeiro -->
        <li class="nav-item">
            <div class="dropdown">
                <a class="nav-link dropdown-toggle text-white {{ $activePage == 'financeiro' ? 'active bg-gradient-primary' : '' }}" 
                   href="{{ route('checklist.index') }}" 
                   id="navbarDropdownMenuLink2" 
                   role="button" 
                   data-bs-toggle="dropdown" 
                   aria-haspopup="true" 
                   aria-expanded="false">
                   <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i style="font-size: 1.2rem;" class="fa-solid fa-coins ps-2 pe-2 text-center"></i>
                    </div>
                     <span class="caret">Financeiro</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                    <li>
                        <a class="dropdown-item" href="{{route('compras.index')}}">
                            Compras
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('vendas.index')}}">
                            Vendas
                        </a>
                    </li>  
                    <li>
                        <a class="dropdown-item" href="{{route('conta.index')}}">
                            Caixa
                        </a>
                    </li>   
                    <li>
                        <a class="dropdown-item" href="{{route('ContasPagas.index')}}">
                            Contas a Pagar
                        </a>
                    </li>  
                    <li>
                        <a class="dropdown-item" href="{{route('ContasReceber.index')}}">
                            Contas a Receber
                        </a>
                    </li>  
                    <li>
                        <a class="dropdown-item" href="{{route('impostos.index')}}">
                            Impostos
                        </a>
                    </li> 
                    <li>
                        <a class="dropdown-item" href="{{route('impostos.index')}}">
                            Taxa das máquinas
                        </a>
                    </li>        
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <div class="dropdown">
                <a class="nav-link dropdown-toggle text-white {{ $activePage == 'relatorio' ? 'active bg-gradient-primary' : '' }}" 
                   href="" 
                   id="navbarDropdownMenuLink2" 
                   role="button" 
                   data-bs-toggle="dropdown" 
                   aria-haspopup="true" 
                   aria-expanded="false">
                   <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i style="font-size: 1.2rem;" class="fa-solid fa-folder-open ps-2 pe-2 text-center"></i>
                    </div>
                     <span class="caret">Relatórios</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                    <li>
                        <a class="dropdown-item" href="{{route('relatorio.ProdutosEstoque')}}">
                            Estoque: Produtos
                        </a>
                    </li> 
                    <li>
                        <a class="dropdown-item" href="{{route('relatorio.HistoricoCaixa')}}">
                            Financeiro: Histórico do caixa
                        </a>
                    </li> 
                    <li>
                        <a class="dropdown-item" href="{{route('relatorio.ContasAReceber')}}">
                            Financeiro: Contas a Receber
                        </a>
                    </li> 
                    <li>
                        <a class="dropdown-item" href="{{route('relatorio.ContasAPagar')}}">
                            Financeiro: Contas a Pagar
                        </a>
                    </li> 
                    <li>
                        <a class="dropdown-item" href="{{route('relatorio.geralClientes')}}">
                            Geral: Clientes
                        </a>
                    </li>        
                    <li>
                        <a class="dropdown-item" href="{{route('relatorio.geralFornecedores')}}">
                            Geral: Fornecedores
                        </a>
                    </li>        
                </ul>
            </div>
        </li>

    </ul>
</aside>
