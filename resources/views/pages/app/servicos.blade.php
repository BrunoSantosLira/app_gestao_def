<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="servicos"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Tabelas"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Lista de serviços</h6>
                            </div>
                            <button class="btn btn-outline-primary btn-sm mt-3"  data-bs-toggle="modal" data-bs-target="#ModalAdicionar">Adicionar serviço</button>
                            <a href="{{route('checklist.index')}}"> <button class="btn btn-outline-success btn-sm mt-3">Criar Checklist</button> </a> 
                            <a href="{{route('servico.exportar')}}"> <button class="btn btn-outline-success btn-sm mt-3">Gerar PDF</button> </a> 
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
                            <div class="table-responsive p-0"><!-- TABELA AQUI -->
                                <table class="table align-items-center justify-content-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                ID</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Serviço
                                            </th>
                                            <th  class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Preço</th>
                                            <th  class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Descrição</th>
                                            <th  class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 float-end">Ações</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($servicos as $key => $s)                         
                                            <tr>
                                                <form action="{{route('servico.update', ['servico' => $s])}}" method="POST" class="d-inline-block">
                                                    @csrf
                                                    @method('PATCH')
                                                    <td>
                                                        <div class="d-flex px-2">
                                                            <div class="my-auto">
                                                                <h6 class="mb-0 text-sm">#{{$s['id']}}</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    
                                                    <td>
                                                        <p class="text-sm font-weight-bold mb-0"> <input type="text" value="{{$s['nome']}}" class="form-control" name="nome"></p>
                                                    </td>
                                                    <td>
                                                        <p class="text-sm font-weight-bold mb-0"> <input type="number" value="{{$s['preco']}}" class="form-control" name="preco"></p>
                                                    </td>
                                                    <td>
                                                        <p class="text-sm font-weight-bold mb-0"><input type="text" value="{{$s['descricao']}}" class="form-control" name="descricao"></p>
                                                    </td>
                                                    <td class="float-end">
                                                        <button type="submit" class="btn"><i class="fa-solid fa-pen-to-square fa-xl" style="color: #1160e8;"></i></button>
                                                    </form>
                                                </form>
                                                        <form action="{{route('servico.destroy', ['servico' => $s])}}" method="post" class="d-inline-block" onsubmit="return confirmacao()">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn"><i class="fa-solid fa-trash fa-xl" style="color: #f01800;"></i></button>
                                                        </form>
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
                <!-- Modal -->
                <div class="modal fade" id="ModalAdicionar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Adicionar serviço</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <form action="{{route('servico.store')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="nome" class="form-label">Nome do serviço</label>
                                    <input type="text" class="form-control border border-2 p-2"  id="nome" placeholder="Nome" name="nome">
                                </div>
                                <div class="mb-3">
                                    <label for="nome" class="form-label">Preço</label>
                                    <input type="number" name="preco" class="form-control border border-2 p-2" value='' step="0.01" min="0" placeholder="Preço">
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="floatingTextarea2">Descrição</label>
                                    <textarea class="form-control border border-2 p-2"
                                        placeholder="Detalhes do produto" id="descricao" name="descricao"
                                        rows="4" cols="50"></textarea>
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
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <script>
        
        function confirmacao(){       
                       let resp = confirm('Ao excluir um serviço você estará excluindo todas as checklists atreladas a este serviço. Dar continuidade?');
                       return resp;
        }
    </script>
    <x-plugins></x-plugins>

</x-layout>
