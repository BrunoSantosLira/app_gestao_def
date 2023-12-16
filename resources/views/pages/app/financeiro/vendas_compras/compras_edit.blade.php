<x-layout bodyClass="g-sidenav-show bg-gray-200">

    <x-navbars.sidebar activePage="compras"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='compras'></x-navbars.navs.auth>
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
                        <a href="{{route('compras.index')}}"><button class="btn btn-outline-primary btn-sm mt-3">Listagem de compras <i class="fa-solid fa-boxes-packing fa-lg" style="font-size: 1.2em"></i> </button></a> 
                        <button class="btn btn-outline-success btn-sm mt-3"  data-bs-toggle="modal" data-bs-target="#ModalAdicionarProduto">Adicionar produto <i class="fa-solid fa-plus fa-lg" style="font-size: 1.2em"></i></button>
                        <button class="btn btn-outline-danger btn-sm mt-3"  data-bs-toggle="modal" data-bs-target="#ModalExcluirProduto">Excluir produto <i class="fa-solid fa-trash fa-lg" style="font-size: 1.2em"></i></button>

                        @if (Session::has('success'))
                            <div class="alert alert-success text-white">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-3">EDITAR ORDEM DE COMPRA</h6>
                            </div>
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </div>
                    </div>
                 
                    <div class="card-body p-3">
                        <form method='POST' action='{{ route('compras.update', ['compra' => $compra->id]) }}'>
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Nome da compra :</label>
                                    <input type="text" name="nome" class="form-control border border-2 p-2" value="{{$compra['nome']}}" placeholder="Nome:">
                                    @error('nome')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="categoria" class="form-label">Fornecedor</label>
                                    <select id="categoria" class="form-select p-2" name="fornecedor_id">
                                        <option class="" value="{{$compra['fornecedor_id']}}">({{$compra['fornecedor_id']}})</option>
                                        @foreach ($fornecedores as $key => $fornecedor)
                                            <option class="" value="{{$fornecedor['id']}}">{{$fornecedor['nome_fantasia']}}  ({{$fornecedor['id']}})</option>
                                        @endforeach
                                    </select>
                                    @error('fornecedor_id')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Metodo de pagamento</label>
                                    <input type="text" name="metodo_de_pagemento" class="form-control border border-2 p-2"  placeholder="Insira o metodo de pagamento" value="{{$compra['metodo_de_pagemento']}}">
                                    @error('metodo_de_pagemento')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Status</label>
                                    <input type="text" name="status" class="form-control border border-2 p-2" value='PENDENTE' disabled>
                                    @error('status')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>


                                <div class="mb-3 col-md-12">
                                    <label for="floatingTextarea2">Detalhes:</label>
                                    <textarea class="form-control border border-2 p-2"
                                        placeholder="Detalhes da compra" id="detalhes" name="detalhes"
                                        rows="4" cols="50">{{$compra['detalhes']}}</textarea>
                                        @error('detalhes')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn bg-gradient-dark">Atualizar</button>
                        </form>
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
                            <h4>Total:</h4>
                            <p style="font-weight: bold">R${{$somaProdutos}}</p>
                        </div>
                    </div>
                </div>
            </div>
                     <!-- Modal ADICIONARPRODUTOOS -->
                     <div class="modal fade" id="ModalAdicionarProduto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Adicionar Produto na ordem de compra</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
        
                            <div class="modal-body">
                                <form action="{{route('compra_produtos.store')}}" method="POST">
                                    @csrf
                                    <label for="servico" class="form-label">Compra</label>
                                    <select id="compra" class="form-select  p-2" name="compra_id">          
                                        <option value="{{$compra['id']}}">{{$compra['nome']}}</option>
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

         <!-- Modal EXCLUIR PRODUTOS -->
         <div class="modal fade" id="ModalExcluirProduto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Excluir Produto do contrato</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="{{route('compraProdutos.deletar')}}" method="POST">
                        @csrf
                        <label for="servico" class="form-label">Compra</label>
                        <select id="compra" class="form-select  p-2" name="compra_id">          
                            <option value="{{$compra['id']}}">{{$compra['nome']}}</option>
                        </select>

                        <label for="servico" class="form-label">Produto</label>
                        <select id="servico" class="form-select  p-2" name="produto_id">
                            @foreach ($produtos as $key => $produto)
                            <option value="{{$produto['id']}}">{{$produto['produto']['produto']}} (R${{$produto['valorTotal']}}) - ({{$produto['quantidade']}})</option>
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
        </div>
        <x-footers.auth></x-footers.auth>
    </div>
    <x-plugins></x-plugins>

</x-layout>
