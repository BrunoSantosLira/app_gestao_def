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
                        <a href="{{route('fornecedores.index')}}"><button class="btn btn-outline-primary btn-sm mt-3">Listagem de fornecedores <i class="fa-solid fa-folder fa-lg" style="font-size: 1.2em"></i> </button></a> 
                        @if (Session::has('success'))
                            <div class="alert alert-success text-white">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-3">Editar fornecedor</h6>
                            </div>
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <form method='POST' action='{{ route('fornecedores.update', ['fornecedore' => $fornecedor->id]) }}'>
                            @csrf
                            @method('PATCH')
                            <div class="row">

                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">*Nome Fantasia</label>
                                    <input type="text" class="form-control border border-2 p-2" id="nome_fantasia" placeholder="Nome Fantasia" name="nome_fantasia" value="{{$fornecedor['nome_fantasia']}}">
                                @error('nome_fantasia')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">*Razão Social</label>
                                    <input type="text" class="form-control border border-2 p-2" id="razao_social" placeholder="Razão social" name="razao_social" value="{{$fornecedor['razao_social']}}">
                                @error('razao_social')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>
                                
                                <div class="mb-3 col-md-6">
                                    <label for="text" class="form-label">*CNPJ</label>
                                    <input type="text" class="form-control border border-2 p-2" id="text" placeholder="Insira corretamente" name="cnpj" value="{{$fornecedor['cnpj']}}">
                                @error('cnpj')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="text" class="form-label">*Endereço</label>
                                    <input type="text" class="form-control border border-2 p-2" id="endereco" placeholder="Endereço" name="endereco" value="{{$fornecedor['endereco']}}">
                                @error('endereco')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">*Contato</label>
                                    <input type="text" class="form-control border border-2 p-2" id="contato" placeholder="Contato" name="contato" value="{{$fornecedor['contato']}}">
                                @error('contato')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">*Email</label>
                                    <input type="email" class="form-control border border-2 p-2" id="email" placeholder="email" name="email" value="{{$fornecedor['email']}}">
                                @error('email')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>


                                <div class="mb-3 col-md-6">
                                    <label for="tel" class="form-label">Telefone fixo</label>
                                    <input type="tel" class="form-control border border-2 p-2" id="telefone_fixo" placeholder="Telefone" name="telefone_fixo" value="{{$fornecedor['telefone_fixo']}}">
                                    @error('telefone_fixo')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="tel" class="form-label">Telefone Celular</label>
                                    <input type="tel" class="form-control border border-2 p-2" id="telefone_celular" placeholder="Telefone celular" name="telefone_celular" value="{{$fornecedor['telefone_celular']}}">
                                    @error('telefone_celular')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="tel" class="form-label">Whatsapp</label>
                                    <input type="tel" class="form-control border border-2 p-2" id="whatsapp" placeholder="whatsapp" name="whatsapp" value="{{$fornecedor['whatsapp']}}">
                                    @error('whatsapp')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                            </div>
                            <button type="submit" class="btn bg-gradient-dark">ATUALIZAR</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
        <x-footers.auth></x-footers.auth>
    </div>
    <x-plugins></x-plugins>

</x-layout>
