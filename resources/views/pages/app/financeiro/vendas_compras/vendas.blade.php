<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="vendas"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="vendas"></x-navbars.navs.auth>

        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Listagem de vendas</h6>
                            </div>

                            <!-- BUSCA -->
                            <form class="row m-3" method="GET" action="{{ route('vendas.index') }}">
                                <div class="col-md-3">
                                    <h5>Tipo</h5>
                                    <label for="tipo" class="visually-hidden">Tipo:</label>
                                    <select name="tipo" class="form-control border border-2 p-2">
                                        <option value="">Todos</option>
                                        <option value="Contrato">Contrato</option>
                                        <option value="OS">OS</option>
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
                        
                            @if (Session::has('success'))
                                <div class="alert alert-success text-white">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            @if (Session::has('erro'))
                            <div class="alert alert-danger text-white">
                                {{ Session::get('erro') }}
                            </div>
                            @endif
                            @foreach ($errors->all() as $error)
                            <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </div>
                
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0"><!-- TABELA AQUI -->
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
          
                                
                                        {{-- Loop através das páginas geradas pela pagination do Laravel --}}
                                        @foreach ($vendas->links()->elements[0] as $page => $url)
                                            @php
                                                // Adiciona os parâmetros de filtro às URLs de paginação
                                                $url = $url . "&tipo=" . request('tipo') . "&created_at=" . request('created_at' );
                                            @endphp
                                
                                            <li class="page-item {{ $vendas->currentPage() == $page ? 'active' : '' }}">
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
                                            OS/CONTRATO/CHECKLIST ID
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            VALOR TOTAL
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            TIPO
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            DATA DE REGISTRO
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($vendas as $key => $venda)       
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">#{{$venda['id']}}</h6>
                                                    </div>
                                                </div>
                                            </td>   
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{$venda['os_id']}}  {{$venda['contrato_id']}} {{$venda['checklist_id']}}</p>
                                            </td>

                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{$venda['valor']}}</p>
                                            </td>

                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{$venda['tipo']}}</p>
                                            </td>
        
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{\Carbon\Carbon::parse($venda['created_at'])->format('d/m/Y')}}</p>
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
