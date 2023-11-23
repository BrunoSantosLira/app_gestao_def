<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        
        <style>
            .page-break {
                page-break-after: always;
            }
            .titulo {
                border: 1px ;
                background-color: gray;
                text-align: center;
                width: 100%;
                text-transform: uppercase;
                font-weight: bold;
                color: white;
                margin-bottom: 25px;

            }
            .tabela{
                width: 100%;
            }
            table th{
                text-align: left;                
            }
        </style>

        <!-- Latest compiled and minified CSS -->
        <!-- Latest compiled and minified JavaScript -->

    </head>
    <body>

        <div class="titulo">Lista de serviços</div>
        <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0"><!-- TABELA AQUI -->
                <table class="tabela" border="1">
                    <thead>
                        <tr>
                            <th
                                class="text-uppercase text-secondary text-xxs font-weight-bolder">
                                ID</th>
                            <th
                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                Serviço
                            </th>
                            <th  class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Data de criação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($servicos as $key => $s)                         
                            <tr>
                                    <td>
                                        <div class="d-flex px-2">
                                            <div class="my-auto">
                                                <h4 class="mb-0 text-sm">#{{$s['id']}}</h4>
                                            </div>
                                        </div>
                                    </td>
                                    
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$s['nome']}}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ \Carbon\Carbon::parse($s['created_at'])->format('d/m/Y') }}</p>
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
    </body>
</html>

