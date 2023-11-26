<x-layout bodyClass="g-sidenav-show bg-gray-200">

    <x-navbars.sidebar activePage="OS"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='OS'></x-navbars.navs.auth>
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
                        <a href="{{route('os.index')}}"><button class="btn btn-outline-primary btn-sm mt-3">Listagem de OS <i class="fa-solid fa-boxes-packing fa-lg" style="font-size: 1.2em"></i> </button></a> 
                        
                        <button class="btn btn-outline-success btn-sm mt-3"  data-bs-toggle="modal" data-bs-target="#ModalAdicionarProdutoOS">Adicionar produto <i class="fa-solid fa-plus fa-lg" style="font-size: 1.2em"></i></button>
                        <button class="btn btn-outline-success btn-sm mt-3"  data-bs-toggle="modal" data-bs-target="#ModalAdicionarServicoOS">Adicionar serviço <i class="fa-solid fa-plus fa-lg" style="font-size: 1.2em"></i></button>

                        <button class="btn btn-outline-danger btn-sm mt-3"  data-bs-toggle="modal" data-bs-target="#ModalExcluirProdutoOs">Excluir produto <i class="fa-solid fa-trash fa-lg" style="font-size: 1.2em"></i></button>
                        <button class="btn btn-outline-danger btn-sm mt-3"  data-bs-toggle="modal" data-bs-target="#ModalExcluirServiçoOs">Excluir serviço <i class="fa-solid fa-trash fa-lg" style="font-size: 1.2em"></i></button>
                        <a href="{{route('os.exportar', ['o' => $os[0]['id']])}}"> <button class="btn btn-outline-warning btn-sm mt-3">Gerar PDF <i class="fa-solid fa-file-pdf fa-lg" style="font-size: 1.2em"></i></button> </a> 
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="text-white">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-3">N° OS: {{$os[0]['id']}}</h6>
                            </div>
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-3">Data de emissão: {{ date('d/m/Y', strtotime($os[0]['created_at'])) }}</h6>
                            </div>           
                        </div>
                    </div>
                    <div class="card-body p-3">
                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <hr>
                                    <div class="text-center">
                                        <img src="https://equipcasa.com.br/os/assets/uploads/5b9f30af3a64298817e0f0f5b66947f4.jpg" style="max-height: 100px">   
                                        <div>
                                            Equip Casa <br>
                                            12.272.914/0001-90 <br>
                                            Rua 01, Chacara 38, Lote, 1 - Setor Habitacional Vicente Pires - Brasília - DF<br>
                                            E-mail: equipecasadf@gmail.com - Fone: (61)99337-4280<br>
                                        </div>                                                                 
                                    </div>
                                    <hr>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    
                                    <div class="">
                                        <h4>Cliente</h4>
                                        <div>
                                            <span>{{$os[0]['cliente']['nome']}} </span><br>
                                            <span>{{$os[0]['cliente']['CPF/CNPJ']}} </span><br>
                                            <span>{{$os[0]['cliente']['localizacao']}} </span><br>
                                            <span>E-mail:{{$os[0]['cliente']['email']}} <br> Telefone:{{$os[0]['cliente']['telefone']}} </span><br><br>
                                        </div>                                                                 
                                    </div>
                                                                
                                </div>                                  
                                <div class="mb-3 col-md-6">                                      
                                    <div class="">
                                        <h4>Responsável</h4>
                                        <div>
                                            Hugo Gandy <br>
                                            Contato: (61)99337-4280 <br>
                                            Email: equipecasadf@gmail.com <br>
                                        </div>                                                                 
                                    </div>                           
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="mb-3 col-md-4">                           
                                    <div class="4">
                                        <h6>Status OS: {{$os[0]['status']}}</h6>                                                               
                                    </div>                          
                                </div>                                  
                                <div class="mb-3 col-md-4">                                      
                                    <div class="">
                                        <h6>Data inicial:  {{ date('d/m/Y', strtotime($os[0]['data_inicial'])) }}</h6>                                                                
                                    </div>                           
                                </div>
                                <div class="mb-3 col-md-4">                                      
                                    <div class="">
                                        <h6>Data final: {{ date('d/m/Y', strtotime($os[0]['data_final'])) }}</h6>                                                                
                                    </div>                           
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="mb-3 col-md-6">                           
                                    <div class="4">
                                        <h6>Garantia: {{$os[0]['dias_garantia']}} dias</h6>                                                               
                                    </div>                          
                                </div>                                  
                                <div class="mb-3 col-md-6">                                      
                                    <div class="">
                                        <h6>Termo garantia: Garantia de Ban </h6>                                                                
                                    </div>                           
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-md-12">                           
                                    <div class="">
                                        <h6>Descrição/Ficha Técnica/Defeito:</h6>
                                        <div>
                                            {{$os[0]['observacoes']}}
                                        </div>                                                              
                                    </div>                          
                                </div>                                  
                            </div>

                            <hr>
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
                            <p style="font-weight: bold">R${{$somaProdutosOS}}</p>
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
                            <h4>Total em Serviços:</h4>
                            <p style="font-weight: bold">R${{$somaServicosOS}}</p>
                        </div>
                        <hr><br>
                        <div class="float-end">
                            <h4>Valor total</h4>
                            <p style="font-weight: bold">R${{$os[0]['valorTotal']}}</p>
                        </div>
                  
                    </div>
                </div>
            </div>

        </div>
        
    </div>
         <!-- Modal EXCLUIR PRODUTOS -->
         <div class="modal fade" id="ModalExcluirProdutoOs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Excluir Produto da OS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="{{route('osprodutos.deletar')}}" method="POST">
                        @csrf
                        <label for="servico" class="form-label">OS</label>
                        <select id="servico" class="form-select  p-2" name="os_id">
                            @foreach ($os as $key => $o)
                            <option value="{{$o['id']}}">{{$o['nome']}}</option>
                            @endforeach
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

                <!-- Modal EXCLUIR Serviços da OS -->
                <div class="modal fade" id="ModalExcluirServiçoOs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Excluir Produto da OS</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
        
                        <div class="modal-body">
                            <form action="{{route('osservicos.deletar')}}" method="POST">
                                @csrf
                                <label for="servico" class="form-label">OS</label>
                                <select id="servico" class="form-select  p-2" name="os_id">
                                    @foreach ($os as $key => $o)
                                    <option value="{{$o['id']}}">{{$o['nome']}}</option>
                                    @endforeach
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
                <!-- Modal ADICIONARPRODUTOOS -->
                <div class="modal fade" id="ModalAdicionarProdutoOS" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Adicionar Produto na OS</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
        
                        <div class="modal-body">
                            <form action="{{route('osprodutos.store')}}" method="POST">
                                @csrf
                                <label for="servico" class="form-label">OS</label>
                                <select id="servico" class="form-select  p-2" name="os_id">
                                    @foreach ($os as $key => $o)
                                    <option value="{{$o['id']}}">{{$o['nome']}}</option>
                                    @endforeach
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
                        <!-- Modal aad servicos -->
                        <div class="modal fade" id="ModalAdicionarServicoOS" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Adicionar serviço na OS</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                
                                <div class="modal-body">
                                    <form action="{{route('osservicos.store')}}" method="POST">
                                        @csrf
                                        <label for="servico" class="form-label">OS</label>
                                        <select id="servico" class="form-select  p-2" name="os_id">
                                            @foreach ($os as $key => $o)
                                            <option value="{{$o['id']}}">{{$o['nome']}}</option>
                                            @endforeach
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
</x-layout>
