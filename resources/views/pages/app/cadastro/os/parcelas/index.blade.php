<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="cadastro"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Parcelas da OS"></x-navbars.navs.auth>

        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Listagem de parcelas da OS</h6>
                            </div>
                        
                            @if (Session::has('success'))
                                <div class="alert alert-success text-white">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0"><!-- TABELA AQUI -->
                                <a href="{{route('os.index')}}" class="m-3"><i class="fa-solid fa-square-caret-left fa-2xl"></i></a>

                                <table class="table align-items-center justify-content-center mb-0">
                                    <thead>

                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                ID
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            DATA DE VENCIMENTO
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Valor
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
                                        @foreach ($parcelas as $parcela)
                                            
                                                <tr>
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="my-auto">
                                                                    <h6>#{{$parcela['id']}}</h6> 
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex ">
                                                                <div class="my-auto">
                                                                   <h6>{{ date('d/m/Y', strtotime($parcela['data_vencimento'])) }}</h6> 
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex ">
                                                                <div class="my-auto">
                                                                   <h6>{{$parcela['valor']}}</h6> 
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex ">
                                                                <div class="my-auto" style="font-size: 14px">
                                                                    <h6 class="badge {{$parcela['status_pagamento'] == 'Pendente' ? 'bg-warning' : 'bg-success'}} text-dark">{{$parcela['status_pagamento']}}</h6> 
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex ">
                                                                <div class="my-auto" >
                                                                    @if ($parcela['status_pagamento'] == 'Pendente')  
                                                                        <a  href="{{route('parcelas.aprovar', ['parcela' => $parcela->id])}}"><i class="fa-solid fa-square-check m-2" style="color: green; font-size:1.8em;"></i></a>
                                                                    @endif
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
