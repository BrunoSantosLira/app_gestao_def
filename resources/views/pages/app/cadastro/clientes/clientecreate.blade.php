<x-layout bodyClass="g-sidenav-show bg-gray-200">

    <x-navbars.sidebar activePage="Clientes"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='Clientes'></x-navbars.navs.auth>
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
                        <a href="{{route('clientes.index')}}"><button class="btn btn-outline-primary btn-sm mt-3">Listagem de clientes <i class="fa-solid fa-folder fa-lg" style="font-size: 1.2em"></i> </button></a> 
                        @if (Session::has('success'))
                            <div class="alert alert-success text-white">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-3">Adicionar cliente</h6>
                            </div>
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <form method='POST' action='{{ route('clientes.store') }}'>
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">*Nome/Razão Social</label>
                                    <input type="text" class="form-control border border-2 p-2" id="name" placeholder="Nome" name="nome">
                                @error('nome')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>



                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">*Email</label>
                                    <input type="email" class="form-control border border-2 p-2" id="email" placeholder="email" name="email">
                                @error('email')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="text" class="form-label">*CPF/CNPJ</label>
                                    <input type="text" class="form-control border border-2 p-2" id="text" placeholder="Senha" name="CPF/CNPJ">
                                @error('CPF/CNPJ')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="tel" class="form-label">*Telefone</label>
                                    <input type="tel" class="form-control border border-2 p-2" id="tel" placeholder="Telefone" name="telefone">
                                    @error('responsavel')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                <h6 class="mb-3">Endereço</h6>

                                <div class="mb-3 col-md-6">
                                    <label for="logradouro" class="form-label">*Logradouro</label>
                                    <input type="text" class="form-control border border-2 p-2" id="logradouro" placeholder="Logradouro:" name="logradouro">
                                    @error('logradouro')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="logradouroNumero" class="form-label">*Número</label>
                                    <input type="number" class="form-control border border-2 p-2" id="logradouroNumero" placeholder="Numero do Logradouro:" name="logradouroNumero">
                                    @error('logradouroNumero')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                
                                <div class="mb-3 col-md-6">
                                    <label for="complemento" class="form-label">*Complemento</label>
                                    <input type="text" class="form-control border border-2 p-2" id="complemento" placeholder="Complemento:" name="complemento">
                                    @error('complemento')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                
                                
                                <div class="mb-3 col-md-6">
                                    <label for="bairro" class="form-label">*Bairro</label>
                                    <input type="text" class="form-control border border-2 p-2" id="bairro" placeholder="Bairro:" name="bairro">
                                @error('bairro')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>
                                
                                <div class="mb-3 col-md-6">
                                    <label for="cidade" class="form-label">*Cidade</label>
                                    <input type="text" class="form-control border border-2 p-2" id="cidade" placeholder="Cidade:" name="cidade">
                                @error('cidade')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="UF" class="form-label">*UF</label>
                                    <input type="text" class="form-control border border-2 p-2" id="UF" placeholder="UF:" name="UF">
                                @error('UF')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="CEP" class="form-label">*CEP</label>
                                    <input type="text" class="form-control border border-2 p-2" id="CEP" placeholder="CEP:" name="CEP">
                                @error('CEP')
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
