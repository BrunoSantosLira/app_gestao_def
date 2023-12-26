<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="compras"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="compras"></x-navbars.navs.auth>

        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Listagem de ordem de compras</h6>
                            </div>
                                                    
                            <a href="{{route('compras.create')}}"><button class="btn btn-outline-primary btn-sm mt-3">Adicionar compra</button></a> 
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
                            
                        <form class="row m-3" method="GET" action="{{ route('compras.index') }}">
                            <div class="col-md-4">
                                <h5>Buscar pelo Fornecedor</h5>
                                <label for="inputPassword2" class="visually-hidden">Fornecedor:</label>
                                <select name="fornecedor_id" class="form-control border border-2 p-2">
                                    <option value="">Todos</option>
                                    @foreach ($fornecedores as $f)
                                        <option value="{{ $f->id }}">{{ $f->nome_fantasia }}</option>
                                    @endforeach
                                </select>
                            </div>
                        
                            <div class="col-md-3">
                                <h5>Data</h5>
                                <label for="data" class="visually-hidden">Data:</label>
                                <input type="date" name="created_at" class="form-control border border-2 p-2">
                            </div>
                        
                            <div class="col-md-3">
                                <h5>Status:</h5>
                                <label for="status" class="visually-hidden">Status:</label>
                                <select name="status" id="status" class="form-control border border-2 p-2">
                                    <option value="">Todos</option>
                                    <option value="0">PENDENTE</option>
                                    <option value="1">FINALIZADO</option>
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
                                        @foreach ($compras->links()->elements[0] as $page => $url)
                                            @php
                                                // Adiciona os parâmetros de filtro às URLs de paginação
                                                $url = $url . "&fornecedor_id=" . request('fornecedor_id') . "&created_at=" . request('created_at' ) . "&status=" . request('status' );
                                            @endphp
                                
                                            <li class="page-item {{ $compras->currentPage() == $page ? 'active' : '' }}">
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
                                            FORNECEDOR
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            VALOR TOTAL
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            STATUS
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            DATA DA COMPRA
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 float-end">
                                            AÇÕES
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($compras as $key => $compra)       
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">#{{$compra['id']}}</h6>
                                                    </div>
                                                </div>
                                            </td>   
                                            <td>
                                                <h6 class="text-sm font-weight-bold mb-0">{{$compra['fornecedor']['nome_fantasia']}}</h6>
                                            </td>

                                            <td>
                                                <h6 class="text-sm font-weight-bold mb-0">R${{$compra['valorTotal']}}</h6>
                                            </td>

                                            <td>
                                                <h6 class="text-sm font-weight-bold mb-0">
                                                    {{$compra['status'] == 0 ? 'PENDENTE' : 'FINALIZADO'}}
                                                </h6>
                                            </td>

                                            
                                            <td>
                                                <h6 class="text-sm font-weight-bold mb-0">{{\Carbon\Carbon::parse($compra['created_at'])->format('d/m/Y')}}</h6>
                                            </td>

                                            <td class="float-end">
                                                <div class="d-flex px-2">
                                                    @if ($compra['status'] == 0)
                                                        <a  href="{{route('compra.aprovar', ['compra' => $compra->id])}}"><i class="fa-solid fa-check m-2" style="color: #31b452; "></i></a>
                                                        <a target="_blank" href="{{route('compras.edit', ['compra' => $compra->id])}}"><i class="fa-solid fa-pen-to-square m-2" style="color: #1160e8; "></i></a> 
                                                    @else
                                                        <a target="_blank" href="{{route('compras.show', ['compra' => $compra->id])}}"><i class="fa-solid fa-eye m-2" style="color: #1160e8;"></i></a>
                                                    @endif
                                                   
                                                    <form action="{{route('compras.destroy', ['compra' => $compra->id])}}" class="d-inline-block" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" style="background: none; border:none;" class="btn-xl" ><i  class="fa-solid fa-trash m-2" style="color: #f01800;"></i></button>
                                                    </form>
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
