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
                {{$contrato}}
                <div class="card card-plain h-100">
                    <div class="card-header pb-0 p-3">
                        <a href="{{route('contrato.index')}}"><button class="btn btn-outline-primary btn-sm mt-3">Listagem de Contratos <i class="fa-solid fa-folder fa-lg" style="font-size: 1.2em"></i> </button></a> 
                        @if (Session::has('success'))
                            <div class="alert alert-success text-white">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-3">Dados do Contrato</h6>
                            </div>
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-body p-3">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Nome da contrato</label>
                                    <input disabled type="text" name="nome" class="form-control border border-2 p-2" value='{{$contrato[0]['nome']}}' placeholder="Nome:">
                                    @error('nome')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                
                                <div class="mb-3 col-md-6">
                                    <label for="categoria" class="form-label">Cliente</label>
                                    <select disabled id="categoria" class="form-select p-2" name="cliente_id">
                                        <option class="" value="{{$contrato[0]['cliente_id']}}">({{$contrato[0]['cliente']['nome']}})</option>
                                    </select>
                                    @error('cliente_id')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Nome do responsável</label>
                                    <input disabled type="text" name="responsável" class="form-control border border-2 p-2" value='{{$contrato[0]['responsável']}}' placeholder="Responsável:">
                                    @error('responsavel')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Método de pagamento</label>
                                    <input disabled type="text" name="metodo_de_pagemento" class="form-control border border-2 p-2" value='{{$contrato[0]['metodo_de_pagemento']}}' placeholder="Responsável:">
                                    @error('responsavel')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Quantidade de parcelas</label>
                                    <input disabled type="number" name="quantidade_parcelas" class="form-control border border-2 p-2" min="1" value='{{$contrato[0]['quantidade_parcelas']}}' placeholder="Parcelas:">
                                    <small>Valor mínimo de 1 parcela(a vista)</small>
                                    @error('responsavel')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Data inicial</label>
                                    <input disabled type="date" name="data_inicio" class="form-control border border-2 p-2" value='{{$contrato[0]['data_inicio']}}'>
                                    @error('data_inicio')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Data final</label>
                                    <input disabled type="date" name="data_fim" class="form-control border border-2 p-2" value='{{$contrato[0]['data_fim']}}'>
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
                                    <textarea disabled class="form-control border border-2 p-2"
                                        placeholder="Detalhes do produto"  name="corpo"
                                        rows="4" cols="50">{{ $contrato[0]['corpo']}}</textarea>
                                        @error('observacoes')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                </div>
                            </div>
                    </div>

                    <div>
                        <h3 class="text-center">Contrato</h3>
                        <div class="border text-dark" id="p1">
                            <textarea name="" id="" cols="30" rows="10" style="width: 100%; height: 100%; box-sizing: border-box;">
                                Aliquip do dolore ex reprehenderit nisi voluptate id amet dolor mollit eiusmod. In fugiat minim amet minim qui dolore nulla elit quis aute aliqua minim culpa esse. Magna in incididunt non deserunt pariatur. Cupidatat id ad duis ad cillum sunt culpa esse.
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <x-footers.auth></x-footers.auth>
    </div>
    <x-plugins></x-plugins>

</x-layout>
