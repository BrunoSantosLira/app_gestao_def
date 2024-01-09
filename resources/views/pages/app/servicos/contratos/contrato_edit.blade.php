<x-layout bodyClass="g-sidenav-show bg-gray-200">

    <x-navbars.sidebar activePage="contrato"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='contrato'></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-300 border-radius-xl mt-4"
                style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
                <span class="mask  bg-gradient-primary  opacity-6"></span>
            </div>
            <div class="card card-body mx-3 mx-md-4 mt-n6">
                <div class="row gx-4 mb-2">
                    <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                        <div class="nav-wrapper position-relative end-0">
                            
                        </div>
                    </div>
                </div>
                <div class="card card-plain h-100">
                    <div class="card-header pb-0 p-3">
                        <a href="{{route('contrato.index')}}"><button class="btn btn-outline-primary btn-sm mt-3">Listagem de Contratos <i class="fa-solid fa-folder fa-lg" style="font-size: 1.2em"></i> </button></a> 
                        <button class="btn btn-outline-success btn-sm mt-3"  data-bs-toggle="modal" data-bs-target="#ModalAdicionarProdutoContrato">Adicionar produto <i class="fa-solid fa-plus fa-lg" style="font-size: 1.2em"></i></button>
                        <button class="btn btn-outline-success btn-sm mt-3"  data-bs-toggle="modal" data-bs-target="#ModalAdicionarServicoContrato">Adicionar Serviço <i class="fa-solid fa-plus fa-lg" style="font-size: 1.2em"></i></button>


                        <button class="btn btn-outline-danger btn-sm mt-3"  data-bs-toggle="modal" data-bs-target="#ModalExcluirProdutoContrato">Excluir produto <i class="fa-solid fa-trash fa-lg" style="font-size: 1.2em"></i></button>
                        <button class="btn btn-outline-danger btn-sm mt-3"  data-bs-toggle="modal" data-bs-target="#ModalExcluirServiçoContrato">Excluir Serviço <i class="fa-solid fa-trash fa-lg" style="font-size: 1.2em"></i></button>

                        @if (Session::has('success'))
                            <div class="alert alert-success text-white">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-3">Editar Contrato</h6>
                            </div>
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <form method='POST' action='{{ route('contrato.update', ['contrato' => $contrato['id']]) }}'>
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Nome da contrato</label>
                                    <input type="text" name="nome" class="form-control border border-2 p-2" value='{{$contrato['nome']}}' placeholder="Nome:">
                                    @error('nome')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                
                                <div class="mb-3 col-md-6">
                                    <label for="categoria" class="form-label">Cliente</label>
                                    <select id="categoria" class="form-select p-2" name="cliente_id">
                                        <option class="" value="{{$contrato['cliente_id']}}">({{$contrato['cliente_id']}})</option>
                                        @foreach ($clientes as $key => $cliente)
                                            <option class="" value="{{$cliente['id']}}">{{$cliente['nome']}}  ({{$cliente['id']}})</option>
                                        @endforeach
                                    </select>
                                    @error('cliente_id')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Nome do responsável</label>
                                    <input type="text" name="responsável" class="form-control border border-2 p-2" value='{{$contrato['responsável']}}' placeholder="Responsável:">
                                    @error('responsavel')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Método de pagamento</label>
                                    <select id="formas" class="form-select p-2" name="forma_id">
                                        <option class="" value="{{$contrato->forma_id}}">ATUAL:({{$contrato->forma_id}})</option>
                                        @foreach ($formas as $f)
                                            <option class="" value="{{$f->id}}">{{$f->nome}} - ({{$f->id}})</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Data inicial</label>
                                    <input type="date" name="data_inicio" class="form-control border border-2 p-2" value='{{$contrato['data_inicio']}}'>
                                    @error('data_inicio')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Data final</label>
                                    <input type="date" name="data_fim" class="form-control border border-2 p-2" value='{{$contrato['data_fim']}}'>
                                    @error('data_fim')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="categoria" class="form-label">Status</label>
                                    <select disabled id="categoria" class="form-select p-2" name="status">
                                        <option class="" value="0">Aberto</option>
                                    </select>
                                    <small>O status poderá ser alterado depois</small>
                                    @error('status')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label for="floatingTextarea2">Corpo do contrato</label>
                                    <textarea name = "corpo" id ="summernote"  cols="30" rows="10" >
                                        @include('pages.app.servicos.contratos.contratoPDF', ['contrato' => $contrato])
                                    </textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn bg-gradient-dark">Atualizar</button>
                        </form>
                        <a href="{{route('contrato.exportar', ['contrato' => $contrato['id']])}}"><button class="btn btn-outline-primary btn-sm mt-3">GERAR PDF<i  style="font-size: 1.2em" class="fa-solid fa-file-pdf"></i> </button></a> 
                        <br><small>Atualize o contrato antes de gerar o PDF</small>
                        <h3>Produtos:</h3>
                        @foreach ($produtos as $produto)
                                    <div class="row">
                                        <div class="mb-3 col-md-3">                           
                                            <div class="">
                                                <h6>{{$produto['produto']['produto']}}</h6>
                                                <hr>                                                            
                                            </div>                          
                                        </div>
                                        <div class="mb-3 col-md-3">                           
                                            <div class="">
                                                <h6>Quantidade</h6>
                                                <hr>
                                                <div>
                                                    {{$produto['quantidade']}}
                                                </div>                                                              
                                            </div>                          
                                        </div>  
                                        <div class="mb-3 col-md-3">                           
                                            <div class="">
                                                <h6>Preço unit.</h6>
                                                <hr>
                                                <div>
                                                    R${{$produto['preco']}}
                                                </div>                                                              
                                            </div>                          
                                        </div>  
                                        <div class="mb-3 col-md-2">                           
                                            <div class="">
                                                <h6>Sub-total</h6>
                                                <hr>
                                                <div>
                                                    R${{$produto['valorTotal']}}
                                                </div>                                                              
                                            </div>                          
                                        </div>                                    
                                    </div>
                        @endforeach
                        <div class="">
                            <h4>Total em produtos:</h4>
                            <p style="font-weight: bold">R${{$somaProdutosContrato}}</p>
                        </div>
                        <hr><br>
                        <h3>Serviços:</h3>
                        @foreach ($servicos as $servico)
                                    <div class="row">
                                        <div class="mb-3 col-md-3">                           
                                            <div class="">
                                                <h6>{{$servico['servico']['nome']}}</h6>
                                                <hr>                                                            
                                            </div>                          
                                        </div>
                                        <div class="mb-3 col-md-3">                           
                                            <div class="">
                                                <h6>Quantidade</h6>
                                                <hr>
                                                <div>
                                                    {{$servico['quantidade']}}
                                                </div>                                                              
                                            </div>                          
                                        </div>  
                                        <div class="mb-3 col-md-3">                           
                                            <div class="">
                                                <h6>Preço unit.</h6>
                                                <hr>
                                                <div>
                                                    R$ {{$servico['preco']}}
                                                </div>                                                              
                                            </div>                          
                                        </div>  
                                        <div class="mb-3 col-md-2">                           
                                            <div class="">
                                                <h6>Sub-total</h6>
                                                <hr>
                                                <div>
                                                    R$ {{$servico['valorTotal']}}
                                                </div>                                                              
                                            </div>                          
                                        </div>                                    
                                    </div>
                        @endforeach
                        <div class="">
                            <h4>Total em serviços:</h4>
                            <p style="font-weight: bold">R${{$somaServicosContrato}}</p>
                        </div>
                        <div class="float-end">
                            <h4>Valor total</h4>
                            <p style="font-weight: bold">R${{$contrato['valorTotal']}}</p>
                        </div>
                    </div>
                </div>
            </div>
             <!-- Modal EXCLUIR PRODUTOS -->
         <div class="modal fade" id="ModalExcluirProdutoContrato" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Excluir Produto do contrato</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="{{route('contratoProdutos.deletar')}}" method="POST">
                        @csrf
                        <label for="servico" class="form-label">Contrato</label>
                        <select id="servico" class="form-select  p-2" name="contrato_id">
                            <option value="{{$contrato['id']}}">{{$contrato['nome']}}</option>
                        </select>

                        <label for="servico" class="form-label">Produto</label>
                        <select id="servico" class="form-select  p-2" name="produto_id">
                            @foreach ($produtos as $key => $produto)
                            <option value="{{$produto['id']}}">{{$produto['produto']['produto']}} (R${{$produto['valorTotal']}})</option>
                            @endforeach
                        </select>


                        <button type="submit" class="btn btn-primary mt-2">Excluir</button>
                    </form>
                </div>

                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>

            </div>
            </div>
        </div>

            <!-- Modal ADICIONARPRODUTOOS -->
            <div class="modal fade" id="ModalAdicionarProdutoContrato" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Adicionar Produto no Contrato</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="{{route('contratoprodutos.store')}}" method="POST">
                            @csrf
                            <label for="servico" class="form-label">Contrato</label>
                            <select id="servico" class="form-select  p-2" name="contrato_id">
                                
                                <option value="{{$contrato['id']}}">{{$contrato['nome']}}</option>
                               
                            </select>

                            <label for="servico" class="form-label">Produto</label>
                            <select id="servico" class="form-select  p-2" name="produto_id">
                                @foreach ($produtosTabela as $key => $produto)
                                <option value="{{$produto['id']}}">{{$produto['produto']}}</option>
                                @endforeach
                            </select>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Preço do produto</label>
                                <input type="number" name="preco" class="form-control border border-2 p-2" value='0' step="0.01" min="0" placeholder="Preço">
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Quantidade</label>
                                <input type="number" name="quantidade" class="form-control border border-2 p-2" value='0' placeholder="Preço">
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
         <!-- Modal aad servicos -->
         <div class="modal fade" id="ModalAdicionarServicoContrato" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar serviço no contrato</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="{{route('contratoservicos.store')}}" method="POST">
                        @csrf
                        <label for="servico" class="form-label">Contrato</label>
                        <select id="servico" class="form-select  p-2" name="contrato_id">
                            <option value="{{$contrato['id']}}">{{$contrato['nome']}}</option>
                        </select>

                        <label for="servico" class="form-label">Serviço</label>
                        <select id="servico" class="form-select  p-2" name="servico_id">
                            @foreach ($servicosTabela as $key => $servico)
                            <option value="{{$servico['id']}}">{{$servico['nome']}}</option>
                            @endforeach
                        </select>

                        <div class="mb-3 col-md-6">
                            <label class="form-label">Preço do produto</label>
                            <input type="number" name="preco" class="form-control border border-2 p-2" value='0' step="0.01" min="0" placeholder="Preço">
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label">Quantidade</label>
                            <input type="number" name="quantidade" class="form-control border border-2 p-2" value='0' placeholder="Preço">
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
        <!-- Modal EXCLUIR Serviços da OS -->
        <div class="modal fade" id="ModalExcluirServiçoContrato" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Excluir Produto do Contrato</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="{{route('contratoServicos.deletar')}}" method="POST">
                        @csrf
                        <label for="servico" class="form-label">OS</label>
                        <select id="servico" class="form-select  p-2" name="contrato_id">
                            <option value="{{$contrato['id']}}">{{$contrato['nome']}}</option>
                        </select>

                        <label for="servico" class="form-label">Produto</label>
                        <select id="servico" class="form-select  p-2" name="servico_id">
                            @foreach ($servicos as $key => $servico)
                            <option value="{{$servico['id']}}">{{$servico['servico']['nome']}} (R${{$servico['valorTotal']}})</option>
                            @endforeach
                        </select>


                        <button type="submit" class="btn btn-primary mt-2">Excluir</button>
                    </form>
                </div>

                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>

            </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
        <script>
        $('#summernote').summernote({
            placeholder: 'Hello Bootstrap 5',
            tabsize: 2,
            height: 1200
        });
        </script>
        <x-footers.auth></x-footers.auth>
    </div>
    <x-plugins></x-plugins>

</x-layout>
