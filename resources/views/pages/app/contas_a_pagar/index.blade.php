<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="ContasAPagar"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="ContasAPagar"></x-navbars.navs.auth>

        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Listagem de Contas a Pagar</h6>
                            </div>
                        
                            <a href="{{route('ContasPagas.create')}}"><button class="btn btn-outline-primary btn-sm mt-3">Adicionar Conta a pagar</button></a> 
                            @if (Session::has('success'))
                                <div class="alert alert-success text-white">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            @foreach ($errors->all() as $error)
                            <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </div>
                        <form class="row m-3" method="GET" action="{{ route('ContasPagas.index') }}">
                        
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
                       
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0"><!-- TABELA AQUI -->

                                <table class="table align-items-center justify-content-center mb-0">
                                    <thead>

                                        <tr>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            ID
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            NOME
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            STATUS
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            DATA DE VENC.
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            DATA DE PAG.
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            VALOR
                                            </th>
                                            <th
                                            class="text-uppercase float-end text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            AÇÕES
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($contas as $conta)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">#{{$conta->id}}</h6>
                                                    </div>
                                                </div>
                                            </td>   
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{$conta->nome}}</p>
                                            </td>

                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{$conta->status_pagamento}}</p>
                                            </td>

                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ date('d/m/Y', strtotime($conta['data_vencimento'])) }}</p>
                                            </td>

                                            
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">
                                                    @if ($conta['data_pagamento'])
                                                        {{ date('d/m/Y', strtotime($conta['data_pagamento'])) }}
                                                    @else
                                                        AGUARDANDO
                                                    @endif
                                                    
                                                </p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">R${{$conta->valor}}</p>
                                            </td>
                                            <td class="float-end">
                                                <div class="d-flex px-2">
                                                    @if ($conta->status_pagamento != 'pago')
                                                    <a  href="{{route('ContasPagas.aprovar', ['conta' => $conta->id])}}"><i class="fa-solid fa-check m-2" style="color: #31b452; "></i></a>    
                                                    <a target="_blank" href="{{route('ContasPagas.edit', ['ContasPaga' => $conta->id])}}"><i class="fa-solid fa-pen-to-square m-2" style="color: #1160e8; "></i></a>       
                                                    <form action="{{route('ContasPagas.destroy', ['ContasPaga' => $conta->id])}}" class="d-inline-block" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" style="background: none; border:none;" class="btn-xl" ><i  class="fa-solid fa-trash m-2" style="color: #f01800;"></i></button>
                                                    </form>
                                                    
                                                        
                                                    @endif
                                                    <a target="_blank" href="{{route('ContasPagas.show', ['ContasPaga' => $conta->id])}}"><i class="fa-solid fa-eye m-2" style="color: #1160e8;"></i></a>
 
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
  
    <x-plugins></x-plugins>

</x-layout>
