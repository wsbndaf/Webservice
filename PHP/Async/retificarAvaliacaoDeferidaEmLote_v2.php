<?php

//////////////////////////////////////////////////////////////////////
// O Arquivo 'functions' possui funções comuns à todos os arquivos, //
// assim como variáveis de conexão e identificação                  //
//////////////////////////////////////////////////////////////////////
include_once '../Common/functions.php';

/*
 * Exemplo de XML
 *
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:hor="http://www.saude.gov.br/horus-ws/schemas/v1/HorusTypes">
   <soapenv:Header/>
   <soapenv:Body>
      <hor:retificarAvaliacaoDeferidaEmLote>
         <identificacao>
            <idOrigem>E</idOrigem>
            <coIBGE>23</coIBGE>
            <nuProtocoloEntrada>17100000023000003132</nuProtocoloEntrada>
         </identificacao>
         <avaliacoes>
            <avaliacao>
               <coRegistroOrigem>123</coRegistroOrigem>
               <qtLMEavaliadaC1>31</qtLMEavaliadaC1>
               <qtLMEavaliadaC2>31</qtLMEavaliadaC2>
               <qtLMEavaliadaC3>31</qtLMEavaliadaC3>
               <coProcedimento>0604010010</coProcedimento>
               <dtAvaliacao>15-10-2017</dtAvaliacao>
               <avAdequacao>N</avAdequacao>
               <coCNES>5717493</coCNES>
               <coCNS>700600555663867</coCNS>
               <coRegistro>5083</coRegistro>
            </avaliacao>
         </avaliacoes>
      </hor:retificarAvaliacaoDeferidaEmLote>
   </soapenv:Body>
</soapenv:Envelope>
 */


$nuProtocoloEntrada = '17100000023000003132';      //obrigatório


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Array associativo de avaliações                                                                                                                                  //
// dentro da variável $avaliacoes, podem ser inseridos quantos arrays forem necessários, cada conjunto de arrays dentro desta variável, e considerado uma avaliação //
// cada avaliação é composta por:                                                                                                                                   //
// coRegistroOrigem,qtLMEavaliadaC1,qtLMEavaliadaC2,qtLMEavaliadaC3,coProcedimento,dtAvaliacao,avAdequacao,coCNES,coCNS,coRegistro                                  //
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$avaliacoes = [
  [ //exemplo registro 1
     'coRegistroOrigem'  => '123'                  //opcional
    ,'qtLMEavaliadaC1'   => '31'                   //obrigatório
    ,'qtLMEavaliadaC2'   => '31'                   //opcional
    ,'qtLMEavaliadaC3'   => '31'                   //opcional
    ,'coProcedimento'    => '0604010010'           //obrigatório
    ,'dtAvaliacao'       => '15-10-2017'           //obrigatório
    ,'avAdequacao'       => 'N'                    //obrigatório
    ,'coCNES'            => '5717493'              //obrigatório
    ,'coCNS'             => '700600555663867'      //obrigatório
    ,'coRegistro'        => '5083'                 //obrigatório
  ]
 ,[ //exemplo registro 2
     'coRegistroOrigem'  => ''                     //opcional
    ,'qtLMEavaliadaC1'   => '31'                   //obrigatório
    ,'qtLMEavaliadaC2'   => ''                     //opcional
    ,'qtLMEavaliadaC3'   => ''                     //opcional
    ,'coProcedimento'    => '0604010010'           //obrigatório
    ,'dtAvaliacao'       => '15-10-2017'           //obrigatório
    ,'avAdequacao'       => 'N'                    //obrigatório
    ,'coCNES'            => '5717493'              //obrigatório
    ,'coCNS'             => '700600555663867'      //obrigatório
    ,'coRegistro'        => '5083'                 //obrigatório
  ]
 ,[ //exemplo registro 3
     'qtLMEavaliadaC1'   => '31'                   //obrigatório
    ,'coProcedimento'    => '0604010010'           //obrigatório
    ,'dtAvaliacao'       => '15-10-2017'           //obrigatório
    ,'avAdequacao'       => 'N'                    //obrigatório
    ,'coCNES'            => '5717493'              //obrigatório
    ,'coCNS'             => '700600555663867'      //obrigatório
    ,'coRegistro'        => '5083'                 //obrigatório
  ]
];

try{

  // link do webservice com as credenciais para acesso
  $client = new SoapClient(AMBIENTE,['login'=>EMAIL,'password'=>SENHA]);

  // remove campos opcionais
  removeOptional($registros);

  // Array de argumentos da requisição, ou "Body" do XML
  $arguments = [
    'hor:retificarAvaliacaoDeferidaEmLote' => [
      'identificacao' => ['idOrigem' => IDORIGEM,'coIBGE' => COIBGE,'nuProtocoloEntrada' => $nuProtocoloEntrada]
      ,'avaliacoes' => $avaliacoes
    ]
  ];

  //envio da requisição
  $protocolo = $client->__soapCall("retificarAvaliacaoDeferidaEmLote", $arguments);

  // resposta da requisição
  ver($protocolo);

} catch (SoapFault $e){
  //O erro do Web Service ou mensagem de falha para ser tratado.
  ver($e);
}

?>