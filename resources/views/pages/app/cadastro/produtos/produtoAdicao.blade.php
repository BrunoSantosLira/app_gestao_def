<x-layout bodyClass="g-sidenav-show bg-gray-200">

    <x-navbars.sidebar activePage="Produtos"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='Produtos'></x-navbars.navs.auth>
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
                        <a href="{{route('produtos.index')}}"><button class="btn btn-outline-primary btn-sm mt-3">Listagem de produtos <i class="fa-solid fa-boxes-packing fa-lg" style="font-size: 1.2em"></i> </button></a> 
                        @if (Session::has('success'))
                            <div class="alert alert-success text-white">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-3">Inserção de produtos</h6>
                            </div>
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <form method='POST' action='{{ route('produtos.store') }}'>
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Nome do produto</label>
                                    <input type="text" name="produto" class="form-control border border-2 p-2" value=''>
                                    @error('produto')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>
                               
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Preço do produto</label>
                                    <input type="number" name="preco" class="form-control border border-2 p-2" value='' step="0.01" min="0" placeholder="Preço">
                                    @error('preco')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                


                                
                                <div class="mb-3 col-md-6">
                                    <label for="categoria" class="form-label">Unidade</label>
                                    <select id="categoria" class="form-select p-2" name="unidade_id">
                                        @foreach ($unidades as $key => $unidade)
                                            <option class="" value="{{$unidade['id']}}">{{$unidade['unidade']}}  ({{$unidade['id']}})</option>
                                        @endforeach
                                    </select>
                                    @error('estoqueAtual')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="categoria" class="form-label">Categoria</label>
                                    <select id="categoria" class="form-select p-2" name="categoria_id">
                                        @foreach ($categorias as $key => $categoria)
                                            <option class="" value="{{$categoria['id']}}">{{$categoria['categoria']}}  ({{$categoria['id']}})</option>
                                        @endforeach
                                    </select>
                                    @error('estoqueAtual')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Estoque Atual</label>
                                    <input type="number" name="estoqueAtual" class="form-control border border-2 p-2" value='0' min="0">
                                    @error('estoqueAtual')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                                               
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Código de barras</label>
                                    <input type="number" name="codigo_de_barras" class="form-control border border-2 p-2" value='' step="0.01" min="0" placeholder="Código de barras">
                                    @error('codigo_de_barras')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label for="floatingTextarea2">Detalhes</label>
                                    <textarea class="form-control border border-2 p-2"
                                        placeholder="Detalhes do produto" id="detalhes" name="detalhes"
                                        rows="4" cols="50">{{ old('about', auth()->user()->about) }}</textarea>
                                        @error('detalhes')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn bg-gradient-dark">Adicionar</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
        <x-footers.auth></x-footers.auth>
    </div>
    <x-plugins></x-plugins>

</x-layout>
