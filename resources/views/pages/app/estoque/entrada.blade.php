<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="entradas"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="entradas"></x-navbars.navs.auth>

        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Listagem de entradas</h6>
                            </div>
                        
                            <button class="btn btn-outline-primary btn-sm mt-3" data-bs-toggle="modal" data-bs-target="#ModalAdicionarEntrada">Adicionar entrada de produto em estoque</button>
                            @if (Session::has('success'))
                                <div class="alert alert-success text-white">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            @foreach ($errors->all() as $error)
                            <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </div>

                        <!-- BUSCA -->
                        <form class="row m-3" method="GET" action="{{ route('entradas.index') }}">
                            <div class="col-md-3">
                                <h5>Produto</h5>                     
                                <select name="produto_id" class="form-control border border-2 p-2">
                                    <option value="">Todos</option>
                                    @foreach ($produtos as $produto)
                                        <option value="{{$produto->id}}">{{$produto->produto}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3">
                                <h5>Data</h5>
                                <label for="data" class="visually-hidden">Data:</label>
                                <input type="date" name="created_at" class="form-control border border-2 p-2">
                            </div>

                            <div class="col-md-2">
                                <h5>Buscar</h5>
                                <button type="submit" style="background-color: #fb7609; border:none; border-radius:5px;" class="btn btn-xl">
                                    <i class="fa-solid fa-magnifying-glass fa-xl" style="color: #ffffff;"></i>
                                </button>
                            </div>
                        </form>
                        <hr>
                        <!-- FIM BUSCA -->
                
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0"><!-- TABELA AQUI -->
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        {{-- Loop através das páginas geradas pela pagination do Laravel --}}
                                        @foreach ($entradas->links()->elements[0] as $page => $url)
                                            @php
                                                // Adiciona os parâmetros de filtro às URLs de paginação
                                                $url = $url . "&produto_id=" . request('produto_id') . "&created_at=" . request('created_at' );
                                            @endphp
                                
                                            <li class="page-item {{ $entradas->currentPage() == $page ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                            </li>
                                        @endforeach
                                

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
                                            Produto
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Quantidade
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Tipo
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Data da entrada
                                            </th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($entradas as $key => $entrada)       
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">#{{$entrada['id']}}</h6>
                                                    </div>
                                                </div>
                                            </td>   
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{$entrada['produto']['produto']}}</p>
                                            </td>

                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{$entrada['quantidade']}}</p>
                                            </td>

                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{$entrada['tipo']}}</p>
                                            </td>

                                            
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{\Carbon\Carbon::parse($entrada['created_at'])->format('d/m/Y')}}</p>
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
             <!-- Modal -->
             <div class="modal fade" id="ModalAdicionarEntrada" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Entrada de estoque</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="{{route('entradas.store')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nome" class="form-label">Produto</label>
                                <select id="produto" class="form-select  p-2" name="produto_id">
                                    @foreach ($produtos as $key => $produto)
                                    <option value="{{$produto['id']}}">{{$produto['produto']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nome" class="form-label">Quantidade</label>
                                <input type="number"  class="form-control border border-2 p-2" name="quantidade" placeholder="Quantidade a ser adicionada">
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="floatingTextarea2">Tipo de entrada</label>
                                <input type="text"  class="form-control border border-2 p-2" placeholder="Descreva o tipo de entrada" name="tipo">

                            </div>
                            <button type="submit" class="btn btn-primary">Adicionar</button>
                        </form>
                    </div>

                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        
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
