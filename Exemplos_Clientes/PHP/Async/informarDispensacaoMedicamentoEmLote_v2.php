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
      <hor:informarDispensacaoMedicamentoEmLote>
         <identificacao>
            <idOrigem>?</idOrigem>
            <coIBGE>?</coIBGE>
         </identificacao>
         <!--1 or more repetitions:-->
         <registro>
            <estabelecimento>
               <idIdentificacao>?</idIdentificacao>
               <!--Optional:-->
               <coCNES>?</coCNES>
               <!--Optional:-->
               <nuCNPJ>?</nuCNPJ>
            </estabelecimento>
            <produto>
               <!--Optional:-->
               <coRegistroOrigem>?</coRegistroOrigem>
               <nuProduto>?</nuProduto>
               <nuLote>?</nuLote>
               <dtValidade>?</dtValidade>
               <qtProduto>?</qtProduto>
               <dtRegistro>?</dtRegistro>
               <!--Optional:-->
               <sgProgramaSaude>?</sgProgramaSaude>
               <!--Optional:-->
               <coIUM>?</coIUM>
               <!--Optional:-->
               <dtCompetencia>?</dtCompetencia>
            </produto>
            <paciente>
               <nuCNS>?</nuCNS>
               <!--Optional:-->
               <peso>?</peso>
               <!--Optional:-->
               <altura>?</altura>
               <!--Optional:-->
               <cid-10>?</cid-10>
            </paciente>
            <!--Optional:-->
            <prescritor>
               <!--Optional:-->
               <coCNES>?</coCNES>
               <!--Optional:-->
               <nuCRM>?</nuCRM>
               <!--Optional:-->
               <ufCRM>?</ufCRM>
            </prescritor>
         </registro>
      </hor:informarDispensacaoMedicamentoEmLote>
   </soapenv:Body>
</soapenv:Envelope>

 */


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// array associativo de registros                                                                                                                                                                //
// dentro da variável $registros, podem ser inseridos quantos arrays forem necessários, cada conjunto de arrays dentro desta variável, e considerado um registro                                 //
// cada registro é composto por:                                                                                                                                                                 //
// Um array de estabelecimento, um array de produto, um array de paciente e um array de prescritor:                                                                                              //
//                                                                                                                                                                                               //
// Array de Estabelecimento:                                                                                                                                                                     //
// idIdentificacao, coCNES, nuCNPJ                                                                                                                                                               //         
//                                                                                                                                                                                               //
// Array de Produto:                                                                                                                                                                             //
// coRegistroOrigem,nuProduto,nuLote,dtValidade,qtProduto,dtRegistro,sgProgramaSaude,coIUM,dtCompetencia                                                                                         //
//                                                                                                                                                                                               //
// Array de Paciente:                                                                                                                                                                            //
// nuCNS,peso,altura,cid-10                                                                                                                                                                      //
//                                                                                                                                                                                               //
// Array de Prescritor:                                                                                                                                                                          //
// coCNES,nuCRM,ufCRM                                                                                                                                                                            //
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


$registros = [
  [ //exemplo registro 1
    'estabelecimento'         => [                      //obrigatório
       'idIdentificacao'      => 'CNES'                 //obrigatório
      ,'coCNES'               => '5717493'              //opcional
      ,'nuCNPJ'               => ''                     //opcional
    ]
    ,'produto'                => [                      //obrigatório
      'coRegistroOrigem'      => '123'                  //opcional
      ,'nuProduto'            => 'EBR0266630U0118'      //obrigatório
      ,'nuLote'               => '123'                  //obrigatório
      ,'dtValidade'           => '01-01-2020'           //obrigatório
      ,'qtProduto'            => '123'                  //obrigatório
      ,'dtRegistro'           => '30-10-2017'           //obrigatório
      ,'sgProgramaSaude'      => 'DST'                  //opcional
      ,'coIUM'                => '123'                  //opcional
      ,'dtCompetencia'        => '10-2017'              //opcional
    ]
    ,'paciente'               => [                      //obrigatório
       'nuCNS'                => '700600555663867'      //obrigatório
      ,'peso'                 => '70.10'                //opcional
      ,'altura'               => '175'                  //opcional
      ,'cid-10'               => 'F20.0'                //opcional
    ]
    ,'prescritor'             => [                      //obrigatório
       'coCNES'               => '5717493'              //opcional
      ,'nuCRM'                => '1234'                 //opcional
      ,'ufCRM'                => 'DF'                   //opcional
    ]
  ],
  [ //exemplo registro 2
    'estabelecimento'         => [                      //obrigatório
       'idIdentificacao'      => 'CNES'                 //obrigatório
      ,'coCNES'               => ''                     //opcional
      ,'nuCNPJ'               => ''                     //opcional
    ]
    ,'produto'                => [                      //obrigatório
      'coRegistroOrigem'      => ''                     //opcional
      ,'nuProduto'            => 'EBR0266630U0118'      //obrigatório
      ,'nuLote'               => '123'                  //obrigatório
      ,'dtValidade'           => '01-01-2020'           //obrigatório
      ,'qtProduto'            => '123'                  //obrigatório
      ,'dtRegistro'           => '30-10-2017'           //obrigatório
      ,'sgProgramaSaude'      => ''                     //opcional
      ,'coIUM'                => ''                     //opcional
      ,'dtCompetencia'        => ''                     //opcional
    ]
    ,'paciente'               => [                      //obrigatório
       'nuCNS'                => '700600555663867'      //obrigatório
      ,'peso'                 => ''                     //opcional
      ,'altura'               => ''                     //opcional
      ,'cid-10'               => ''                     //opcional
    ]
    ,'prescritor'             => [                      //obrigatório
       'coCNES'               => ''                     //opcional
      ,'nuCRM'                => ''                     //opcional
      ,'ufCRM'                => ''                     //opcional
    ]
  ],
  [ //exemplo registro 3
    'estabelecimento'         => [                      //obrigatório
       'idIdentificacao'      => 'CNES'                 //obrigatório
    ]
    ,'produto'                => [                      //obrigatório
       'nuProduto'            => 'EBR0266630U0118'      //obrigatório
      ,'nuLote'               => '123'                  //obrigatório
      ,'dtValidade'           => '01-01-2020'           //obrigatório
      ,'qtProduto'            => '123'                  //obrigatório
      ,'dtRegistro'           => '30-10-2017'           //obrigatório
    ]
    ,'paciente'               => [                      //obrigatório
       'nuCNS'                => '700600555663867'      //obrigatório
    ]
    ,'prescritor'             => [                      //obrigatório
    ]
  ]
];

try{

  // link do webservice com as credenciais para acesso
  $client = new SoapClient(AMBIENTE,['login'=>EMAIL,'password'=>SENHA]);

  // remove campos opcionais
  removeOptional($registros);

  // Array de argumentos da requisição, ou "Body" do XML
  $arguments = [
      'hor:informarDispensacaoMedicamentoEmLote' => [
        'identificacao' => ['idOrigem' => IDORIGEM,'coIBGE' => COIBGE]
        ,'registro' => $registros
      ]
  ];

  //envio da requisição
  $protocolo = $client->__soapCall("informarDispensacaoMedicamentoEmLote", $arguments);

  // resposta da requisição
  ver($protocolo);

} catch (SoapFault $e){
  //O erro do Web Service ou mensagem de falha para ser tratado.
  ver($e);
}

?>