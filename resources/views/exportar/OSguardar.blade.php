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
            hr{
                color: rgb(161, 161, 161)
            }
            table th{
                text-align: left;                
            }
        </style>

        <!-- Latest compiled and minified CSS -->
        <!-- Latest compiled and minified JavaScript -->
    </head>
    <body>
        <table class="tabela"> 
            <tbody>
                <tr>
                    <td>
                        <img src="https://gestor.equipcasa.com.br/assets/img/logomarcas/1703079841_7a6c0ad2ca31fefec88e.jpg" width="150" height="150">   
                    </td>
                    <td style="font-size: 14px">
                        <div>
                            <h2>Equip Casa</h2>
                            12.272.914/0001-90 <br>
                            Rua 01, Chacara 38, Lote, 1 - Setor Habitacional Vicente Pires - Brasília - DF<br>
                             E-mail: equipecasadf@gmail.com <br> Fone: (61)99337-4280<br>
                            Responsável: Hugo Gandy
                        </div>  
                    </td>
                    <td>
                        <div>
                            <h4>N° OS: {{$os[0]['id']}}</h4>
                        </div>
                        <div>
                            <h4>Data de emissão: {{ date('d/m/Y', strtotime($os[0]['created_at'])) }}</h6>
                        </div>   
                    </td>
                </tr>
            </tbody>
        </table>
        <hr>
        <table class="tabela" > 
            <thead>
                <tr>
                    <th><h2>Cliente</h2></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="font-size: 14px">
                        <div>
                            <span style="margin-bottom: 15px">{{$os[0]['cliente']['nome']}} </span><br>
                            <span style="margin-bottom: 15px">{{$os[0]['cliente']['CPF/CNPJ']}} </span><br>
                            <span style="margin-bottom: 15px">{{$os[0]['cliente']['localizacao']}} </span><br>
                            <span style="margin-bottom: 15px">E-mail: {{$os[0]['cliente']['email']}} <br> Telefone: {{$os[0]['cliente']['telefone']}} </span><br><br>
                        </div>   
                    </td>
                </tr>
            </tbody>
        </table>
        <hr>
        <table class="tabela" > 
            <tbody style="font-size: 14px">
                <tr>
                    <td>
                        <span style="font-weight: bold">Status OS:</span>  {{$os[0]['status']}}
                    </td>
                    <td>
                        <span style="font-weight: bold">Data inicial:</span>  {{ date('d/m/Y', strtotime($os[0]['data_inicial'])) }}          
                    </td>
                    <td>
                        <span style="font-weight: bold">Data final:</span>  {{ date('d/m/Y', strtotime($os[0]['data_final'])) }}                                                              
                    </td>
                    <td>
                        <span style="font-weight: bold">Garantia:</span>  {{$os[0]['dias_garantia']}} dias                                                     
                    </td>
                </tr>
            </tbody>
        </table>
        <hr>
        <table class="tabela" > 
            <tbody style="font-size: 14px">
                <tr>
                    <td>
                        <span style="font-weight: bold">Descrição/Ficha Técnica/Defeito:</span> {{$os[0]['observacoes']}}
                    </td>
                </tr>
            </tbody>
        </table>
        <hr>
        <br>
        <table class="tabela" border="1" > 
            <thead>
                <tr>
                    <th>Produtos</th>
                    <th>QT</th>
                    <th>V.UN R$</th>
                    <th>V.Total R$</th>
                </tr>
            </thead>
            <tbody style="font-size: 12px">
                @foreach ($produtos as $produto)
                    <tr>
                        <td>{{$produto['produto']['produto']}}</td>
                        <td>{{$produto['quantidade']}}</td>
                        <td>R${{$produto['preco']}}</td>
                        <td>R${{$produto['valorTotal']}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p style="font-weight: bold">Total: R${{$somaProdutosOS}}</p>
        <hr>
        <br>
        <table class="tabela" border="1" > 
            <thead>
                <tr>
                    <th>Serviços</th>
                    <th>QT</th>
                    <th>V.UN R$</th>
                    <th>V.Total R$</th>
                </tr>
            </thead>
            <tbody style="font-size: 12px">
                @foreach ($servicos as $servico)
                    <tr>
                        <td>{{$servico['servico']['nome']}}</td>
                        <td>{{$servico['quantidade']}}</td>
                        <td>R${{$servico['preco']}}</td>
                        <td>R${{$servico['valorTotal']}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p style="font-weight: bold">Total: R${{$somaServicosOS}}</p>
        <hr>
        <div style="float: right">
            <h3>Valor total da OS:  R${{$os[0]['valorTotal']}}</h3>
        </div>
        <br><br><br><br>
        <table class="tabela"> 
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Assinatura do cliente</th>
                    <th>Assinatura do técnico responsável</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <br>
                        <hr style="color: gray">
                    </td>
                    <td>
                        <br>
                        <hr style="color: gray">
                    </td>
                    <td>
                        <br>
                        <hr style="color: gray">
                    </td>
                </tr>
            </tbody>
        </table>
        


    </body>
</html>

