<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="relatorio"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Relatório de estoque dos produtos"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Lista de produtos</h6>
                            </div>
                            <a href="{{route('relatorio.ProdutosEstoquePDF')}}"><button class="btn btn-outline-primary btn-sm mt-3">Imprimir/Salvar PDF</button></a> 

                        </div>


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
                                                Nome
                                            </th>
                                            <th  class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Código de barras
                                            </th>
                                            <th  class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Estoque Atual
                                            </th>
                                            <th  class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Custo
                                            </th>
                                            <th  class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Venda
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Estoque as $produto)                                                  
                                        <tr>
                                                <td>
                                                    <div class="d-flex px-2">
                                                        <div class="my-auto">
                                                            <h6 class="mb-0 text-sm">#{{$produto['id']}}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">{{$produto['produto']}}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">{{$produto['codigo_de_barras']}}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">{{$produto['estoqueAtual']}}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">R${{$produto['valorCompra']}}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">R${{$produto['valorVenda']}}</p>
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
