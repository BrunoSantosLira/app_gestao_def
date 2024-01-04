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
        @component('relatoriosPDF.components.cabecalho', ['empresa' => $empresa])
            
        @endcomponent

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

                                        TESTE
                                    </p>
                                </td>
                                <td>
                                    <p>

                                        RUA MARIO TIMOTEO DE LIRA
                                    </p>
                                </td>
                                <td>
                                    <p>

                                        CAMARAGIBE
                                    </p>
                                </td>
                                <td>
                                    <p>

                                        (91) 98923-5399
                                    </p>
                                </td>     
                                <td>
                                    <p>

                                        (11) 98363-7399
                                    </p>
                                </td>
                                <td>
                                    <p>

                                        (99) 96163-7219
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
                        <tr style="font-size: 10px; font-weight:none;">
                            <td>
                                <p>
                                    1
                                </p>
                            </td>
                            <td>
                                <p>
                                    BICO DE HIDROMASSAGEM DE BANHEIRA SANPRAY
                                </p>
                            </td>
                            <td>
                                <p>
                                    1
                                </p>
                            </td>
                            <td>
                                <p>
                                    R$139,99
                                </p>
                            </td>
                            <td>
                                <p>
                                    R$0,00
                                </p>
                            </td>
                            <td>
                                <p>
                                    R$139,99
                                </p>
                            </td>
                        </tr>

                        <tr style="font-size: 10px; font-weight:none;">
                            <td>
                                <p>
                                    1
                                </p>
                            </td>
                            <td>
                                <p>
                                    VAUVULA DE FUNDO P/ BANHEIRA SANPRAY
                                </p>
                            </td>
                            <td>
                                <p>
                                    1
                                </p>
                            </td>
                            <td>
                                <p>
                                    R$139,99
                                </p>
                            </td>
                            <td>
                                <p>
                                    R$0,00
                                </p>
                            </td>
                            <td>
                                <p>
                                    R$139,99
                                </p>
                            </td>
                        </tr>
            
                </tbody>
            </table>
            <div>
                <h5>TOTAL: R$280,00</h5>
            </div>
        </div>
    </div>

    </body>
</html>

