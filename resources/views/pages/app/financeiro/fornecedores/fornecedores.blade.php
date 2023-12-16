<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="fornecedores"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="fornecedores"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Lista de fornecedores</h6>
                            </div>
                            @if (Session::has('success'))
                                <div class="alert alert-success text-white">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            <a href="{{route('fornecedores.create')}}"><button class="btn btn-outline-primary btn-sm mt-3">Adicionar fornecedor</button></a> 
                         
                            @if (request('status') == 'sucesso')
                                <div class="alert alert-success text-white" role="alert">
                                    <strong>Sucesso!</strong> Adicionado com sucesso!
                                </div><br> 
                            @elseif(request('status') == 'erro')
                                <div class="alert alert-danger text-white" role="alert">
                                    <strong>ERRO!</strong> Erro na adição
                                </div><br> 
                            @endif
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </div>

                        
                        <form class="row m-3"  method="GET" action="{{route('fornecedores.index')}}">
                            <h5>Buscar pelo CNPJ</h5>
                            <div class="col-auto">
                              <label for="inputPassword2" class="visually-hidden">CNPJ</label>
                              <input type="text" class="form-control border border-2 p-2" id="inputPassword2" placeholder="Insira o CNPJ" name="cnpj">
                            </div>
                            <div class="col-auto">
                                <button type="submit"  style="background-color: #fb7609; border:none; border-radius:5px;" class=" btn btn-xl" ><i class="fa-solid fa-magnifying-glass fa-xl" style="color: #ffffff;"></i></button>
                            </div>
                        </form>
                        <hr>


                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-1"><!-- TABELA AQUI -->

                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $fornecedores->previousPageUrl() }}" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                
                                        {{-- Loop através das páginas geradas pela pagination do Laravel --}}
                                        @foreach ($fornecedores->links()->elements[0] as $page => $url)
                                            <li class="page-item {{ $fornecedores->currentPage() == $page ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                            </li>
                                        @endforeach
                                
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $fornecedores->nextPageUrl() }}" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>

                                <table class="table align-items-center justify-content-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                ID
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                NOME FANTASIA
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            EMAIL
                                            </th>
                                            <th  class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                CNPJ
                                            </th>
                                            <th  class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                WHATSAPP
                                            </th>
                                            <th  class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                ENDEREÇO
                                            </th>
                                            <th  class="text-uppercase float-end text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                AÇÕES
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($fornecedores as $fornecedor)
                                        <tr>
                                                <td>
                                                    <div class="d-flex px-2">
                                                        <div class="my-auto">
                                                            <h6 class="mb-0 text-sm">#{{$fornecedor['id']}}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">{{$fornecedor['nome_fantasia']}}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">{{$fornecedor['email']}}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">{{$fornecedor['cnpj']}}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">{{$fornecedor['whatsapp']}}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">{{$fornecedor['endereco']}}</p>
                                                </td>
                                                <td class="float-end">
                                                    <a target="_blank" href="{{route('fornecedores.edit', ['fornecedore' => $fornecedor->id])}}"><i class="fa-solid fa-pen-to-square m-2" style="color: #1160e8; font-size:1.2em;"></i></a>

                                                    <form method="POST" class="d-inline-block" action="{{route('fornecedores.destroy', ['fornecedore' => $fornecedor->id])}}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" style="background: none; border:none;" class="btn-xl"><i class="fa-solid fa-trash m-2" style="color: #f01800;"></i></button>
                                                    </form>     
                                                </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <x-footers.auth></x-footers.auth>
        </div>
    
    </main>
    <script>
    </script>
    <x-plugins></x-plugins>

</x-layout>
