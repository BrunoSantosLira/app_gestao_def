<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="OS"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="OS"></x-navbars.navs.auth>

        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Listagem de OS</h6>
                            </div>
                        
                            <a href="{{route('os.create')}}"><button class="btn btn-outline-primary btn-sm mt-3">Adicionar OS</button></a> 
                            <button class="btn btn-outline-primary btn-sm mt-3"  data-bs-toggle="modal" data-bs-target="#ModalAdicionarProdutoOS">Adicionar produto</button>
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
                                            CLIENTE
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            RESPONSÁVEL
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Data inicial
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Data final
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Vencimento
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Valor total
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            STATUS
                                            </th>
                                            <th
                                            class="text-uppercase  text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            AÇÕES
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($os as $key => $o)   
                                        @php
                                            $dataInicial = \Carbon\Carbon::parse($o['data_inicial']);
                                            $dataDeVencimento = $dataInicial->addDays($o['dias_garantia']);
                                        @endphp                                               
                                        <tr>
                                                <td>
                                                    <div class="d-flex px-2">
                                                        <div class="my-auto">
                                                            <h6 class="mb-0 text-sm">#{{$o['id']}}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2">
                                                        <div class="my-auto">
                                                            <h6 class="mb-0 text-sm">{{$o['cliente']['nome']}}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2">
                                                        <div class="my-auto">
                                                            <h6 class="mb-0 text-sm">{{$o['responsavel']}}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2">
                                                        <div class="my-auto">
                                                            <h6 class="mb-0 text-sm">{{ date('d/m/Y', strtotime($o['data_inicial'])) }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2">
                                                        <div class="my-auto">
                                                            <h6 class="mb-0 text-sm">{{ date('d/m/Y', strtotime($o['data_final'])) }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2">
                                                        <div class="my-auto">
                                                            <span class="badge bg-success text-dark">{{ $dataDeVencimento->format('d/m/Y') }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2">
                                                        <div class="my-auto">
                                                            <h6 class="mb-0 text-sm">R${{{$o['os_produtos'][$key]['valorTotal']}}}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2">
                                                        <div class="my-auto">
                                                                <span class="badge {{$o['status'] == 'finalizado' ? 'bg-success' : 'bg-warning'}} text-dark">{{$o['status']}}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2">
                                                        <div class="my-auto">
                                                            <a target="_blank" href="{{route('os.show', ['o' => $o->id])}}"><i class="fa-solid fa-eye m-2" style="color: #31b452;"></i></a>
                                                            <a target="_blank" href="{{route('os.edit', ['o' => $o->id])}}"><i class="fa-solid fa-pen-to-square m-2" style="color: #1160e8;"></i></a>
                                                            <form action="{{route('os.destroy', ['o' => $o->id])}}" class="d-inline-block" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" style="background: none; border:none;" class="btn-xl"><i class="fa-solid fa-trash m-2" style="color: #f01800;"></i></button>
                                                            </form>
                                                        </div>
                                                    </div>
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
            <x-footers.auth></x-footers.auth>
        </div>
        <!-- Modal USUÁRIO -->
        <div class="modal fade" id="ModalAdicionarProdutoOS" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar Produto na OS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="{{route('osprodutos.store')}}" method="POST">
                        @csrf
                        <label for="servico" class="form-label">OS</label>
                        <select id="servico" class="form-select  p-2" name="os_id">
                            @foreach ($os as $key => $o)
                            <option value="{{$o['id']}}">{{$o['nome']}}</option>
                            @endforeach
                        </select>

                        <label for="servico" class="form-label">Produto</label>
                        <select id="servico" class="form-select  p-2" name="produto_id">
                            @foreach ($produtos as $key => $produto)
                            <option value="{{$produto['id']}}">{{$produto['produto']}}</option>
                            @endforeach
                        </select>

                        <div class="mb-3 col-md-6">
                            <label class="form-label">Preço do produto</label>
                            <input type="number" name="preco" class="form-control border border-2 p-2" value='0' step="0.01" min="0" placeholder="Preço">
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label">Quantidade</label>
                            <input type="number" name="quantidade" class="form-control border border-2 p-2" value='0' placeholder="Preço">
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
    </main>
    <script>
    </script>
    <x-plugins></x-plugins>

</x-layout>
