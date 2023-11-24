<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="OS"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='OS'></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-100 border-radius-xl mt-4"
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
                        <a href="{{route('os.index')}}"><button class="btn btn-outline-primary btn-sm mt-3">Listagem de OS <i class="fa-solid fa-boxes-packing fa-lg" style="font-size: 1.2em"></i> </button></a> 
                        <div class="row mt-3">
                            <div class="col-md-8">
                                <h6 class="mb-3">Adicionar OS</h6>
                            </div>
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <tbody>
                                    <tr>
                                        <td style="width: 25%">
                                            <img src="https://equipcasa.com.br/os/assets/uploads/5b9f30af3a64298817e0f0f5b66947f4.jpg" class="img-fluid" style="max-height: 100px">
                                        </td>
                                        <td>
                                            <span style="font-size: 20px;">Equip Casa</span>
                                            <br>
                                            <span>12.272.914/0001-90</span>
                                            <br>
                                            <span>Rua 01, Chacara 38, Lote, 1 - Setor Habitacional Vicente Pires - Brasília - DF</span>
                                            <br>
                                            <span>E-mail: equipecasadf@gmail.com - Fone: (61)99337-4280</span>
                                        </td>
                                        <td style="width: 18%; text-align: center">
                                            <b>N° OS:</b>
                                            <span>1</span>
                                            <br>
                                            <br>
                                            <span>Emissão: 24/11/2023</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <tbody>
                                    <tr>
                                        <td style="width: 50%; padding-left: 0">
                                            <ul>
                                                <li>
                                                    <span>
                                                        <h5><b>CLIENTE</b></h5>
                                                        <span>CELITO NEVES</span><br/>
                                                        <span>Setor Habitacional Cascalheira Chácara 03, 5, Brazlândia</span>, <span>Brasília - DF</span><br>
                                                        <span>E-mail: admin@admin.com</span><br>
                                                        <span>Contato: (61)99993-020</span>
                                                    </span>
                                                </li>
                                            </ul>
                                        </td>
                                        <td style="width: 50%; padding-left: 0">
                                            <ul>
                                                <li>
                                                    <span>
                                                        <h5><b>RESPONSÁVEL</b></h5>
                                                    </span>
                                                    <span>Hugo Gandy</span> <br/>
                                                    <span>Contato: (61)99337-4280</span><br/>
                                                    <span>Email: equipecasadf@gmail.com</span>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-footers.auth></x-footers.auth>
    </div>
    <x-plugins></x-plugins>
</x-layout>
