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
                                                    EQUIP CASA EIRELI <br>
                                                    Rua 1 Chácara 1, 5 LOTE <br>
                                                    Setor Habitacional Vicente Pir<br>
                                                    72005-105 BRASÍLIA - DF<br>
                                                    TEL: (61)99337-4280<br>
                                                    E-Mail: equipecasadf@gmail.com<br>
                                                </p>
                                        </div> 
                                </td>
                            
                                <td style="width: 20%;">
                                   <h5 style="text-align: center">ORDEM DE SERVIÇO</h5>
                                </td>
                                <td style="width: 20%;">
                                    <p style="font-size:12px; font-weight:bold; ">
                                        CÓDIGO: <span>{{$os[0]['id']}}</span> <br>
                                        DATA:   <span>{{ date('d/m/Y', strtotime($os[0]['created_at'])) }}</span><br>
                                        VENDEDOR:  <span>HUGO</span><br>
                                    </p>
                                    <p style="font-size:12px; font-weight:bold; ">EMISSÃO: {{ date('d/m/Y', strtotime($os[0]['created_at'])) }}</p>
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
                                        {{$os[0]['cliente']['nome']}}
                                    </p>
                                </td>
                                <td>
                                    <p>
                                        {{$os[0]['cliente']['logradouro']}} 
                                    </p>
                                </td>
                                <td>
                                    <p>
                                        {{$os[0]['cliente']['cidade']}} 
                                    </p>
                                </td>
                                <td>
                                    <p>
                                        {{$os[0]['cliente']['telefone']}} 
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
                            <th style="text-align: center" colspan="6">DETALHES | LAUDO TÉCNICO | SOLICITAÇÕES DO CLIENTE</th>                                </th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr style="font-size: 10px; font-weight:none;">
                                <td colspan="6">
                                    <p>
                                        {{$os[0]['observacoes']}}
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6" style="text-align: center; font-size:12px; font-weight:bold;background-color:rgb(223, 219, 219)">
                                    OBS: EM CASOS GARANTIA É OBRIGATÓRIA A APRESENTAÇAO DA OS. O PRAZO DE GARANTIA: É A PARTIR DA DATA DA OS (PARA
                                    SERVIÇOS REALIZADOS COM NOSSOS MATERIAIS A GARATIA É DE 12 MESES).
                                </td>
                            </tr>
                
                    </tbody>
                </table>
            </div>
        </div>
        <!-- TABELA 4 -->	
        <div>
        <div><!-- TABELA AQUI -->
            <table class="tabela" border="1">
                <thead>
                    <tr>
                        <td colspan="6" style="text-align: center; font-size:12px; font-weight:bold;">SERVIÇOS</td>
                    </tr>
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
                    @foreach ($servicos as $servico)
                        <tr style="font-size: 10px; font-weight:none;">
                            <td>
                                <p>
                                    {{$servico['servico']['id']}}
                                </p>
                            </td>
                            <td>
                                <p>
                                    {{$servico['servico']['nome']}}
                                </p>
                            </td>
                            <td>
                                <p>
                                    {{$servico['quantidade']}}
                                </p>
                            </td>
                            <td>
                                <p>
                                    {{$servico['preco']}}
                                </p>
                            </td>
                            <td>
                                <p>
                                    R$0,00
                                </p>
                            </td>
                            <td>
                                <p>
                                    {{$servico['valorTotal']}}
                                </p>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="6" style="font-size: 12px;font-weight:bold;">TOTAL EM SERVIÇOS: R${{$somaServicosOS}} </td>
                        </tr>
                </tbody>
            </table>
           
        </div>
    </div>

            <!-- TABELA 5 -->	
            <div>
                <div><!-- TABELA AQUI -->
                    <table class="tabela" border="1">
                        <thead>
                            <tr>
                                <td colspan="6" style="text-align: center; font-size:12px; font-weight:bold;">MERCADORIAS</td>
                            </tr>
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
                            @foreach ($produtos as $produto)
                                <tr style="font-size: 10px; font-weight:none;">
                                    <td>
                                        <p>
                                            {{$produto['produto']['id']}}
                                        </p>
                                    </td>
                                    <td>
                                        <p>
                                            {{$produto['produto']['produto']}}
                                        </p>
                                    </td>
                                    <td>
                                        <p>
                                            {{$produto['quantidade']}}
                                        </p>
                                    </td>
                                    <td>
                                        <p>
                                            {{$produto['preco']}}
                                        </p>
                                    </td>
                                    <td>
                                        <p>
                                            R$0,00
                                        </p>
                                    </td>
                                    <td>
                                        <p>
                                            {{$produto['valorTotal']}}
                                        </p>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="6" style="font-size: 12px;font-weight:bold;">TOTAL EM PRODUTOS: R${{$somaProdutosOS}} </td>
                                </tr>
                                <tr>
                                    <td colspan="6" style="font-size: 14px;font-weight:bold;">TOTAL DA ORDEM DE SERVIÇO:: R${{$os[0]['valorTotal']}} </td>
                                </tr>
                        </tbody>
                    </table>
                   
                </div>
            </div>
        
    <div class="page-break "></div>
    <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0"><!-- TABELA AQUI -->
            <table class="tabela" border="1">
                <tbody>
                        <tr>
                            <td style="width: 60%;">
                                    <div style="margin-left: 15px;">
                                        <img src="https://gestor.equipcasa.com.br/assets/img/logomarcas/1703079841_7a6c0ad2ca31fefec88e.jpg" style="display: inline-block;" width="100" height="100">
                                            <p style="font-size: 10px; display: inline-block; float:right; font-weight:bold;">
                                                EQUIP CASA EIRELI <br>
                                                Rua 1 Chácara 1, 5 LOTE <br>
                                                Setor Habitacional Vicente Pir<br>
                                                72005-105 BRASÍLIA - DF<br>
                                                TEL: (61)99337-4280<br>
                                                E-Mail: equipecasadf@gmail.com<br>
                                            </p>
                                    </div> 
                            </td>
                        
                            <td style="width: 20%;">
                               <h5 style="text-align: center">ORDEM DE SERVIÇO</h5>
                            </td>
                            <td style="width: 20%;">
                                <p style="font-size:12px; font-weight:bold; ">
                                    CÓDIGO: <span>{{$os[0]['id']}}</span> <br>
                                    DATA:   <span>{{ date('d/m/Y', strtotime($os[0]['created_at'])) }}</span><br>
                                    VENDEDOR:  <span>HUGO</span><br>
                                </p>
                                <p style="font-size:12px; font-weight:bold; ">EMISSÃO: {{ date('d/m/Y', strtotime($os[0]['created_at'])) }}</p>
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
                <tbody>
                        <tr style="font-size: 10px; font-weight:none;">
                            <td>
                                <p>
                                    FRETE: F
                                </p>
                            </td>
                            <td>
                                <p>
                                    LOCAL DE ENTREGA: COND BOSQUE IMPERIAL CONJ E CS, 03 PONTE ALTA NORTE - BRASÍLIA - DF - CEP: 72426020
                                </p>
                            </td>
                        </tr>

                        <tr style="font-size: 10px; font-weight:none;">
                            <td>
                                <p>
                                    OBSERVAÇÕES: 
                                </p>
                            </td>
                            <td>
                                <p>
                                    LOCAL DE ENTREGA: BANHEIRA COM GARANTIA DE MÃO DE OBRA NA:
                                    PINTURA, HIDRÁULICA, VAZAMENTO E INSTALAÇÃO DA MESMA.
                                    NÃO ESTA INCLUSO A BOMBA E AQUECEDOR
                                </p>
                            </td>
                        </tr>

                        <tr style="font-size: 10px; font-weight:none;">
                            <td>
                                <p>
                                    NÚM. SERIAIS: 
                                </p>
                            </td>
                            <td>
                                <p>
                                    
                                </p>
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
                    <tr style="font-size: 12px; font-weight:none; ">
                        <th style="text-align: center">APROVAÇÃO</th>
                        <th style="text-align: center">ENTREGA</th>   
                    </tr>
                </thead>
                <tbody>
                        <tr style="font-size: 10px; font-weight:none;">
                            <td>
                                <p>
                                    Autorizo a execução do(s) serviço(s) assim como a aquisição
                                    da(s) mercadoria(s) acima descrito(s). <br>

                                    <p>
                                        DATA: <br>  ____/____/____
                                    </p>
                                 
                                    <p>
                                        {{$os[0]['cliente']['nome']}}: <br>
                                        __________________________________________
                                    </p>
                                   
                                    

                                </p>
                            </td>
                            <td>
                                <p>
                                    Solicitei e recebi o(s) serviço(s) e/ou mercadoria(s) acima descritos e
                                    autorizo, em caso de débito, a emissão de título de cobrança e em caso de
                                    atraso o registro no SPC. Praça de Pagamento.
                                    
                                    <p>
                                        DATA: <br>  ____/____/____
                                    </p>
                                 
                                    <p>
                                        {{$os[0]['cliente']['nome']}}: <br>
                                        __________________________________________
                                    </p>
                                </p>
                            </td>
                        </tr>      
                </tbody>
            </table>

        </div>
    </div>

    </body>
</html>

