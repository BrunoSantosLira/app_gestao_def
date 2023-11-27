<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="Usuarios"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Usuarios"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Lista de usuários</h6>
                            </div>
                            @if (Session::has('success'))
                                <div class="alert alert-success text-white">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            <button class="btn btn-outline-primary btn-sm mt-3"  data-bs-toggle="modal" data-bs-target="#ModalAdicionarUsuario">Adicionar usuário</button>

                            @if (request('status') == 'sucesso')
                                <div class="alert alert-success text-white" role="alert">
                                    <strong>Sucesso!</strong> Adicionado com sucesso!
                                </div><br> 
                            @elseif(request('status') == 'erro')
                                <div class="alert alert-danger text-white" role="alert">
                                    <strong>ERRO!</strong> Erro na adição
                                </div><br> 
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
                                            <th  class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                EMAIL
                                            </th>
                                            <th  class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                TELEFONE
                                            </th>
                                            <th  class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                LOCALIZAÇÃO
                                            </th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>   
                                        @foreach ($usuarios as $usuario)                                                  
                                                <tr>
                                                        <td>
                                                            <div class="d-flex px-2">
                                                                <div class="my-auto">
                                                                    <h6 class="mb-0 text-sm">#{{$usuario['id']}}</h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        
                                                        <td>
                                                            <p class="text-sm font-weight-bold mb-0">{{$usuario['name']}}</p>
                                                        </td>
                                                        <td>
                                                            <p class="text-sm font-weight-bold mb-0">{{$usuario['email']}}</p>
                                                        </td>
                                                        <td>
                                                            <p class="text-sm font-weight-bold mb-0">{{$usuario['phone']}}</p>
                                                        </td>
                                                        <td>
                                                            <p class="text-sm font-weight-bold mb-0">{{$usuario['location']}}</p>
                                                        </td>
                                                        <td class="float-end">
                                                        @if (auth()->user()->email == 'admin@material.com')
                                                                @if ($usuario['email'] != auth()->user()->email)
                                                                <form method="POST" action="{{route('usuarios.destroy', ['usuario' => $usuario['id']])}}" class="d-inline-block">                                                           
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" style="background: none; border:none;" class="btn-xl"><i class="fa-solid fa-trash m-2" style="color: #f01800;"></i></button>        
                                                            </form>
                                                            @endif
                                                        @endif 
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
        <div class="modal fade" id="ModalAdicionarUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar Usuário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="{{route('usuarios.store')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">*Nome do serviço</label>
                            <input type="text" class="form-control border border-2 p-2l" id="name" placeholder="Nome" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">*Email</label>
                            <input type="email" class="form-control border border-2 p-2" id="email" placeholder="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">*Senha</label>
                            <input type="password" class="form-control border border-2 p-2" id="password" placeholder="Senha" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="tel" class="form-label">Telefone</label>
                            <input type="tel" class="form-control border border-2 p-2" id="tel" placeholder="Telefone" name="phone">
                        </div>
                        <div class="mb-3">
                            <label for="Localidade" class="form-label">Localidade</label>
                            <input type="text" class="form-control border border-2 p-2" id="Localidade" placeholder="Localização:" name="location">
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
