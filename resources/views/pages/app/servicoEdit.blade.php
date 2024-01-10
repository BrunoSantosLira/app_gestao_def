<x-layout bodyClass="g-sidenav-show bg-gray-200">

    <x-navbars.sidebar activePage="servicos"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='Servicos'></x-navbars.navs.auth>
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
                        <a href="{{route('servico.index')}}"><button class="btn btn-outline-primary btn-sm mt-3">Listagem de Serviços <i class="fa-solid fa-folder fa-lg" style="font-size: 1.2em"></i> </button></a> 
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
                        <form method='POST' action='{{ route('servico.update', ['servico' => $servico->id]) }}'>
                            @csrf
                            @method('PATCH')
                            <div class="row">

                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">*Nome do serviço</label>
                                    <input type="text" class="form-control border border-2 p-2" id="nome" placeholder="Nome:" name="nome" value="{{$servico->nome}}">
                                @error('nome')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">*Valor</label>
                                    <input type="number" class="form-control border border-2 p-2" id="valor" placeholder="VALOR" name="preco" value="{{$servico->preco}}">
                                @error('valor')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label for="floatingTextarea2">Descrição:</label>
                                    <textarea class="form-control border border-2 p-2"
                                        placeholder="Descrição" id="desccriccao" name="descricao"
                                        rows="4" cols="50">{{$servico->descricao}}</textarea>
                                        @error('detalhes')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                </div>

                            </div>
                            <button type="submit" class="btn bg-gradient-dark">ATUALIZAR</button>
                        </form>
                        
                        <div class="col-md-8 d-flex align-items-center">
                            <h6 class="mb-3">Impostos aplicados</h6>
                        </div>
                        <button class="btn btn-outline-success btn-sm mt-3"  data-bs-toggle="modal" data-bs-target="#ModalAdicionarImposto">Adicionar Imposto <i class="fa-solid fa-plus fa-lg" style="font-size: 1.2em"></i></button>
                                <table class="table align-items-center justify-content-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            ID
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nome
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Taxa em %
                                            </th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>           
                                        @foreach ($impostos as $key => $imposto)
                                            <tr>
                                                    <td>
                                                        <div class="d-flex px-2">
                                                            <div class="my-auto">
                                                                <h6 class="mb-0 text-sm">{{$key + 1 }}</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex px-2">
                                                            <div class="my-auto">
                                                                <h6 class="mb-0 text-sm">{{$imposto->nome}}</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex px-2">
                                                            <div class="my-auto">
                                                                <h6 class="mb-0 text-sm">{{$imposto->aliquota}}</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <form action="{{route('servico_imposto.destroy', ['servico_imposto' => $imposto->id])}}" class="d-inline-block" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" style="background: none; border:none;" class="btn-xl" ><i  class="fa-solid fa-trash m-2" style="color: #f01800;"></i></button>
                                                        </form>
                                                    </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                        <br>
                    </div>
                </div>
            </div>

        </div>
        <!-- Modal ADICIONAR IMPOSTOS -->
    <div class="modal fade" id="ModalAdicionarImposto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Adicionar Imposto</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{route('servico_imposto.store')}}" method="POST">
                    @csrf


                    <div class="mb-3 col-md-6">
                        <label class="form-label">Nome do imposto</label>
                        <input type="text" name="nome" class="form-control border border-2 p-2" required placeholder="Imposto">
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label">% da Aliquota</label>
                        <input type="number" name="aliquota" step="0.01" class="form-control border border-2 p-2" required placeholder="Aliquota(%)">
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label">Serviço</label>
                        <select name="servico_id" id="" class="form-control border border-2 p-2">
                            <option value="{{$servico->id}}">{{$servico->nome}}</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Adicionar</button>
                </form>
            </div>

            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>

        </div>
        </div>
    </div>
        <x-footers.auth></x-footers.auth>
    </div>
    <x-plugins></x-plugins>

</x-layout>
