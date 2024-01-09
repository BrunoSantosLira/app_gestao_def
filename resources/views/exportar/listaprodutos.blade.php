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
        <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0"><!-- TABELA AQUI -->
                <table class="tabela" border="1">
                    <tbody>
                            <tr>
                                <td style="width: 60%;">
                                        <div style="margin-left: 15px;">
                                            <img src="https://gestor.equipcasa.com.br/assets/img/logomarcas/1703079841_7a6c0ad2ca31fefec88e.jpg" style="display: inline-block;" width="100" height="100">
                                                <p style="font-size: 10px; display: inline-block; float:right; font-weight:bold;">
                                                    {{$empresa['nome_fantasia']}} <br>
                                                    {{$empresa['logradouro']}} <br>
                                                    {{$empresa['cep']}} - {{$empresa['municipio']}} - {{$empresa['uf']}} <br>
                                                    TEL: {{$empresa['fone']}}<br>
                                                    E-Mail: {{$empresa['email']}}<br>
                                                </p>
                                        </div> 
                                </td>
                            
                                <td style="width: 20%;">
                                   <h5 style="text-align: center">LISTA DE PRODUTOS</h5>
                                </td>
                                <td style="width: 20%;">
                                    <p style="font-size:12px; font-weight:bold; ">
                                        CÓDIGO: <span>{{$checklistProduto['id']}}</span> <br>
                                        DATA:   <span>{{ date('d/m/Y', strtotime($checklistProduto['created_at'])) }}</span><br>
                                        VENDEDOR:  <span>HUGO</span><br>
                                    </p>
                                    <p style="font-size:12px; font-weight:bold; ">EMISSÃO: 02/01/2024</p>
                                </td>
                            </tr>
               
                    </tbody>
                </table>
            </div>
        </div>
        <!-- TABELA 2 -->	
        <div>
            <div><!-- TABELA AQUI -->
                <table class="tabela" border="1">
                    <thead>
                        <tr style="font-size: 12px">
                            <th>CLIENTE</th>
                            <th>ENDEREÇO</th>
                            <th>CIDADE</th>
                            <th>TELEFONE 1</th>
                            <th>TELEFONE 2</th>
                            <th>TELEFONE 3</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr style="font-size: 10px; font-weight:none;">
                                <td>
                                    <p>

                                        {{$cliente->nome}}
                                    </p>
                                </td>
                                <td>
                                    <p>

                                        {{$cliente->logradouro}}
                                    </p>
                                </td>
                                <td>
                                    <p>

                                        {{$cliente->cidade}}
                                    </p>
                                </td>
                                <td>
                                    <p>

                                        {{$cliente->telefone}}
                                    </p>
                                </td>     
                                <td>
                                    <p>

                                        {{$cliente->telefone2}}
                                    </p>
                                </td>
                                <td>
                                    <p>

                                        {{$cliente->telefone3}}
                                    </p>
                                </td>
                            </tr>
               
                    </tbody>
                </table>

            </div>
        </div>
        <!-- TABELA 3 -->	
        <div>
            <div><!-- TABELA AQUI -->
                <table class="tabela" border="1">
                    <thead>
                        <tr style="font-size: 12px;">
                            <th style="text-align: center">DETALHES | LAUDO TÉCNICO | SOLICITAÇÕES DO CLIENTE</th>                                </th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr style="font-size: 10px; font-weight:none;">
                                <td>
                                    <p>
                                        LISTA DE PRODUTOS
                                    </p>
                                </td>
                            </tr>
                
                    </tbody>
                </table>
            </div>
        </div>

        <div>
            <h5 style="text-align: center; font-size: 12px;">MERCADORIAS</h5>
        </div>
        <!-- TABELA 4 -->	
        <div>
        <div><!-- TABELA AQUI -->
            <table class="tabela" border="1">
                <thead>
                    <tr style="font-size: 12px">
                        <th>CÓDIGO</th>
                        <th>DESCRIÇÃO</th>
                        <th>QTD.</th>
                        <th>PR. UNIT. 1</th>
                        <th>DESC.</th>
                        <th>TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $key => $produto)
                        <tr style="font-size: 10px; font-weight:none;">
                            <td>
                                <p>
                                    {{$key}}
                                </p>
                            </td>
                            <td>
                                <p>
                                    {{$produto->produto->produto}}
                                </p>
                            </td>
                            <td>
                                <p>
                                    {{$produto->quantidade}}
                                </p>
                            </td>
                            <td>
                                <p>
                                    {{$produto->preco}}
                                </p>
                            </td>
                            <td>
                                <p>
                                    {{$produto->desconto}}
                                </p>
                            </td>
                            <td>
                                <p>
                                    {{$produto->valorTotal}}
                                </p>
                            </td>
                        </tr>   
                    @endforeach	
                </tbody>
            </table>
            <div>
                <h5>TOTAL: R${{$valorTotal}}</h5>
            </div>
        </div>
    </div>

    <div>
        <h5 style="text-align: center; font-size: 12px;">Parcelas</h5>
    </div>
    <!-- TABELA 4 -->	
    <div>
    <div><!-- TABELA AQUI -->
        <table class="tabela" border="1">
            <thead>
                <tr style="font-size: 12px">
                    <th>PARCELA</th>
                    <th>VALOR</th>
                    <th>VENCIMENTO</th>
                    <th colspan="3">STATUS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($parcelas as $key => $parcela)
                
                    <tr style="font-size: 10px; font-weight:none;">
                        <td>
                            <p>
                                {{$key}}
                            </p>
                        </td>
                        <td>
                            <p>
                                {{$parcela['valor']}}
                            </p>
                        </td>
                        <td>
                            <p>
                                {{$parcela['data_vencimento']}}
                            </p>
                        </td>
                        <td colspan="3">
                            <p>
                                {{$parcela['status_pagamento']}}
                            </p>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


    </body>
</html>

