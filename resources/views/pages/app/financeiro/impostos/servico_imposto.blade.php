<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="financeiro"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="impostos"></x-navbars.navs.auth>

        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Listagem de impostos</h6>
                            </div>
                            <button class="btn btn-outline-success btn-sm mt-3"  data-bs-toggle="modal" data-bs-target="#ModalAdicionarImposto">Adicionar Imposto <i class="fa-solid fa-plus fa-lg" style="font-size: 1.2em"></i></button>

                            @if (Session::has('success'))
                                <div class="alert alert-success text-white">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            @if (Session::has('erro'))
                            <div class="alert alert-danger text-white">
                                {{ Session::get('erro') }}
                            </div>
                            @endif
                            @foreach ($errors->all() as $error)
                            <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0"><!-- TABELA AQUI -->
                                <table class="table align-items-center justify-content-center mb-0">
                                    <thead>

                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                ID
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            NOME
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            SERVIÇO/CATEGORIA
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            ALIQUOTA(%)
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($impostos as $imposto)
                                            
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">{{$imposto['id']}}</h6>
                                                    </div>
                                                </div>
                                            </td>   
                                     
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">{{$imposto['nome']}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                                                                 
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div class="my-auto">
                                                        @if(isset($imposto['categoria']) && !is_null($imposto['categoria']))
                                                            <h6 class="mb-0 text-sm">{{$imposto['categoria']['nome']}}</h6>
                                                        @else
                                                            <p class="text-danger">Serviço não definido</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                    
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">{{$imposto['aliquota']}}%</h6>
                                                    </div>
                                                </div>
                                            </td>   
                                            <td>
                                                <a target="_blank" href="{{route('servico_imposto.edit', ['servico_imposto' => $imposto->id])}}"><i class="fa-solid fa-pen-to-square m-2" style="color: #1160e8; font-size:1.2em;"></i></a>

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
                                
                            </div>
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
                                <label class="form-label">Categoria</label>
                                <select name="categoria_id" id="" class="form-control border border-2 p-2">
                                    @foreach ($categorias as $categoria)
                                        <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                                    @endforeach
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
    </main>
    <script>
    </script>
    <x-plugins></x-plugins>

</x-layout>
