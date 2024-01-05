<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="relatorio"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Relatório do histórico de vendas"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Histórico de vendas</h6>
                            </div>
                        </div>
                        
                        <form class="row m-3" method="GET" action="{{ route('relatorio.VendasPDF') }}">
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
                                            <th  class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Data
                                            </th>
                                            <th  class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Valor
                                            </th>
                                            <th  class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Tipo
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($vendas as $venda)                                                  
                                        <tr>
                                                <td>
                                                    <div class="d-flex px-2">
                                                        <div class="my-auto">
                                                            <h6 class="mb-0 text-sm">#{{$venda['id']}}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">{{ date('d/m/Y', strtotime($venda['created_at'])) }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">R${{$venda['valor']}}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">{{$venda['tipo']}}</p>
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
