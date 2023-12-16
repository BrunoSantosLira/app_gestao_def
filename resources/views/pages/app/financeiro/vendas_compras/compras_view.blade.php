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
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Nome da compra :</label>
                                    <input type="text" name="nome" disabled class="form-control border border-2 p-2" value="{{$compra['nome']}}" placeholder="Nome:">
                                    @error('nome')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="categoria" class="form-label">Fornecedor</label>
                                    <select id="categoria" class="form-select p-2" disabled name="fornecedor_id">
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
                                    <input type="text" name="metodo_de_pagemento" disabled class="form-control border border-2 p-2"  placeholder="Insira o metodo de pagamento" value="{{$compra['metodo_de_pagemento']}}">
                                    @error('metodo_de_pagemento')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Status</label>
                                    <input type="text" name="status" disabled class="form-control border border-2 p-2" value='PENDENTE' disabled>
                                    @error('status')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>


                                <div class="mb-3 col-md-12">
                                    <label for="floatingTextarea2">Detalhes:</label>
                                    <textarea class="form-control border border-2 p-2"
                                        placeholder="Detalhes da compra" disabled id="detalhes" name="detalhes"
                                        rows="4" cols="50">{{$compra['detalhes']}}</textarea>
                                        @error('detalhes')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                </div>
                            </div>
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
        </div>
        <x-footers.auth></x-footers.auth>
    </div>
    <x-plugins></x-plugins>

</x-layout>
