<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="checklist"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="checklist"></x-navbars.navs.auth>
        <style>
            /* Estilo personalizado para campos de entrada visualmente desativados */
            .custom-disabled {
              background-color: #e9ecef; /* Cor de fundo desativada do Bootstrap */
              opacity: 0.5; /* Opacidade para indicar visualmente desativação */
              pointer-events: none; /* Impede interação com o campo */
            }
          </style>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Lista de Checklists de produtos</h6>
                            </div>
                            <button class="btn btn-outline-primary btn-sm mt-3"  data-bs-toggle="modal" data-bs-target="#ModalAdicionar">Adicionar Checklist</button>
                            @if (Session::has('success'))
                                <div class="alert alert-success text-white">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            @if (Session::has('error'))
                            <div class="alert alert-danger text-white">
                                {{ Session::get('error') }}
                            </div>
                            @endif
                            @foreach ($errors->all() as $error)
                            <li class="text-danger">{{ $error }}</li>
                            @endforeach
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                            
                        </div>
                        <form class="row m-3" method="GET" action="{{ route('checklistProdutos.index') }}">
                            <div class="col-md-4">
                                <h5>Nome</h5>
                                <input type="text" class="form-control border border-2 p-2" name="nome" placeholder="Nome:">
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
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">

                                        {{-- Loop através das páginas geradas pela pagination do Laravel --}}
                                        @foreach ($checklists->links()->elements[0] as $page => $url)
                                            @php
                                                // Adiciona os parâmetros de filtro às URLs de paginação
                                                $url = $url . "&nome=" . request('nome') ;
                                            @endphp
                                
                                            <li class="page-item {{ $checklists->currentPage() == $page ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                            </li>
                                        @endforeach
                                

                                    </ul>
                                </nav>
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
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Cliente
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Valor total na loja
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Descrição
                                            </th>
                                            <th  class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 "></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($checklists as $key => $checklist)  
                                            <tr>
                                                
                                                    @csrf
                                                    @method('PATCH')
                                                <td>
                                                    <div class="d-flex px-2">
                                                        <div class="my-auto">
                                                            <h6 class="mb-0" style="font-size: 12px">#{{$checklist->id}}</h6>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <p style="font-size: 12px" class=" font-weight-bold mb-0">{{$checklist->nome}}</p>
                                                </td>

                                                <td>
                                                    @if($checklist->cliente)
                                                        <p style="font-size: 12px" class="font-weight-bold mb-0">{{ $checklist->cliente->nome }}</p>
                                                    @else
                                                        <p style="font-size: 12px" class="font-weight-bold mb-0">Cliente não definido</p>
                                                    @endif
                                                </td>
                                                

                                                <td>
                                                    <p style="font-size: 12px" class=" font-weight-bold mb-0">R${{$checklist->valorTotal}}</p>
                                                </td>

                                                <td>
                                                    <p style="font-size: 12px" class="text-sm font-weight-bold mb-0">{{$checklist->status}}</p>
                                                </td>


                                                <td>
                                                    <p class=" font-weight-bold mb-0" style="font-size: 12px">{{$checklist->descricao}}</p>
                                                </td>

                                          
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0"> 
                                                    </p>
                                                </td>
                                                <td class="float-end">
                                                    @if ($checklist->status != 'aprovada')
                                                        <a  href="{{route('checklist.aprovar', ['checklist' => $checklist->id])}}"><i class="fa-solid fa-check m-2" style="color: #31b452; "></i></a>    
                                                        
                                                        <form action="{{route('checklistProdutos.destroy', ['checklistProduto' => $checklist->id])}}" method="POST" class="d-inline-block">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" style="background: none; border:none;" class="btn-xl"><i class="fa-solid fa-trash m-2" style="color: #f01800;"></i></button>
                                                        </form>
                                                    @endif
                                                    @if ($checklist['status'] == 'aprovada')
                                                            <a  href="{{route('checkparcelas.index', ['checklist' => $checklist->id])}}"><i class="fa-solid fa-file m-2" style="color: #000000; font-size:1.2em;"></i></a>
                                                    @endif

                                                    <a target="_blank" href="{{route('checklistProdutos.edit', ['checklistProduto' => $checklist->id])}}"><i class="fa-solid fa-pen-to-square m-2" style="color: #1160e8; font-size:1.2em;"></i></a>
                                                    <a href="{{route('checklistProdutos.show', ['checklistProduto' => $checklist->id])}}" style="text-decoration: none;color: inherit;"><button type="submit" style="background: none; border:none;" class="btn-xl"><i class="fa-solid fa-eye m-2" style="color: #31b452;"></i></button>
                                                        
                                                
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
                <!-- Modal adicionar Checklist-->
                <div class="modal fade" id="ModalAdicionar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Adicionar checklist</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                        </div>

                        <div class="modal-body">
                            <form action="{{route('checklistProdutos.store')}}" method="POST">
                                @csrf
    

                                <div class="mt-3 mb-3">
                                    <label for="nome" class="form-label">Nome da checklist</label>
                                    <input type="text" required class="form-control border border-2 p-2" id="nome" placeholder="Nome" name="nome">
                                </div>

                                
                                <div class="mt-3 mb-3">
                                    <label for="nome" class="form-label">Cliente</label>
                                    <select name="cliente_id" id="" class="form-control border border-2 p-2">
                                        @foreach ($clientes as $c)
                                           <option value="{{$c->id}}">{{$c->nome}}</option> 
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mt-3 mb-3">
                                    <label for="nome" class="form-label">Forma de pagamento</label>
                                    <select name="forma_id" id="" class="form-control border border-2 p-2">
                                        @foreach ($formas as $f)
                                           <option value="{{$f->id}}">{{$f->nome}}</option> 
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label for="floatingTextarea2">Descrição:</label>
                                    <textarea class="form-control border border-2 p-2"
                                        placeholder="Descrição" required id="descricao" name="descricao"
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

                <!-- Modal adicionarCampo -->
                <div class="modal fade" id="ModalAdicionarCampo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Adicionar Campo</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <form action="{{route('campo.store')}}" method="POST">
                                @csrf
                             
                                <label for="checklist" class="form-label" style="color: black">Checklist</label>
                                <select id="servico" class="form-select custom-disabled" name="checklist_id" >
                                    <option value="" id="option_checklist"></option>
                                </select>

                                <div class="mt-3 mb-3">
                                    <label for="nome" class="form-label" style="color: black">Nome do campo</label>
                                    <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome">
                                </div>
                                <hr>
                                <div class="mt-3 mb-3">
                                    <label for="concluida" class="form-label" style="color: black">Concluida?</label>
                                    <select id="concluida" class="form-select p-2" name="concluida">
                                        <option value="0" class="form-control">NÃO</option>
                                        <option value="1" class="form-control">SIM</option>
                                    </select>
                                    <label for="concluida" class="form-label">Informe se a tarefa já foi concluida</label>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="floatingTextarea2">Detalhes</label>
                                    <textarea class="form-control border border-2 p-2"
                                        placeholder="Detalhes do campo" id="detalhes" name="detalhes"
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
                <!-- Modal ATUALIZAR CHECKLIST Checklist-->
                <div class="modal fade" id="ModalAtualizarChecklist" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Atualizar Checklist</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                                 <div class="mt-3 mb-3">
                                    <label for="nome" class="form-label">Nome da checklist</label>
                                    <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome">
                                </div>
                                <button type="submit" class="btn btn-primary">Enviar</button>     
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>     
                        </div>

                    </div>
                    </div>
                </div>

            <x-footers.auth></x-footers.auth>
        </div>
        <script>
            function mostrarModal(checklist) {
                  console.log(checklist);
                  document.getElementById('option_checklist').innerHTML = checklist['nome'] + `(${checklist['id']})`;
                  document.getElementById('option_checklist').value = checklist['id'];
                  
                  console.log(document.getElementById('option_checklist').value)
                  var meuModal = new bootstrap.Modal(document.getElementById('ModalAdicionarCampo'));
                  meuModal.show();
              }

            function confirmacao(){
                 
              let resp = confirm('Ao excluir uma Checklist você também excluirá todos os campos associados a ela. Deseja dar continuidade?');
              return resp;
            }

      </script>
    </main>
    <x-plugins></x-plugins>

</x-layout>
