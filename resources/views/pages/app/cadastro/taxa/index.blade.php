<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="financeiro"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="cadastro de Taxas"></x-navbars.navs.auth>

        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Listagem de taxas</h6>
                            </div>
                        
                            <button class="btn btn-outline-primary btn-sm mt-3"  data-bs-toggle="modal" data-bs-target="#ModalAdicionar">Adicionar Taxa</button>
                            @if (Session::has('success'))
                                <div class="alert alert-success text-white">
                                    {{ Session::get('success') }}
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
                                            VALOR
                                            </th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($taxas as $taxa)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">#{{$taxa->id}}</h6>
                                                    </div>
                                                </div>
                                            </td>   
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{$taxa->nome}}</p>
                                            </td>

                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{$taxa->valor}}%</p>
                                            </td>
                                            <td>
                                                <a target="_blank" href="{{route('taxa.edit', ['taxon' => $taxa->id])}}"><i class="fa-solid fa-pen-to-square m-2" style="color: #1160e8; font-size:1.5em;"></i></a>

                                                <form action="{{route('taxa.destroy', ['taxon' => $taxa->id])}}" class="d-inline-block" method="POST">
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
              <!-- Modal adicionar Checklist-->
              <div class="modal fade" id="ModalAdicionar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Adicionar Taxa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>

                    <div class="modal-body">
                        <form action="{{route('taxa.store')}}" method="POST">
                            @csrf
                            <div class="mt-3 mb-3">
                                <label for="nome" class="form-label">Nome:</label>
                                <input type="text" required class="form-control border border-2 p-2" id="nome" placeholder="Nome" name="nome">
                            </div>

                            <div class="mt-3 mb-3">
                                <label for="nome" class="form-label">Valor da taxa em %:</label>
                                <input type="number" required class="form-control border border-2 p-2" id="valor"  step="0.01" min="1" placeholder="Valor:" name="valor">
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
  
    <x-plugins></x-plugins>

</x-layout>
