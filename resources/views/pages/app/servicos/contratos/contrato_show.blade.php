<x-layout bodyClass="g-sidenav-show bg-gray-200">

    <x-navbars.sidebar activePage="contrato"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='contrato'></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-300 border-radius-xl mt-4"
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
                {{$contrato}}
                <div class="card card-plain h-100">
                    <div class="card-header pb-0 p-3">
                        <a href="{{route('contrato.index')}}"><button class="btn btn-outline-primary btn-sm mt-3">Listagem de Contratos <i class="fa-solid fa-folder fa-lg" style="font-size: 1.2em"></i> </button></a> 
                        @if (Session::has('success'))
                            <div class="alert alert-success text-white">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-3">Dados do Contrato</h6>
                            </div>
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-body p-3">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Nome da contrato</label>
                                    <input disabled type="text" name="nome" class="form-control border border-2 p-2" value='{{$contrato[0]['nome']}}' placeholder="Nome:">
                                    @error('nome')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                
                                <div class="mb-3 col-md-6">
                                    <label for="categoria" class="form-label">Cliente</label>
                                    <select disabled id="categoria" class="form-select p-2" name="cliente_id">
                                        <option class="" value="{{$contrato[0]['cliente_id']}}">({{$contrato[0]['cliente']['nome']}})</option>
                                    </select>
                                    @error('cliente_id')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Nome do responsável</label>
                                    <input disabled type="text" name="responsável" class="form-control border border-2 p-2" value='{{$contrato[0]['responsável']}}' placeholder="Responsável:">
                                    @error('responsavel')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Método de pagamento</label>
                                    <input disabled type="text" name="metodo_de_pagemento" class="form-control border border-2 p-2" value='{{$contrato[0]['metodo_de_pagemento']}}' placeholder="Responsável:">
                                    @error('responsavel')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Quantidade de parcelas</label>
                                    <input disabled type="number" name="quantidade_parcelas" class="form-control border border-2 p-2" min="1" value='{{$contrato[0]['quantidade_parcelas']}}' placeholder="Parcelas:">
                                    <small>Valor mínimo de 1 parcela(a vista)</small>
                                    @error('responsavel')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Data inicial</label>
                                    <input disabled type="date" name="data_inicio" class="form-control border border-2 p-2" value='{{$contrato[0]['data_inicio']}}'>
                                    @error('data_inicio')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Data final</label>
                                    <input disabled type="date" name="data_fim" class="form-control border border-2 p-2" value='{{$contrato[0]['data_fim']}}'>
                                    @error('data_fim')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="categoria" class="form-label">Status</label>
                                    <select disabled id="categoria" class="form-select p-2" name="status">
                                        <option class="" value="0">Aberto</option>
                                    </select>
                                    <small>O status poderá ser alterado depois</small>
                                    @error('status')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label for="floatingTextarea2">Corpo do contrato</label>
                                    <textarea disabled class="form-control border border-2 p-2"
                                        placeholder="Detalhes do produto"  name="corpo"
                                        rows="4" cols="50">{{ $contrato[0]['corpo']}}</textarea>
                                        @error('observacoes')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                </div>
                            </div>
                    </div>

                    <div>
                        <h3 class="text-center">Contrato</h3>
                        <div class="border " id="p1">
                            <textarea name = "summary-ckeditor" id ="summernote"  cols="30" rows="10" >
                                Pelo presente instrumento particular de um lado <span class="text-bold">{{$contrato[0]['cliente']['nome']}}</span>,
                                brasileira, divorciada, portadora do CPF nº <span class="text-bold">{{$contrato[0]['cliente']['CPF/CNPJ']}}</span>, e inscrita no
                                SSP/DF, nº ##ClienteRG##, domiciliado no <span class="text-bold">{{$contrato[0]['cliente']['logradouro']}}</span>,
                                <span class="text-bold">{{$contrato[0]['cliente']['logradouroNumero']}}</span>, <span class="text-bold">{{$contrato[0]['cliente']['complemento']}}</span>, <span class="text-bold">{{$contrato[0]['cliente']['bairro']}}</span>,
                                <span class="text-bold">{{$contrato[0]['cliente']['cidade']}}</span>, <span class="text-bold">{{$contrato[0]['cliente']['UF']}}</span>, <span class="text-bold">{{$contrato[0]['cliente']['CEP']}}</span>,
                                telefone: <span class="text-bold">{{$contrato[0]['cliente']['telefone']}}</span>, doravante denominada CONTRATANTE e, de
                                outro lado EQUIP CASA LTDA, empresa de direito privado, inscrita no CNPJ/MF
                                sob o nº 12.272.914/0001-90, e no CF/DF nº 07.556.593/001-19, com sede no
                                Setor Habitacional Vicente Pires Colônia Vila São José Rua 08, Chácara 38, lote 01
                                Nº 02 – Taguatinga – DF, representado nesse ato por seu sócio HUGO GANDY
                                OLIVEIRA SOUSA, brasileiro, casado, empresário, telefone: (61) 99337-4280,
                                doravante denominado simplesmente de CONTRATADO, têm entre si, justos e
                                contratados o presente, que se regerá pelas seguintes Cláusulas e Condições:
                                <br><br>
                                <span class="text-bold">CLÁUSULA PRIMEIRA – DO OBJETO</span><br>
                                O CONTRATADO deverá fornecer produtos e serviços para instalação de uma
                                piscina do Aquecimento Solar, casa de máquina, iluminação e automação dos
                                aquecedores para o imóvel situado no domiciliado no <span class="text-bold">{{$contrato[0]['cliente']['logradouro']}}</span>,
                                <span class="text-bold">{{$contrato[0]['cliente']['logradouroNumero']}}</span>, <span class="text-bold">{{$contrato[0]['cliente']['complemento']}}</span>,
                                <span class="text-bold">{{$contrato[0]['cliente']['bairro']}}</span>, <span class="text-bold">{{$contrato[0]['cliente']['cidade']}}</span>,<span class="text-bold">{{$contrato[0]['cliente']['UF']}}</span>, <span class="text-bold">{{$contrato[0]['cliente']['CEP']}}</span>,.
                                <br>
                                <span class="text-bold">Parágrafo Único</span> - O CONTRATADO prestará os serviços constantes da cláusula segunda com qualquer exclusividade, e para desempenhar essas atividades poderá contratar terceiros em geral, desde que não haja conflito de interesses com o pactuado no presente contrato.<br><br><br>
                                <span class="text-bold">CLÁUSULA SEGUNDA – DOS SERVIÇOS</span>
                                Os serviços abaixo mencionados serão prestados pelo CONTRATADO, através de seus funcionários,
                                sem qualquer vinculação com o CONTRATANTE.<br>
                                <span class="text-bold">Parágrafo Primeiro –</span> os serviços a serem prestados são:
                                <ul style="list-style-type: upper-alpha">
                                    <li>Serviço 1</li>
                                    <li>Serviço 2</li>
                                    <li>Serviço 3</li>
                                </ul>
                                <ul>
                                    <li>
                                        OBS: Todos os serviços prestados terão mão de obra qualificada, as garantias dos serviços seguirão de acordo com o código de defesa do consumidor e seguirão as normas vigentes da (ABNT).
                                    </li>
                                </ul>
                                Sendo que o CONTRATANTE está de acordo com as especificações passado pelo CONTRATADO nas descrições deste CONTRATO;
                                <br><br>
                                <p>
                                    <span class="text-bold">Parágrafo segundo – </span>Os pontos de água, esgoto e energia e casa de máquina da piscina deverão estar feitas nas medidas assim passadas pelo CONTRATADO ao CONTRATANTE.
                                    Já a compra de materiais não citados neste, é de inteira responsabilidade do CONTRATANTE, e entregue ao CONTRATADO em até 04 (dois) dias corridos, depois de notificado pelo CONTRATADO.
                                </p>
                                <p>
                                    <span class="text-bold">Parágrafo Terceiro – </span>O CONTRATADO entregará os serviços testados e com locais onde foram executados os seus serviços devidamente limpos, sob pena de ressarcir o CONTRATANTE o valor gasto com a limpeza da obra.
                                </p>
                                <p>
                                    <span class="text-bold">CLÁUSULA TERCEIRA – DOS MATERIAIS</span> 
                                    <p>
                                        Os seguintes materiais serão fornecidos pelo CONTRATADO para as instalações, do aquecimento, instalação do painel de controle e do aquecimento solar:
                                    </p>
                                    <ul>
                                        <li> 03 - Material 01</li>
                                        <li> 16 - Material 02</li>
                                        <li> 04 - Material 03</li>
                                    </ul>
                                    <p>
                                        00 – Fornecimento dos demais Matérias p/ instalação do sistema da piscina, tais como tubo conexões, fios, areia, cimento, adesivos e de inteira responsabilidade do CONTRATANTE.
                                        <p>
                                            OBS: Todos os serviços e produtos não citados neste paragrafo será de inteira responsabilidade do CONTRATADO.
                                        </p>
                                    </p>
                                    <p>
                                        <span class="text-bold">Parágrafo único – </span>O CONTRATADO garante a boa qualidade dos materiais, sendo que os mesmos terão a mesmas garantias dada pelos fabricantes, no caso da mão de obra a garantia será de 1 ano a contar da data de entrega.
                                    </p>
                                </p>
                                <p>
                                    <span class="text-bold">CLÁUSULA QUARTA – PRAZO</span>
                                    <p>
                                        Os serviços ora contratados serão prestados em até 15 (quinze) dias uteis, contados a partir do dia que estiver liberado pelo cliente assim sendo comunicado por WhatsApp para início dos serviços.
                                    </p>
                                    <p>
                                        <span class="text-bold">Paragrafo Primeiro – </span>
                                        <p>Caso haja contratempos com a entrega de material a ser adquirido pela CONTRATANTE, à prorrogação da entrega será obrigatória, sendo acrescentado o valor de 15% ao dia, inclusive sábados, domingos e feriados, até a finalização do serviço.
                                    </p>
                                    <p>
                                        <span class="text-bold">Parágrafo segundo –  </span>
                                        <p>Caso o atraso se dê por culpa exclusiva do CONTRATADO, o mesmo deverá pagar a título de ressarcimento o valor de 15% ao dia a CONTRATANTE.</p>
                                    </p>
                                    <p>
                                        <span class="text-bold">Parágrafo Terceiro – </span>
                                        <p>Caso ocorra atraso por casos fortuitos e força maior, tais como, fenômenos da natureza, decretos governamentais, e demais casos previstos no artigo 625 e incisos do Código Civil Brasileiro, nenhuma das partes responderá pelo atraso.
                                        </p>
                                    </p>
                                    <p>
                                        <span class="text-bold">Parágrafo Quarto –  </span>
                                        <p>Não poderá o CONTRATADO suspender a execução do serviço sem que haja justa causa para tal. Se houver a suspensão da execução da empreitada, sem justa causa, responde o CONTRATADO por perdas e danos.

                                        </p>
                                    </p>
                                </p>
                                <p>
                                    <span class="text-bold">CLÁUSULA QUARTA – REMUNERAÇÃO</span>
                                    <p>Como remuneração pelos serviços a serem prestados, o CONTRATANTE remunerará o CONTRATADO, o valor de R$ {pagamento.valor_total}  ({pagamento.valor_total_extenso}), a ser pago com cartão de credito e divido em 03 ({pagamento.quantidade_parcela}) parcelas iguais.
                                    </p>
                                    <p>
                                        Referente a clausula SEGUNDA NO PARAGRAFO PRIMEIRO.
                                    </p>
                                    <p>
                                        <span class="text-bold">Parágrafo primeiro </span>
                                        <p>
                                            A remuneração pelos serviços contratados inclui todos os encargos trabalhistas, sociais, previdenciários e securitários, gastos e despesas relativos ao exercício dos serviços contratados, por mais especiais que sejam nada mais sendo devido pelo CONTRATANTE ao CONTRATADO, relativos a direitos trabalhistas do pessoal contratado para executar das instalações na obra qualquer título.
                                        </p>
                                    </p>
                                    <p>
                                        <span class="text-bold">Parágrafo segundo </span>
                                        <p>
                                            O presente contrato não implica em qualquer vínculo empregatício do CONTRATADO e seus prepostos, pelos serviços prestados a CONTRATANTE.
                                        </p>
                                    </p>
                                    <p>
                                        <span class="text-bold">Parágrafo terceiro </span>
                                        <p>
                                            O CONTRATADO terá direito a exigir acréscimo no preço, caso sejam introduzidas modificações no serviço contratado ao longo de sua realização ou mesmo que estas sejam acrescidas após a assinatura deste.
                                        </p>
                                    </p>
                                    <p>
                                        <span class="text-bold">Parágrafo quarto </span>
                                        <p>
                                            Mesmo após iniciada o serviço, pode o CONTRATANTE suspender a obra, desde que pague ao CONTRATADO as despesas e lucros relativos aos serviços já feitos, mais indenização razoável, calculada em função do que ele teria ganhado se concluído a obra.
                                        </p>
                                    </p>
                                </p>
                                <p>
                                    <span class="text-bold">CLÁUSULA QUINTA – OBRIGAÇÕES</span>
                                    <p>
                                        São obrigações exclusivas do CONTRATADO
                                    </p>
                                    <p>
                                        A). Executar a obra na forma e modo ajustados, dentro das normas e especificações técnicas aplicáveis à espécie, dando plena e total garantia dos mesmos;
                                    </p>
                                    <p>
                                        B). Fornece toda a mão-de-obra necessária para a boa execução do serviço, devendo registrar todos os trabalhadores em sua empresa, obrigando-se pelos salários dos empregados que o mesmo utilizar na obra, comprometendo-se a respeitar as normas trabalhistas, de segurança do trabalho e previdenciárias vigentes, responsabilizando-se por todas as despesas e prejuízos decorrentes deste serviço;
                                    </p>
                                    <p>
                                        C). A total responsabilidade pelos atos e/ou omissões praticados por seus funcionários, bem como pelos danos de qualquer natureza que os mesmos venham a sofrer ou causar para o CONTRATANTE, e terceiros em geral, em decorrência da prestação dos serviços ora contratados;                                    
                                    </p>
                                    <p>
                                        D). Reparar ou refazer qualquer serviço que for executado em desconformidade com o projeto, instruções e normas respondendo por todas as despesas decorrentes deste serviço, bem como prestar toda a assistência técnica referente ao serviço executado;       
                                    </p>
                                    <p>
                                        2. São obrigações exclusivas do CONTRATANTE:
                                    </p>
                                    <p>
                                        A). Efetuar o pagamento na forma e modo aprazados na Cláusula Quarta.
                                    </p>
                                    <p>
                                        B). Fornecer ao contratado o que for necessário para executar os trabalhos de maneira criteriosa na forma de orientações escritas que serão encaminhadas - colocar à disposição da contratada as necessárias verbas pecuniárias para desenvolver o trabalho – cumprir os acordos e/ou compromissos assumidos junto aos órgãos judiciais, governamentais, instituições bancárias, fornecedores e outros.
                                    </p>
                                </p>
                                <p>
                                    <span class="text-bold">CLÁUSULA SEXTA - DISPOSIÇÕES GERAIS</span>
                                    <p>
                                        A). As alterações de valores que venham a ser discutidos e aprovados pelas partes deverão necessariamente ser objeto de Termo Aditivo.
                                    </p>
                                    <p>
                                        B). Fica expressamente vedada, no todo ou em parte, a transferência ou cessão dos serviços de que trata o presente instrumento.
                                    </p>
                                    <p>
                                        C). É expressamente vedada ao CONTRATADO a utilização de trabalhadores menores, púberes ou impúberes, para a prestação dos serviços.
                                    </p>
                                    <p>
                                        D). Os serviços ora contratados estarão sujeitos à ampla fiscalização do CONTRATANTE ou seu preposto, para vistoriar os trabalhos praticados, podendo fornecer orientações na construção, a qualquer tempo, pedir o afastamento de empregados do contratado que não apresentarem conduta adequada.
                                    </p>
                                    <p>
                                        E) O CONTRATANTE fica ressalvado o direito à ação regressiva em face do contratado e ainda, a retenção da importância devida, em razão da quitação de obrigações trabalhistas dos empregados do CONTRATADO.
                                    </p>
                                    <p>
                                        F). Fica assegurado o direito do CONTRATANTE ao ressarcimento dos danos sofridos em virtude de interpelação judicial em razão de obrigação não cumprida pelo CONTRATADO.
                                    </p>
                                </p>
                                <p>
                                    <span class="text-bold">CLÁUSULA SÉTIMA – RESCISÃO</span>
                                    <p>
                                        Qualquer das partes poderá rescindir unilateralmente, de pleno direito o presente contrato, a qualquer tempo, independente de notificação ou interpelação judicial ou extrajudicial, sem que assista a outra parte qualquer direito a reclamação ou indenização, desde que comunicado por escrito com 3 (três) dias de antecedência, ressalvando o pagamento de serviços já prestados.
                                    </p>
                                    <p>
                                        <span class="text-bold">Parágrafo primeiro - </span>
                                        <p>
                                            O presente contrato também será rescindido de pleno direito nos seguintes casos, sem que assista ao CONTRATADO direito a qualquer tipo de indenização, ressarcimento ou multa, por mais especial que seja:
                                        </p>
                                        <p>
                                            A). Por insolvência, impetração ou solicitação de concordata ou falência do contratado;
                                        </p>
                                        <p>
                                            B) O não cumprimento de qualquer obrigação do CONTRATADO para com o CONTRATANTE, de obrigações originadas no presente instrumento;
                                        </p>
                                        <p>
                                            C) inadimplemento contratual.
                                        </p>
                                    </p>
                                </p>
                                <p>
                                    <span class="text-bold">Parágrafo primeiro - </span>
                                    <p>
                                        O contratado responderá por qualquer prejuízo que direta ou indiretamente cause ao contratante, seja por ação ou omissão, sua ou de seus prepostos.
                                    </p>
                                    <span class="text-bold">Parágrafo único – </span>
                                    <p>
                                        O CONTRATANTE responderá por qualquer prejuízo que direta ou indiretamente cause ao CONTRATADO, desde que devidamente comprovado
                                    </p>
                                </p>
                                <p>
                                    <span class="text-bold">CLÁUSULA NONA – FORO</span>
                                    <p>
                                        Elegem as partes o foro de Taguatinga, Distrito Federal, para nele serem dirimidas todas e quaisquer dúvidas ou questões oriundas do presente contrato, renunciando as partes a qualquer outro, por mais especial e privilegiado que seja.
                                    </p>
                                    <p>
                                        E por estarem assim justos e contratados, assinam o presente em duas (02) vias de igual teor e forma, na presença de duas testemunhas, obrigando-se por si e seus sucessores, para que produzam todos os efeitos de direito.
                                    </p>
                                    <p>
                                        {{ \Carbon\Carbon::now()->format('d/m/Y') }}
                                    </p>
                                </p>
                                
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
    $('#summernote').summernote({
        placeholder: 'Hello Bootstrap 5',
        tabsize: 2,
        height: 1200
    });
    </script>
    <x-footers.auth></x-footers.auth>
    </div>
    <x-plugins></x-plugins>

</x-layout>
