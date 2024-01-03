<x-layout bodyClass="g-sidenav-show bg-gray-200">

    <x-navbars.sidebar activePage="ContasRecebas"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='Contas A Receber'></x-navbars.navs.auth>
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
                        <a href="{{route('ContasReceber.index')}}"><button class="btn btn-outline-primary btn-sm mt-3">Listagem de contas a receber <i class="fa-solid fa-boxes-packing fa-lg" style="font-size: 1.2em"></i> </button></a> 
                        @if (Session::has('success'))
                            <div class="alert alert-success text-white">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-3">Conta a pagar</h6>
                            </div>
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <form method='POST' action='{{ route('ContasReceber.update', ['ContasReceber' => $conta->id]) }}'>
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Status:</label>
                                    <select id="status_pagamento" class="form-select p-2" name="status_pagamento">
                                        <option class="" value="{{$conta['status']}}">STATUS ATUAL: ({{$conta['status']}})</option>
                                        <option value="pendente">Pendente</option>
                                        <option value="atrasado">Atrasado</option>
                                        <option value="pago">Pago</option>
                                    </select>
                                    @error('produto')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Nome:</label>
                                    <input type="text"  name="nome"  class="form-control border border-2 p-2" value='{{$conta->nome}}' id="nome" placeholder="Insira o nome">
                                    @error('nome')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Data Venc.</label>
                                    <input type="date"  name="data_vencimento" required class="form-control border border-2 p-2" value='{{$conta->data_vencimento}}' id="nome" placeholder="Insira o nome da conta">
                                    @error('data_vencimento')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Data Rec.</label>
                                    <input type="date"  name="data_recebimento" disabled  class="form-control border border-2 p-2" value='{{$conta->data_recebimento}}' id="nome" placeholder="Insira o nome da conta">
                                    <small>Contada a partir da aprovação</small>
                                    @error('data_pagamento')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Valor:</label>
                                    <input type="number" name="valor" class="form-control border border-2 p-2" value='{{$conta->valor}}' step="0.01" min="1" placeholder="Valor">
                                    @error('valor')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label for="floatingTextarea2">Observações:</label>
                                    <textarea class="form-control border border-2 p-2"
                                        placeholder="Observações" id="observacoes"  name="observacoes"
                                        rows="4" cols="50">{{$conta->observacoes}}</textarea>
                                        @error('observacoes')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                        <small>OBS: Será retirado dinheiro do caixa ao pagar</small>
                                </div>


                            </div>
                            <button type="submit" class="btn bg-gradient-dark">Atualizar</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
        <x-footers.auth></x-footers.auth>
    </div>

    <x-plugins></x-plugins>

</x-layout>
