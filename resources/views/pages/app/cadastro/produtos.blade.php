<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="Produtos"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Produtos"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Lista de produtos</h6>
                            </div>
                        
                            <a href="{{route('produtos.create')}}"><button class="btn btn-outline-primary btn-sm mt-3">Adicionar produto</button></a> 
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
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
                                            CATEGORIA
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            UNIDADE
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                PRODUTO
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            PREÇO
                                            </th>
                                            <th  class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                ESTOQUE ATUAL
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($produtos as $produto)                                                  
                                        <tr>
                                                <td>
                                                    <div class="d-flex px-2">
                                                        <div class="my-auto">
                                                            <h6 class="mb-0 text-sm">{{$produto['id']}}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0"><input class="form-control" type="text" name="nome" value="{{$produto['categoria']['categoria']}}"></p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0"><input class="form-control" type="text" name="nome" value="{{$produto['unidade']['unidade']}}"></p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0"><input class="form-control" type="text" name="nome" value="{{$produto['produto']}}"></p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0"><input class="form-control" type="text" name="email" value="R${{$produto['preco']}}"></p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0"><input class="form-control" type="text" name="CPF/CNPJ" value="{{$produto['estoqueAtual']}}"></p>
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
