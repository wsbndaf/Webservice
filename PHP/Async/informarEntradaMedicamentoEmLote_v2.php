<?php
/*
 * Exemplo de XML
 *
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:hor="http://www.saude.gov.br/horus-ws/schemas/v1/HorusTypes">
   <soapenv:Header/>
   <soapenv:Body>
      <hor:informarEntradaMedicamentoEmLote>
         <identificacao>
            <idOrigem>E</idOrigem>
            <coIBGE>23</coIBGE>
         </identificacao>
         <registro>
            <estabelecimento>
               <coCNES>5717493</coCNES>
               <coTipoEstabelecimento>A</coTipoEstabelecimento>
            </estabelecimento>
            <produto>
               <coRegistroOrigem>123</coRegistroOrigem>
               <nuProduto>EBR0266630U0118</nuProduto>
               <nuLote>123</nuLote>
               <dtValidade>01-01-2020</dtValidade>
               <qtProduto>123</qtProduto>
               <dtRegistro>30-10-2017</dtRegistro>
               <sgProgramaSaude>DST</sgProgramaSaude>
               <nuCNPJFabricante>00530493000171</nuCNPJFabricante>
               <nuNotaFiscal>1324</nuNotaFiscal>
               <nuValorUnitario>1234.1234</nuValorUnitario>
               <nuCNPJDistribuidor>00530493000171</nuCNPJDistribuidor>
               <tpEntradaEstoque>E-O</tpEntradaEstoque>
            </produto>
         </registro>
      </hor:informarEntradaMedicamentoEmLote>
   </soapenv:Body>
</soapenv:Envelope>
 */


//Parâmetros de Conexão
$email = "SEU E-MAIL"; //obrigatório
$senha = "SUA SENHA";  //obrigatório

//Parâmetros do XML
$idOrigem = 'E';       //obrigatório
$coIBGE = '35';       //obrigatório


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// array associativo de registros                                                                                                                                                                //
// dentro da variável $registros, podem ser inseridos quantos arrays forem necessários, cada conjunto de arrays dentro desta variável, e considerado um registro                                 //
// cada registro é composto por:                                                                                                                                                                 //
// coCNES, coTipoEstabelecimento e um array de produto que contém:                                                                                                                               //
// coRegistroOrigem,nuProduto,nuLote,dtValidade,qtProduto,dtRegistro,sgProgramaSaude,nuCNPJFabricante,noFabricanteInternacional,nuNotaFiscal,nuValorUnitario,nuCNPJDistribuidor,tpEntradaEstoque //
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$registros = [
  [ //exemplo registro 1
    'coCNES' => '5717493'                             //opcional
    ,'coTipoEstabelecimento' => 'A'                   //opcional
    ,'produto' => [                                   //obrigatório
      'coRegistroOrigem' => '123'                     //opcional
      ,'nuProduto' => 'EBR0266630U0118'               //obrigatório
      ,'nuLote' => '123'                              //obrigatório
      ,'dtValidade' => '01-01-2020'                   //obrigatório
      ,'qtProduto' => '123'                           //obrigatório
      ,'dtRegistro' => '30-10-2017'                   //obrigatório
      ,'sgProgramaSaude' => 'DST'                     //opcional
      ,'coIUM' => '123'                               //opcional
      ,'nuCNPJFabricante' => '00530493000171'         //opcional
      ,'noFabricanteInternacional' => 'FABRICANTE'    //opcional
      ,'nuNotaFiscal' => '1324'                       //obrigatório
      ,'nuValorUnitario' => '1234.1234'               //obrigatório
      ,'nuCNPJDistribuidor' => '00530493000171'       //obrigatório
      ,'tpEntradaEstoque' => 'E-O'                    //obrigatório
    ]
  ],
  [ // exemplo registro 2
    'coCNES' => ''                                    //opcional
    ,'coTipoEstabelecimento' => ''                    //opcional
    ,'produto' => [                                   //obrigatório
      'coRegistroOrigem' => ''                        //opcional
      ,'nuProduto' => 'EBR0266630U0118'               //obrigatório
      ,'nuLote' => '123'                              //obrigatório
      ,'dtValidade' => '01-01-2020'                   //obrigatório
      ,'qtProduto' => '123'                           //obrigatório
      ,'dtRegistro' => '30-10-2017'                   //obrigatório
      ,'sgProgramaSaude' => ''                        //opcional
      ,'coIUM' => ''                                  //opcional
      ,'nuCNPJFabricante' => ''                       //opcional
      ,'noFabricanteInternacional' => ''              //opcional
      ,'nuNotaFiscal' => '1324'                       //obrigatório
      ,'nuValorUnitario' => '1234.1234'               //obrigatório
      ,'nuCNPJDistribuidor' => '00530493000171'       //obrigatório
      ,'tpEntradaEstoque' => 'E-O'                    //obrigatório
    ]
  ]
];


try{

  // link do webservice com as credenciais para acesso
  $client = new SoapClient('http://horusws.treinamento.saude.gov.br/horus-ws-service/HorusWSService/HorusWS?wsdl',['login'=>$email,'password'=>$senha]);

  // identificação do estado/municipio
  $arguments = ['hor:informarEntradaMedicamentoEmLote' =>['identificacao' => ['idOrigem' => $idOrigem,'coIBGE' => $coIBGE]]];

  // inserção de cada registro cadastrado:
  // inserção do estabelecimento
  foreach ($registros as $registro) {
    // tratamento para coCNES em branco
    if ($registro['coCNES']) {
      $arguments['hor:informarEntradaMedicamentoEmLote']['registro']['estabelecimento']['coCNES'] = $registro['coCNES'];
    }
    // tratamento para coTipoEstabelecimento em branco
    if ($registro['coTipoEstabelecimento']) {
      $arguments['hor:informarEntradaMedicamentoEmLote']['registro']['estabelecimento']['coTipoEstabelecimento'] = $registro['coTipoEstabelecimento'];
    }

    // inserção dos produtos de cada registro
    foreach ($registro['produto'] as $key => $value) {
      // tratamento para campos opcionais em branco
      if ($value) {
        $arguments['hor:informarEntradaMedicamentoEmLote']['registro']['produto'][$key] = $value;
      } else {
        continue;
      }
    };          
  };

  //envio da requisição
  $protocolo = $client->__soapCall("informarEntradaMedicamentoEmLote", $arguments);

  // resposta da requisição
  echo '<pre>';
  var_dump($protocolo);
  echo '</pre>';

} catch (SoapFault $e){
  //O erro do Web Service ou mensagem de falha para ser tratado.
  echo '<pre>';
  var_dump($e);
  echo '<pre>';
}