<x-layout bodyClass="g-sidenav-show bg-gray-200">

    <x-navbars.sidebar activePage="checklists"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='Checklists'></x-navbars.navs.auth>
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
                        <a href="{{route('checklist.index')}}"><button class="btn btn-outline-primary btn-sm mt-3">Listagem de Checklists <i class="fa-solid fa-folder fa-lg" style="font-size: 1.2em"></i> </button></a> 
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
                        <form method='POST' action='{{ route('checklist.update', ['checklist' => $checklist->id]) }}'>
                            @csrf
                            @method('PATCH')
                            <div class="row">

                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">*Nome da Checklist</label>
                                    <input type="text" class="form-control border border-2 p-2" id="nome" placeholder="Nome:" name="nome" value="{{$checklist->nome}}">
                                @error('nome')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">*Serviço</label>
                                    <select id="servico_id" class="form-select p-2" name="servico_id">
                                        <option class="" value="{{$checklist['servico_id']}}">Atual: ({{$checklist['servico_id']}})</option>
                                        @foreach ($servicos as $key => $servico)
                                            <option class="" value="{{$servico['id']}}">{{$servico['nome']}}  ({{$servico['id']}})</option>
                                        @endforeach
                                    </select>
                                    @error('valor')
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
