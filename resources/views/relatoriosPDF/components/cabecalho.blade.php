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
                    
                        <td style="width: 40%;">
                           <h5 style="text-align: center">{{$titulo}}</h5>
                        @php
                            $dataAtual = now();
                            $dataFormatada = $dataAtual->format('d/m/Y');
                        @endphp
                           <p style="font-size:12px; font-weight:bold; ">EMISSÃO: {{ $dataFormatada }}
                    </tr>
       
            </tbody>
        </table>
    </div>
</div>