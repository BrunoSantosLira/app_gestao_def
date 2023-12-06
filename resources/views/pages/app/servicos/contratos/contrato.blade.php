<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="contrato"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="contrato"></x-navbars.navs.auth>

        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Listagem de Contrato</h6>
                            </div>
                        
                            <a href="{{route('contrato.create')}}"><button class="btn btn-outline-primary btn-sm mt-3">Adicionar Contrato</button></a> 
                            @if (Session::has('success'))
                                <div class="alert alert-success text-white">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                        </div>

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
                                        @foreach ($contratos as $contrato)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex">
                                                            <div class="my-auto">
                                                                <h6 class="mb-0 text-sm">#{{$contrato['id']}}</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex ">
                                                            <div class="my-auto">
                                                                <h6 class="mb-0 text-sm">{{$contrato['cliente']['nome']}}</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex ">
                                                            <div class="my-auto">
                                                                <h6 class="mb-0 text-sm">{{$contrato['responsável']}}</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex ">
                                                            <div class="my-auto">
                                                                <h6 class="mb-0 text-sm">{{ date('d/m/Y', strtotime($contrato['data_inicio'])) }}</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex ">
                                                            <div class="my-auto">
                                                                <h6 class="mb-0 text-sm">{{ date('d/m/Y', strtotime($contrato['data_fim'])) }}</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <div class="my-auto " style="font-size: 14px">
                                                                <span class="badge bg-success text-dark">R${{{$contrato['valorTotal']}}}</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex px-2">
                                                            <div class="my-auto">
                                                                <h6 class="mb-0 text-sm">{{{($contrato['status'] == 0) ? 'ABERTO' : 'FINALIZADO'}}}</h6>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="d-flex px-2">
                                                            @if ($contrato['status'] == 0)
                                                                <a  href="{{route('contrato.aprovar', ['contrato' => $contrato->id])}}"><i class="fa-solid fa-check m-2" style="color: #31b452; font-size:1.5em;"></i></a>
                                                            @endif
                                                            @if ($contrato['status'] == 1)
                                                                <a  href="{{route('parcelas.index', ['contrato' => $contrato->id])}}"><i class="fa-solid fa-file m-2" style="color: #000000; font-size:1.5em;"></i></a>
                                                            @endif
                                                            <a target="_blank" href="{{route('contrato.edit', ['contrato' => $contrato->id])}}"><i class="fa-solid fa-pen-to-square m-2" style="color: #1160e8; font-size:1.5em;"></i></a>
                                                            <form action="{{route('contrato.destroy', ['contrato' => $contrato->id])}}" class="d-inline-block" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" style="background: none; border:none;" class="btn-xl" ><i  class="fa-solid fa-trash m-2" style="color: #f01800; font-size:1.5em;"></i></button>
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
