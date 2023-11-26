<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="Clientes"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Clientes"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Lista de clientes</h6>
                            </div>
                            <button class="btn btn-outline-primary btn-sm mt-3"  data-bs-toggle="modal" data-bs-target="#ModalAdicionarCliente">Adicionar Cliente</button>
                         
                            @if (request('status') == 'sucesso')
                                <div class="alert alert-success text-white" role="alert">
                                    <strong>Sucesso!</strong> Adicionado com sucesso!
                                </div><br> 
                            @elseif(request('status') == 'erro')
                                <div class="alert alert-danger text-white" role="alert">
                                    <strong>ERRO!</strong> Erro na adição
                                </div><br> 
                            @endif
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
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
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                NOME
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            EMAIL
                                            </th>
                                            <th  class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                CPF/CNPJ
                                            </th>
                                            <th  class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                TELEFONE
                                            </th>
                                            <th  class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                LOCALIZAÇÃO
                                            </th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($clientes as $cliente)                                                  
                                        <tr>
                                                <td>
                                                    <div class="d-flex px-2">
                                                        <div class="my-auto">
                                                            <h6 class="mb-0 text-sm">#{{$cliente['id']}}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                            @if (auth()->user()->email == 'admin@material.com')
                                                @if ($cliente['email'] != auth()->user()->email)
                                                    <form method="POST" action="{{route('clientes.update', ['cliente' => $cliente['id']])}}" class="d-inline-block">           
                                                    @csrf
                                                    @method('PATCH')                                                
                                                @endif
                                            @endif 
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0"><input class="form-control" type="text" name="nome" value="{{$cliente['nome']}}"></p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0"><input class="form-control" type="text" name="email" value="{{$cliente['email']}}"></p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0"><input class="form-control" type="text" name="CPF/CNPJ" value="{{$cliente['CPF/CNPJ']}}"></p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0"><input class="form-control" type="text" name="telefone" value="{{$cliente['telefone']}}"></p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0"><input class="form-control" type="text" name="localizacao" value="{{$cliente['localizacao']}}"></p>
                                                </td>
                                                <td class="float-end">
                                                @if (auth()->user()->email == 'admin@material.com')
                                                        @if ($cliente['email'] != auth()->user()->email)
                                                        <button type="submit" class="btn btn-outline-primary btn-sm">Atualizar</button> 
                                                        </form>
                                                        
                                                        <form method="POST" class="d-inline-block" action="{{route('clientes.destroy', ['cliente' => $cliente->id])}}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-outline-danger btn-sm">Excluir</button>
                                                        </form>     
                                                    @endif
                                                @endif 
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
        <!-- Modal USUÁRIO -->
        <div class="modal fade" id="ModalAdicionarCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="{{route('clientes.store')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">*Nome/Razão Social</label>
                            <input type="text" class="form-control border border-2 p-2" id="name" placeholder="Nome" name="nome">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">*Email</label>
                            <input type="email" class="form-control border border-2 p-2" id="email" placeholder="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="text" class="form-label">*CPF/CNPJ</label>
                            <input type="text" class="form-control border border-2 p-2" id="text" placeholder="Senha" name="CPF/CNPJ">
                        </div>
                        <div class="mb-3">
                            <label for="tel" class="form-label">*Telefone</label>
                            <input type="tel" class="form-control border border-2 p-2" id="tel" placeholder="Telefone" name="telefone">
                        </div>
                        <div class="mb-3">
                            <label for="localizacao" class="form-label">*Localização</label>
                            <input type="text" class="form-control border border-2 p-2" id="localizacao" placeholder="Localização:" name="localizacao">
                        </div>
                        <button type="submit" class="btn btn-primary">Adicionar</button>
                    </form>
                </div>

                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>

            </div>
            </div>
        </div>



    </main>
    <script>
    </script>
    <x-plugins></x-plugins>

</x-layout>
