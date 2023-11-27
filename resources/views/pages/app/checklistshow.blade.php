<x-layout bodyClass="g-sidenav-show  bg-gray-200 ">
    <x-navbars.sidebar activePage="checklist"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="checklist"></x-navbars.navs.auth>
        <style>
            /* Estilo personalizado para campos de entrada visualmente desativados */
            .custom-disabled {
              background-color: #e9ecef; /* Cor de fundo desativada do Bootstrap */
              opacity: 0.5; /* Opacidade para indicar visualmente desativação */
              pointer-events: none; /* Impede interação com o campo */
            }
          </style>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Lista de campos da checklist:</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0"><!-- TABELA AQUI -->
                                <a href="{{route('checklist.index')}}" class="m-3"><i class="fa-solid fa-square-caret-left fa-2xl"></i></a>
                                <table class="table align-items-center justify-content-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                ID
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            CAMPO
                                            </th>
                                            <th  class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Data de criação</th>
                                            <th  class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                CONCLUIDO
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($checklist as $key => $c)
                                        <tr>
                                            <td>                    
                                                <div class="d-flex px-2">
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">#{{$key + 1}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td> <p class="text-sm font-weight-bold ml-2 mb-0">{{$c['nome']}}</p></td>
                                            <td> <p class="text-sm font-weight-bold ml-2 mb-0">{{ \Carbon\Carbon::parse($c['created_at'])->format('d/m/Y') }}</p></td>
                                            <td> 
                                                <p class="text-sm font-weight-bold ml-2 mb-0">
                                                    <form action="{{route('campo.update', ['campo' => $c['id']])}}" method="POST" class="d-inline-block">
                                                        @csrf
                                                        @method('PATCH')
                                                          <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="concluida" id="SIM" value="1" {{$c['concluida'] == 1 ? 'checked' : ''}}>
                                                            <label class="form-check-label" for="SIM">
                                                              SIM
                                                            </label>
                                                          </div>
                                                          <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="concluida" id="NÃO" value="0" {{$c['concluida'] == 0 ? 'checked': ''}}>
                                                            <label class="form-check-label" for="NÃO">
                                                              NÃO
                                                            </label>
                                                          </div>
                                                          <button type="submit" style="background: none; border:none;" class="btn-xl"><i class="fa-solid fa-pen-to-square m-2" style="color: #1160e8;"></i></button>
                                                        </form>
                                                    <form action="{{ route('campo.destroy', ['campo' => $c['id']]) }}" method="POST" class="d-inline-block" onsubmit="return confirmacao()">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" style="background: none; border:none;" class="btn-xl"><i class="fa-solid fa-trash m-2" style="color: #f01800;"></i></button>
                                                    </form>
                                                </p>
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

            <script>
                    function confirmacao(){
                       
                       let resp = confirm('Tem certeza que deseja excluir?');
                       return resp;
                     }
            </script>
            <x-footers.auth></x-footers.auth>

        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>
