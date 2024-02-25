<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="Produtos"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Produtos"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div style="background-color: #61655d" class=" shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Lista de produtos em estoque</h6>
                            </div>
                        
                            <a href="{{route('produtos.create')}}"><button class="btn btn-outline-primary btn-sm mt-3">Adicionar produto</button></a> 
                            @if (Session::has('success'))
                                <div class="alert alert-success text-white">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                         
                        </div>
                        <!-- BUSCA -->
                        <form class="row m-3" method="GET" action="{{ route('produtos.index') }}">
                            <div class="col-md-3">
                                <h5>Produto</h5>                     
                                <select name="id" class="form-control border border-2 p-2">
                                    <option value="">Todos</option>
                                    @foreach ($listaProdutos as $produto)
                                        <option value="{{$produto->id}}">{{$produto->produto}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3">
                                <h5>Cod. Barra</h5>
                                <input type="text" name="codigo_de_barras" class="form-control border border-2 p-2" placeholder="Código de barras do produto">
                            </div>
                            
                            <div class="col-md-3">
                                <h5>Quantidade de itens</h5>
                                <input type="number" name="qtde_itens" class="form-control border border-2 p-2" placeholder="Insira a quantidade de itens exibida">
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
                                        @foreach ($produtos->links()->elements[0] as $page => $url)
                                            @php
                                                // Adiciona os parâmetros de filtro às URLs de paginação
                                                $url = $url . "&id=" . request('id') . "&codigo_de_barras=" . request('codigo_de_barras' ) . "&qtde_itens=" . request('qtde_itens' );
                                            @endphp
                                
                                            <li class="page-item {{ $produtos->currentPage() == $page ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </nav>

                                <table class="table align-items-center justify-content-center mb-0 table-hover">
                                    <thead>

                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                ID
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Cod. Barra
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            UNIDADE
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                PRODUTO
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            PREÇO
                                            </th>
                                            <th  class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                ESTOQUE ATUAL
                                            </th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($produtos as $produto)                                                  
                                        <tr>
                                                <td>
                                                    <div class="d-flex px-2">
                                                        <div class="my-auto">
                                                            <h6 class="mb-0 text-sm">#{{$produto['id']}}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">{{$produto['codigo_de_barras']}}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">{{$produto['unidade']['unidade']}}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">{{$produto['produto']}}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">R${{$produto['preco']}}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">{{$produto['estoqueAtual']}}</p>
                                                </td>
                                                <td>
                                                    @if (auth()->user()->email == 'admin@material.com')
                                                        <form method="GET" class="d-inline-block" action="{{route('produtos.edit', ['produto' => $produto->id])}}">
                                                            @csrf
                                                            <button type="submit" style="background: none; border:none;" class="btn-xl"><i class="fa-solid fa-pen-to-square m-2" style="color: #1160e8;"></i></button>
                                                        </form>     

                                                        <form method="POST" class="d-inline-block" action="{{route('produtos.destroy', ['produto' => $produto->id])}}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" style="background: none; border:none;" class="btn-xl"><i class="fa-solid fa-trash m-2" style="color: #f01800;"></i></button>
                                                        </form>     
                                                    @endif 
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
