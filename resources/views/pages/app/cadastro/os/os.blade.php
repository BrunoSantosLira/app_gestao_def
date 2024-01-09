<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="OS"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="OS"></x-navbars.navs.auth>

        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Listagem de OS</h6>
                            </div>
                        
                            <a href="{{route('os.create')}}"><button class="btn btn-outline-primary btn-sm mt-3">Adicionar OS</button></a> 
                            @if (Session::has('success'))
                                <div class="alert alert-success text-white">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                        </div>

                        <form class="row m-3" method="GET" action="{{ route('os.index') }}">
                            <div class="col-md-4">
                                <h5>Cliente</h5>
                                <label for="inputPassword2" class="visually-hidden">Fornecedor:</label>
                                <select name="cliente_id" class="form-control border border-2 p-2">
                                    <option value="">Todos</option>
                                    @foreach ($clientes as $cliente)
                                        <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                        
                            <div class="col-md-3">
                                <h5>ID</h5>
                                <div class="col-auto">
                                  <label for="inputPassword2" class="visually-hidden">ID</label>
                                  <input type="text" class="form-control border border-2 p-2" id="inputPassword2" placeholder="Exemplo: 20231131/14" name="id">
                                </div>
                            </div>
                        
                            <div class="col-md-3">
                                <h5>Status:</h5>
                                <label for="status" class="visually-hidden">Status:</label>
                                <select name="status" id="status" class="form-control border border-2 p-2">
                                    <option value="">Todos</option>
                                    <option class="" value="finalizado">Finalizado</option>
                                    <option class="" value="orçamento">Orçamento</option>
                                    <option class="" value="aberto">Aberto</option>
                                    <option class="" value="andamento">Em andamento</option>
                                    <option class="" value="cancelado">Cancelado</option>
                                    <option class="" value="Aguardando Peças">Aguardando Peças</option>
                                </select>
                            </div>
                        
                            <div class="col-md-2">
                                <h5>Buscar</h5>
                                <button type="submit" style="background-color: #fb7609; border:none; border-radius:5px;" class="btn btn-xl">
                                    <i class="fa-solid fa-magnifying-glass fa-xl" style="color: #ffffff;"></i>
                                </button>
                            </div>
                        </form>
                        
                        <hr>

                        <div class="card-body px-0 pb-2">
                            
                            <div class="table-responsive p-0"><!-- TABELA AQUI -->

                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        {{-- Loop através das páginas geradas pela pagination do Laravel --}}
                                        @foreach ($os->links()->elements[0] as $page => $url)
                                            @php
                                                // Adiciona os parâmetros de filtro às URLs de paginação
                                                $url = $url . "&id=" . request('id') . "&status=" . request('status' ) . "&cliente_id=" . request('cliente_id' );
                                            @endphp
                                
                                            <li class="page-item {{ $os->currentPage() == $page ? 'active' : '' }}">
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
                                            CLIENTE
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            RESPONSÁVEL
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Data inicial
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Data final
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Vencimento
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Valor total
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            STATUS
                                            </th>
                                            <th
                                            class="text-uppercase  text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            AÇÕES
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-size: 10px">
                                        @foreach ($os as $key => $o)   
                                        @php
                                            $dataInicial = \Carbon\Carbon::parse($o['data_inicial']);
                                            $dataDeVencimento = $dataInicial->addDays($o['dias_garantia']);
                                        @endphp                                               
                                        <tr>
                                                <td>
                                                    <div class="d-flex">
                                                        <div class="my-auto">
                                                            <h6 class="mb-0 text-sm">#{{$o['unique_id']}}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex ">
                                                        <div class="my-auto">
                                                            <h6 class="mb-0 text-sm">{{$o['cliente']['nome']}}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex ">
                                                        <div class="my-auto">
                                                            <h6 class="mb-0 text-sm">{{$o['responsavel']}}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex ">
                                                        <div class="my-auto">
                                                            <h6 class="mb-0 text-sm">{{ date('d/m/Y', strtotime($o['data_inicial'])) }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex ">
                                                        <div class="my-auto">
                                                            <h6 class="mb-0 text-sm">{{ date('d/m/Y', strtotime($o['data_final'])) }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <div class="my-auto " style="font-size: 14px">
                                                            <span class="badge bg-success text-dark">{{ $dataDeVencimento->format('d/m/Y') }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2">
                                                        <div class="my-auto">
                                                            <h6 class="mb-0 text-sm">R${{{$o['valorTotal']}}}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2">
                                                        <div class="my-auto" style="font-size: 14px">
                                                                <span class="badge {{$o['status'] == 'finalizado' ? 'bg-success' : 'bg-warning'}} text-dark">{{$o['status']}}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2">
                                                        <div class="my-auto">
                                                            @if ($o['status'] != 'finalizado')
                                                                <a  href="{{route('os.aprovar', ['os' => $o->id])}}"><i class="fa-solid fa-check m-2" style="color: #31b452; font-size:1.5em;"></i></a>
                                                                <button type="submit" style="background: none; border:none;" class="btn-xl" ><i  class="fa-solid fa-trash m-2" style="color: #f01800; font-size:1.5em;"></i></button>
                                                            @endif
                                                            @if ($o['status'] == 'finalizado')
                                                                <a  href="{{route('osparcelas.index', ['os' => $o->id])}}"><i class="fa-solid fa-file m-2" style="color: #000000; font-size:1.5em;"></i></a>
                                                            @endif
                                                            <a target="_blank" href="{{route('os.show', ['o' => $o->id])}}"><i class="fa-solid fa-eye m-2" style="color: #31b452; font-size:1.5em;"></i></a>
                                                            <a target="_blank" href="{{route('os.edit', ['o' => $o->id])}}"><i class="fa-solid fa-pen-to-square m-2" style="color: #1160e8; font-size:1.5em;"></i></a>
                                                            <form action="{{route('os.destroy', ['o' => $o->id])}}" class="d-inline-block" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
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
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <script>
    </script>
    <x-plugins></x-plugins>

</x-layout>
