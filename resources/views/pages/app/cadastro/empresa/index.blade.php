<x-layout bodyClass="g-sidenav-show bg-gray-200">

    <x-navbars.sidebar activePage="Usuarios"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='Configurações da Empresa'></x-navbars.navs.auth>
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
                        @if (Session::has('success'))
                            <div class="alert alert-success text-white">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <div class="row">
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <form method='POST' action='{{ route('empresa.store') }}'>
                            @csrf
                            
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">CNPJ</label>
                                    <input type="text" name="cnpj" class="form-control border border-2 p-2" value='' placeholder="CNPJ:">
                                    @error('cnpj')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Razão Social</label>
                                    <input type="text" name="razao_social" class="form-control border border-2 p-2" value='' placeholder="Razão Social:">
                                    @error('razao_social')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>
                            
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Nome Fantasia</label>
                                    <input type="text" name="nome_fantasia" class="form-control border border-2 p-2" value='' placeholder="Nome Fantasia:">
                                    @error('nome_fantasia')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">I.E.</label>
                                    <input type="text" name="ie" class="form-control border border-2 p-2" value='' placeholder="I.E:">
                                    @error('ie')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Email:</label>
                                    <input type="email" name="email" class="form-control border border-2 p-2" value='' placeholder="Email:">
                                    @error('email')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                <hr>
                                <h6>ENDEREÇO</h6>

                                <div class="mb-3 col-md-3">
                                    <label class="form-label">CEP</label>
                                    <input type="text" name="cep" class="form-control border border-2 p-2" value='' placeholder="CEP:">
                                    @error('cep')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Logradouro</label>
                                    <input type="text" name="logradouro" class="form-control border border-2 p-2" value='' placeholder="Logradouro:">
                                    @error('logradouro')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Número</label>
                                    <input type="text" name="numero" class="form-control border border-2 p-2" value='' placeholder="Número">
                                    @error('numero')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                
                                <div class="mb-3 col-md-9">
                                    <label class="form-label">Complemento</label>
                                    <input type="text" name="complemento" class="form-control border border-2 p-2" value="" placeholder="Complemento">
                                    @error('complemento')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Bairro</label>
                                    <input type="text" name="bairro" class="form-control border border-2 p-2" value='' placeholder="Bairro">
                                    @error('bairro')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                <div class="mb-3 col-md-3">
                                    <label class="form-label">UF:</label>
                                    <input type="text" name="uf" class="form-control border border-2 p-2" value='' placeholder="uf">
                                    @error('uf')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Municipio:</label>
                                    <input type="text" name="municipio" class="form-control border border-2 p-2" value='' placeholder="municipio">
                                    @error('municipio')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Fone:</label>
                                    <input type="text" name="fone" class="form-control border border-2 p-2" value='' placeholder="Fone:">
                                    @error('fone')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn bg-gradient-dark">atualizar</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
        <x-footers.auth></x-footers.auth>
    </div>
    <x-plugins></x-plugins>

</x-layout>
