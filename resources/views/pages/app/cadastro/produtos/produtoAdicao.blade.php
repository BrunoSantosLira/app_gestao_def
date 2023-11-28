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
                                    <label class="form-label">Nome do produto:</label>
                                    <input type="text" name="produto" class="form-control border border-2 p-2" value='' placeholder="Nome:">
                                    @error('produto')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">NCM de 8 dígitos:</label>
                                    <input type="text" maxlength="10" name="NCM" class="form-control border border-2 p-2" value='' id="codigoNCM" placeholder="XXXX.XX.XX"">
                                    @error('NCM')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Código do distribuidor:</label>
                                    <input type="text" name="codDistribuidor" class="form-control border border-2 p-2" value='' placeholder="Insira aqui">
                                    @error('codDistribuidor')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Meu Código:</label>
                                    <input type="text" name="codPessoal" class="form-control border border-2 p-2" value='' placeholder="Insira aqui">
                                    @error('codPessoal')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>
                               
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Preço do produto:</label>
                                    <input type="number" name="preco" class="form-control border border-2 p-2" value='' step="0.01" min="0" placeholder="Preço">
                                    @error('preco')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                                               
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Valor  de compra:</label>
                                    <input type="number" name="valorCompra" class="form-control border border-2 p-2" value='' step="0.01" min="1" placeholder="Valor  de compra">
                                    @error('valorCompra')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Valor  de venda:</label>
                                    <input type="number" name="valorVenda" class="form-control border border-2 p-2" value='' step="0.01" min="1" placeholder="Valor  de venda">
                                    @error('valorCompra')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                
                                
                                


                                
                                <div class="mb-3 col-md-6">
                                    <label for="categoria" class="form-label">Unidade:</label>
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
                                    <label for="categoria" class="form-label">Categoria:</label>
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
                                    <label class="form-label">Estoque Atual:</label>
                                    <input type="number" name="estoqueAtual" class="form-control border border-2 p-2" value='0' min="0">
                                    @error('estoqueAtual')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                                               
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Código de barras:</label>
                                    <input type="number" name="codigo_de_barras" class="form-control border border-2 p-2" value='' step="0.01" min="0" placeholder="Código de barras">
                                    @error('codigo_de_barras')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label for="floatingTextarea2">Detalhes:</label>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
          // Seleciona o elemento de input
          const inputCodigoNCM = document.getElementById('codigoNCM');
        
          // Adiciona um ouvinte de evento para reagir a mudanças no input
          inputCodigoNCM.addEventListener('input', formatarCodigoNCM);
        
          function formatarCodigoNCM() {
            // Obtém o valor atual do input
            let codigoNCM = inputCodigoNCM.value;
        
            // Remove qualquer caractere não numérico
            codigoNCM = codigoNCM.replace(/\D/g, '');
        
            // Adiciona o formato desejado
            if (codigoNCM.length > 0) {
              codigoNCM = `${codigoNCM.substring(0, 4)}.${codigoNCM.substring(4, 6)}.${codigoNCM.substring(6)}`;
            }
        
            // Atualiza o valor do input
            inputCodigoNCM.value = codigoNCM;
          }
        });
        </script>
    <x-plugins></x-plugins>

</x-layout>
