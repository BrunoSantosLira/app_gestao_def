<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="conta"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="conta"></x-navbars.navs.auth>

        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Listagem de Contas</h6>
                            </div>
                            <button class="btn btn-outline-success btn-sm mt-3"  data-bs-toggle="modal" data-bs-target="#ModalAdicionarConta">Abrir uma conta</button>

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
                                            CAPITAL TOTAL
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            ABERTURA
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            AÇÕES
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contas as $conta)
                                            
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">#{{$conta['id']}}</h6>
                                                    </div>
                                                </div>
                                            </td>   
                                     
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">{{$conta['nome']}}</h6>
                                                    </div>
                                                </div>
                                            </td>   
                                    
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">R${{$conta['capital']}}</h6>
                                                    </div>
                                                </div>
                                            </td>   
                                            <td>
                                                <div class="d-flex ">
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">{{ date('d/m/Y', strtotime($conta['created_at'])) }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a target="_blank" href="{{route('conta.show', ['contum' => $conta->id])}}"><i class="fa-solid fa-eye m-2" style="color: #1160e8; font-size:1.5em;"></i></a>
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
            <div class="modal fade" id="ModalAdicionarConta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Abrir conta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="{{route('conta.store')}}" method="POST">
                            @csrf


                            <div class="mb-3 col-md-6">
                                <label class="form-label">Nome da conta</label>
                                <input type="text" name="nome" class="form-control border border-2 p-2" required placeholder="Nome:">
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Capital Inicial</label>
                                <select name="capital" id="" class="form-control border border-2 p-2">
                                    <option value="0">0</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Abrir</button>
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
