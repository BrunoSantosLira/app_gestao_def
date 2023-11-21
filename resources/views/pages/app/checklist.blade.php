<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="tables"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Tables"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Lista de Checklists</h6>
                            </div>
                            <button class="btn btn-outline-primary btn-sm mt-3"  data-bs-toggle="modal" data-bs-target="#ModalAdicionar">Adicionar Checklist</button>
                            @if (request('status') == 'sucesso')
                                <div class="alert alert-success text-white" role="alert">
                                    <strong>Sucesso!</strong> Adicionado com sucesso!
                                </div><br> 
                            @elseif(request('status') == 'erro')
                                <div class="alert alert-danger text-white" role="alert">
                                    <strong>ERRO!</strong> Erro na adição
                                </div><br> 
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
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Checklist
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Serviço
                                            </th>
                                            <th  class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Data de criação</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($checklists as $key => $checklist)       
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2">
                                                        <div class="my-auto">
                                                            <h6 class="mb-0 text-sm">{{$checklist['id']}}</h6>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">{{$checklist['nome']}}</p>
                                                </td>

                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">{{$checklist['servico']['nome']}}</p>
                                                </td>

                                          
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">{{$checklist['created_at']}}</p>
                                                </td>
                                                <td class="float-end">
                                                    <button class="btn btn-outline-warning btn-sm">Adicionar Campo</button>
                                                    <button class="btn btn-outline-success btn-sm">Visualizar</button>
                                                    <button class="btn btn-outline-primary btn-sm">Atualizar</button>
                                                    <button class="btn btn-outline-danger  btn-sm">Excluir</button>
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
                        <h5 class="modal-title" id="exampleModalLabel">Adicionar checklist</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <form action="{{route('checklist.store')}}" method="POST">
                                @csrf
                                <label for="servico" class="form-label">Serviço pertencente</label>
                                <select id="servico" class="form-select" name="servico_id">
                                    @foreach ($servicos as $key => $servico)
                                    <option value="{{$servico['id']}}">{{$servico['nome']}}</option>
                                    @endforeach
                                </select>

                                <div class="mt-3 mb-3">
                                    <label for="nome" class="form-label">Nome da checklist</label>
                                    <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome">
                                </div>

                                <button type="submit" class="btn btn-primary">Adicionar</button>
                            </form>

                        </div>

                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            
                        </div>

                    </div>
                    </div>
                </div>
            <x-footers.auth></x-footers.auth>

            <script>
                console.log('OLAAAAAAAAAAAAAAAAAAAAAA')
            </script>
        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>
