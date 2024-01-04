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
        @component('relatoriosPDF.components.cabecalho', ['empresa' => $empresa, 'titulo' => $titulo])
            
        @endcomponent

        <div>
            <h5 style="text-align: center; font-size: 12px;">Dados</h5>
        </div>
        <!-- TABELA 2 -->	
        <div>
            <div><!-- TABELA AQUI -->
                <table class="tabela" border="1">
                    <thead>
                        <tr style="font-size: 12px">
                            @foreach ($cabecalhos as $c)
                                <th>{{$c}}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lista as $l)                             
                            <tr style="font-size: 10px; font-weight:none;">
                                <td>
                                    <p>
                                        {{$l[$param[0]]}}
                                    </p>
                                </td>
                                <td>
                                    <p>
                                        {{$l[$param[1]]}}
                                    </p>
                                </td>
                                <td>
                                    <p>
                                        {{$l[$param[2]]}}
                                    </p>
                                </td>
                                <td>
                                    <p>
                                        {{$l[$param[3]]}}
                                    </p>
                                </td>     
                                <td>
                                    <p>
                                        {{$l[$param[4]]}}
                                    </p>
                                </td>
                                @if ($l[$param[5]])
                                    <td>
                                        <p>
                                            {{$l[$param[5]]}}
                                        </p>
                                    </td>
                                @endif
                            </tr>
                        @endforeach     
                    </tbody>
                </table>

            </div>
        </div>
    </body>
</html>

