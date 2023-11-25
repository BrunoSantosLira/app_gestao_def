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

                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-3">N° OS: 1</h6>
                            </div>
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-3">Data de emissão: {{$os[0]['created_at']}}</h6>
                            </div>           
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <form method='POST' action='{{ route('os.store') }}'>
                            @csrf
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
                            @foreach ($produtos as $produto)
                                {{$produto}}
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
                                    <div class="mb-3 col-md-1">                           
                                        <div class="">
                                            <h6>Ações</h6>
                                            <hr>
                                            <div>
                                                <form method="POST" action="{{ route('osprodutos.destroy', ['osproduto' => $produto->id]) }}" class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" style="background: none; border:none;" class="btn-xl">
                                                        <i class="fa-solid fa-trash m-2" style="color: #f01800;"></i>
                                                    </button>
                                                </form>
                                            </div>                                                              
                                        </div>                          
                                    </div>                                       
                                </div>
                        @endforeach

                        
                            <hr>
                            <div class="row">
                                <div class="mb-3 col-md-3">                           
                                    <div class="">
                                        <h6>Serviço</h6>
                                        <hr>
                                        <div>
                                            Dolor anim consequat aute nulla non minim fugiat anim fugiat culpa.
                                        </div>                                                              
                                    </div>                          
                                </div>
                                <div class="mb-3 col-md-3">                           
                                    <div class="">
                                        <h6>Quantidade</h6>
                                        <hr>
                                        <div>
                                            Excepteur adipisicing in dolor incididunt nostrud irure do incididunt nulla deserunt consequat mollit in.
                                        </div>                                                              
                                    </div>                          
                                </div>  
                                <div class="mb-3 col-md-3">                           
                                    <div class="">
                                        <h6>Preço unit.</h6>
                                        <hr>
                                        <div>
                                            R$120.12
                                        </div>                                                              
                                    </div>                          
                                </div>  
                                <div class="mb-3 col-md-3">                           
                                    <div class="">
                                        <h6>Sub-total</h6>
                                        <hr>
                                        <div>
                                            R$120.12
                                        </div>                                                              
                                    </div>                          
                                </div>                                    
                            </div>
                            <hr>
                            <div class="row">
                                <div class="mb-3 col-md-12">                           
                                    <div class="bold">
                                        <h5>Valor Total</h5>
                                        <div class="text-bold text-dark">
                                            R$120.12
                                        </div>                                                              
                                    </div>                          
                                </div>                                  
                            </div>

                        </div>
                            <button type="submit" class="btn bg-gradient-dark">Adicionar</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
   

</x-layout>
