<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="relatorio"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Relatório de Contas a Receber "></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Lista de Contas a Receber</h6>
                            </div>
                        </div>

                        <form class="row m-3" method="GET" action="{{ route('relatorio.ContasAReceberPDF') }}">
                            <div class="col-md-3">
                                <h5>Status</h5>
                                <label for="data" class="visually-hidden">Status:</label>
                                <select name="status" id="" class="form-control border border-2 p-2">
                                    <option value="">Todos</option>
                                    <option value="pendente">Pendente</option>
                                    <option value="atrasado">Atrasado/Vencida</option>
                                    <option value="pago">Pago</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <h5>Data início</h5>
                                <label for="data" class="visually-hidden">Data de vencimento:</label>
                                <input type="date" name="data_inicio" class="form-control border border-2 p-2">
                                <small>Filtrado com base na data de vencimento</small>
                            </div>

                            <div class="col-md-3">
                                <h5>Data Final</h5>
                                <label for="data" class="visually-hidden">Data de vencimento:</label>
                                <input type="date" name="data_final" class="form-control border border-2 p-2">
                                <small>Filtrado com base na data de vencimento</small>
                            </div>
                                     
                            <div class="col-md-2">
                                <h5>PDF</h5>
                                <button type="submit" style="background-color: gray; border:none; border-radius:5px;" class="btn btn-xl">
                                    <i class="fa-solid fa-file-pdf fa-xl" style="color: #ffffff;"></i>
                                </button>
                            </div>
                        </form>
                        <hr>


                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-1"><!-- TABELA AQUI -->
                                <table class="table align-items-center justify-content-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                ID
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Status
                                            </th>
                                            <th  class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Nome
                                            </th>
                                            <th  class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Vencimento
                                            </th>
                                            <th  class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Valor
                                            </th>
                                            <th  class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Obs.
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ContasAReceber as $conta)                                                  
                                        <tr>
                                                <td>
                                                    <div class="d-flex px-2">
                                                        <div class="my-auto">
                                                            <h6 class="mb-0 text-sm">#{{$conta['id']}}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">{{$conta->status}}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">{{$conta['nome']}}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">{{ date('d/m/Y', strtotime($conta['data_vencimento'])) }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">R${{$conta['valor']}}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">{{$conta['observacoes']}}</p>
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
