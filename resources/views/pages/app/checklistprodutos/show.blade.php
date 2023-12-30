<x-layout bodyClass="g-sidenav-show  bg-gray-200 ">
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
                                <h6 class="text-white text-capitalize ps-3">Lista de campos da checklist:</h6>
                            </div>
                            @if ($checklist->status != 'aprovada')
                                <button class="btn btn-outline-primary btn-sm mt-3"  data-bs-toggle="modal" data-bs-target="#ModalAdicionarCampo">Adicionar produto</button>
                                
                            @endif
                            <a href="{{route('checklistprodutos.exportar', ['checklistProduto' => $checklist->id])}}"> <button class="btn btn-outline-success btn-sm mt-3">Gerar PDF</button> </a> 

                        </div>

                        <div class="card-body px-0 pb-2">

                            <div class="table-responsive p-0"><!-- TABELA AQUI -->
                                <a href="{{route('checklistProdutos.index')}}" class="m-3"><i class="fa-solid fa-square-caret-left fa-2xl"></i></a>
                                <table class="table align-items-center justify-content-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                ID
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            PRODUTO
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            VALOR NA LOJA
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            DETALHES
                                            </th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($campos as $campo)
                                            <tr>
                                                <td>                    
                                                    <div class="d-flex px-2">
                                                        <div class="my-auto">
                                                            <h6 class="mb-0 text-sm">#{{$campo->id}}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td> <p class="text-sm font-weight-bold ml-2 mb-0">{{$campo->produto->produto}}</p></td>
                                                <td> <p class="text-sm font-weight-bold ml-2 mb-0">R${{$campo->produto->valorVenda}}</p></td>
                                                <td> <p class=" font-weight-bold ml-2 mb-0" style="font-size: 12px">{{$campo->detalhes}}</p></td>
                                                <td> 
                                                    <form action="{{route('camposProduto.destroy', ['camposProduto' => $campo->id])}}" method="POST" class="d-inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" style="background: none; border:none;" class="btn-xl"><i class="fa-solid fa-trash m-2" style="color: #f01800;"></i></button>
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
                <!-- Modal adicionarCampo -->
                <div class="modal fade" id="ModalAdicionarCampo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Adicionar Campo</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <form action="{{route('camposProduto.store')}}" method="POST">
                                    @csrf
                                 
                                    <label for="checklist" class="form-label" style="color: black">Checklist</label>
                                    <select id="servico" class="form-control border border-2 p-2 custom-disabled" name="checklist_id" >
                                            <option value="{{$checklist->id}}" id="option_checklist">{{$checklist->nome}}</option>
                                    </select>
    
                                    <div class="mt-3 mb-3">
                                        <label for="nome" class="form-label" style="color: black">Produto</label>
                                        <select id="servico" class="form-control border border-2 p-2" name="produto_id" >
                                            @foreach ($produtos as $produto)
                                                <option value="{{$produto->id}}" id="option_checklist">{{$produto->produto}}</option> 
                                            @endforeach
                                        </select>                                    
                                    </div>
                                    <hr>
                                    <div class="mb-3 col-md-12">
                                        <label for="floatingTextarea2">Detalhes</label>
                                        <textarea class="form-control border border-2 p-2" required
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
            </div>

            <script>
                    function confirmacao(){
                       
                       let resp = confirm('Tem certeza que deseja excluir?');
                       return resp;
                     }
            </script>
            <x-footers.auth></x-footers.auth>

        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>
