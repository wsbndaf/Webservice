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
      <hor:informarAvaliacaoDeferidaEmLote>
         <identificacao>
            <idOrigem>?</idOrigem>
            <coIBGE>?</coIBGE>
         </identificacao>
         <avaliacoes>
            <!--1 or more repetitions:-->
            <avaliacao>
               <!--Optional:-->
               <coRegistroOrigem>?</coRegistroOrigem>
               <qtLMEavaliadaC1>?</qtLMEavaliadaC1>
               <!--Optional:-->
               <qtLMEavaliadaC2>?</qtLMEavaliadaC2>
               <!--Optional:-->
               <qtLMEavaliadaC3>?</qtLMEavaliadaC3>
               <coProcedimento>?</coProcedimento>
               <dtAvaliacao>?</dtAvaliacao>
               <avAdequacao>?</avAdequacao>
               <coCNES>?</coCNES>
               <coCNS>?</coCNS>
            </avaliacao>
         </avaliacoes>
      </hor:informarAvaliacaoDeferidaEmLote>
   </soapenv:Body>
</soapenv:Envelope>

 */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Array associativo de avaliações                                                                                                                                  //
// dentro da variável $avaliacoes, podem ser inseridos quantos arrays forem necessários, cada conjunto de arrays dentro desta variável, e considerado uma avaliação //
// cada avaliação é composta por:                                                                                                                                   //
// coRegistroOrigem,qtLMEavaliadaC1,qtLMEavaliadaC2,qtLMEavaliadaC3,coProcedimento,dtAvaliacao,avAdequacao,coCNES,coCNS                                             //
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


$avaliacoes = [
  [ //exemplo registro 1
     'coRegistroOrigem'  => '123'                  //obrigatório
    ,'qtLMEavaliadaC1'   => '30'                   //obrigatório
    ,'qtLMEavaliadaC2'   => '30'                   //opcional
    ,'qtLMEavaliadaC3'   => '30'                   //opcional
    ,'coProcedimento'    => '0604010010'           //obrigatório
    ,'dtAvaliacao'       => '30-10-2018'           //obrigatório
    ,'avAdequacao'       => 'N'                    //obrigatório
    ,'coCNES'            => '5717493'              //obrigatório
    ,'coCNS'             => '700600555663867'      //obrigatório
  ]
 ,[ //exemplo registro 2
     'coRegistroOrigem'  => '321'                  //obrigatório
    ,'qtLMEavaliadaC1'   => '30'                   //obrigatório
    ,'qtLMEavaliadaC2'   => ''                     //opcional
    ,'qtLMEavaliadaC3'   => ''                     //opcional
    ,'coProcedimento'    => '0604010010'           //obrigatório
    ,'dtAvaliacao'       => '30-10-2018'           //obrigatório
    ,'avAdequacao'       => 'N'                    //obrigatório
    ,'coCNES'            => '5717493'              //obrigatório
    ,'coCNS'             => '700600555663867'      //obrigatório
  ]
 ,[ //exemplo registro 3
     'coRegistroOrigem'  => '231'                  //obrigatório
    ,'qtLMEavaliadaC1'   => '30'                   //obrigatório
    ,'coProcedimento'    => '0604010010'           //obrigatório
    ,'dtAvaliacao'       => '30-10-2018'           //obrigatório
    ,'avAdequacao'       => 'N'                    //obrigatório
    ,'coCNES'            => '5717493'              //obrigatório
    ,'coCNS'             => '700600555663867'      //obrigatório
  ]
];

try{
  
  // link do webservice com as credenciais para acesso
  $client = new SoapClient(AMBIENTE,['login'=>EMAIL,'password'=>SENHA]);

  // remove campos opcionais
  removeOptional($registros);

  // Array de argumentos da requisição, ou "Body" do XML
  $arguments = [
    'hor:informarAvaliacaoDeferidaEmLote' => [
      'identificacao' => ['idOrigem' => IDORIGEM,'coIBGE' => COIBGE]
      ,'avaliacoes' => $avaliacoes
    ]
  ];

  //envio da requisição
  $protocolo = $client->__soapCall("informarAvaliacaoDeferidaEmLote", $arguments);

  // resposta da requisição
  ver($protocolo);

} catch (SoapFault $e){
  //O erro do Web Service ou mensagem de falha para ser tratado.
  ver($e);
}


?> 