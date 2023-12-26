<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="conta"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="conta"></x-navbars.navs.auth>

        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">{{$conta->nome}}</h6>
                            </div>
                            <button class="btn btn-outline-success btn-sm mt-3"  data-bs-toggle="modal" data-bs-target="#ModalEntradaConta">Adicionar/retirar Capital</button>

                            <div class="row d-flex justify-content-center">
                                <div class="col-xl-3 col-sm-6 mb-xl-0 m-4">
                                    <div class="card">
                                        <div class="card-header p-3 pt-2">
                                            <div
                                                class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                                <i class="fa-solid fa-money-bill"></i>                                        </div>
                                            <div class="text-end pt-1">
                                                <p class="text-sm mb-0 text-capitalize">Capital total</p>
                                                <h4 class="mb-0">R${{$conta->capital}}</h4>
                                            </div>
                                        </div>
                                        <hr class="dark horizontal my-0">
                                        
                                    </div>
                                </div>
    
                                <div class="col-xl-3 col-sm-6 mb-xl-0 m-4">
                                    <div class="card">
                                        <div class="card-header p-3 pt-2">
                                            <div
                                                class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                                <i class="fa-solid fa-calendar-days"></i>                                    </div>
                                            <div class="text-end pt-1">
                                                <p class="text-sm mb-0 text-capitalize">Data de abertura</p>
                                                <h4 class="mb-0">{{ date('d/m/Y', strtotime($conta['created_at'])) }}</h4>
                                            </div>
                                        </div>
                                        <hr class="dark horizontal my-0">
                                        
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <!-- BUSCA -->
                        <form class="row m-3" method="GET" action="{{ route('conta.show', $conta->id) }}">
                            <div class="col-md-3">
                                <h5>Tipo</h5>
                                <label for="tipo" class="visually-hidden">Tipo:</label>
                                <select name="tipo" class="form-control border border-2 p-2">
                                    <option value="">Todos</option>
                                    <option value="entrada">Entrada</option>
                                    <option value="saida">Saída</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <h5>Data</h5>
                                <label for="data" class="visually-hidden">Data:</label>
                                <input type="date" name="data" class="form-control border border-2 p-2">
                            </div>

                            <div class="col-md-2">
                                <h5>Buscar</h5>
                                <button type="submit" style="background-color: #fb7609; border:none; border-radius:5px;" class="btn btn-xl">
                                    <i class="fa-solid fa-magnifying-glass fa-xl" style="color: #ffffff;"></i>
                                </button>
                            </div>
                        </form>
                        <!-- FIM BUSCA -->

                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0"><!-- TABELA AQUI -->
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        
                                                                        
                                        {{-- Loop através das páginas geradas pela pagination do Laravel --}}
                                        @foreach ($historico->links()->elements[0] as $page => $url)
                                            @php
                                                // Adiciona os parâmetros de filtro às URLs de paginação
                                                $url = $url . "&tipo=" . request('tipo') . "&data=" . request('data');
                                            @endphp

                                            <li class="page-item {{ $historico->currentPage() == $page ? 'active' : '' }}">
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
                                            TIPO
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            VALOR
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            DETALHES
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            DATA
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($historico as $h)                                                
                                        <tr class="{{($h->tipo == 'entrada') ? 'bg-success' : 'bg-danger'}}">
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">{{$h->id}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">{{$h->tipo}}</h6>
                                                    </div>
                                                </div>
                                            </td> 
                                            
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">R${{$h->capital}}</h6>
                                                    </div>
                                                </div>
                                            </td>  
                                            
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">{{$h->detalhes}}</h6>
                                                    </div>
                                                </div>
                                            </td>   
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">{{ date('d/m/Y', strtotime($h['created_at'])) }}</h6>
                                                    </div>
                                                </div>
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
            <!-- Modal ADICIONAR ENTRADA NA CONTA -->
            <div class="modal fade" id="ModalEntradaConta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Conta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="{{route('conta_entradas.store')}}" method="POST">
                            @csrf


                            <div class="mb-3 col-md-6">
                                <label class="form-label">Conta</label>
                                <select id="conta_id" class="form-select  p-2" name="conta_id">
                                    <option value="{{$conta['id']}}">{{$conta['nome']}}</option>
                                </select>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Tipo</label>
                                <select id="tipo" class="form-select  p-2" name="tipo">
                                    <option value="entrada">Entrada</option>
                                    <option value="saida">Saida</option>
                                </select>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Valor da entrada/saida</label>
                                <input type="number" name="capital"  class="form-control border border-2 p-2" required placeholder="Valor:">
                            </div>
                    
                            <div class="mb-3 col-md-12">
                                <label for="floatingTextarea2">Detalhes</label>
                                <textarea class="form-control border border-2 p-2"
                                    placeholder="Detalhes da entrada" id="detalhes" name="detalhes" required
                                    rows="4" cols="50"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">ADICIONAR</button>
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
