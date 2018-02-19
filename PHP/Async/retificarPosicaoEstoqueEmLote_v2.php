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
      <hor:retificarPosicaoEstoqueEmLote>
         <identificacao>
            <idOrigem>E</idOrigem>
            <coIBGE>23</coIBGE>
            <nuProtocoloEntrada>17110000023000003228</nuProtocoloEntrada>
         </identificacao>
         <!--1 or more repetitions:-->
         <registro>
            <estabelecimento>
               <coCNES>5717493</coCNES>
               <coTipoEstabelecimento>A</coTipoEstabelecimento>
            </estabelecimento>
            <produto>
               <coRegistroOrigem>123</coRegistroOrigem>
               <nuProduto>EBR0266630U0118</nuProduto>
               <nuLote>1234</nuLote>
               <dtValidade>11-10-2020</dtValidade>
               <qtProduto>132</qtProduto>
               <dtRegistro>30-11-2017</dtRegistro>
               <sgProgramaSaude>DST</sgProgramaSaude>
               <coRegistro>90580</coRegistro>
            </produto>
         </registro>
      </hor:retificarPosicaoEstoqueEmLote>
   </soapenv:Body>
</soapenv:Envelope>
 */

$nuProtocoloEntrada = '17110000023000003228';               //obrigatório


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// array associativo de registros                                                                                                                                //
// dentro da variável $registros, podem ser inseridos quantos arrays forem necessários, cada conjunto de arrays dentro desta variável, e considerado um registro //
// cada registro é composto por:                                                                                                                                 //
// Um array de estabelecimento e um array de produto:                                                                                                            //
//                                                                                                                                                               //
// Array de Estabelecimento:                                                                                                                                     //
// coCNES, coTipoEstabelecimento                                                                                                                                 //
//                                                                                                                                                               //
// Array de Produto:                                                                                                                                             //
// coRegistroOrigem,nuProduto,nuLote,dtValidade,qtProduto,dtRegistro,sgProgramaSaude,coIUM,coRegistro                                                            //
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$registros = [
  [ //exemplo registro 1
     'estabelecimento'          => [                        //obrigatório
       'coCNES'                 => '5717493'                //opcional
      ,'coTipoEstabelecimento'  => 'A'                      //opcional
    ]
    ,'produto'                  => [                        //obrigatório
       'coRegistroOrigem'       => '123'                    //opcional
      ,'nuProduto'              => 'EBR0266630U0118'        //obrigatório
      ,'nuLote'                 => '123'                    //obrigatório
      ,'dtValidade'             => '01-01-2020'             //obrigatório
      ,'qtProduto'              => '123'                    //obrigatório
      ,'dtRegistro'             => '30-10-2017'             //obrigatório
      ,'sgProgramaSaude'        => 'DST'                    //opcional
      ,'coIUM'                  => '123'                    //opcional
      ,'coRegistro'             => '90580'                  //obrigatório
    ]
  ],
  [ // exemplo registro 2
     'estabelecimento'          => [                        //obrigatório
       'coCNES'                 => ''                       //opcional
      ,'coTipoEstabelecimento'  => ''                       //opcional
    ]
    ,'produto'                  => [                        //obrigatório
       'coRegistroOrigem'       => ''                       //opcional
      ,'nuProduto'              => 'EBR0266630U0118'        //obrigatório
      ,'nuLote'                 => '123'                    //obrigatório
      ,'dtValidade'             => '01-01-2020'             //obrigatório
      ,'qtProduto'              => '123'                    //obrigatório
      ,'dtRegistro'             => '30-10-2017'             //obrigatório
      ,'sgProgramaSaude'        => ''                       //opcional
      ,'coIUM'                  => ''                       //opcional
      ,'coRegistro'             => '90580'                  //obrigatório
    ]
  ],
  [ // exemplo registro 3
     'estabelecimento'          => [                        //obrigatório
    ]
    ,'produto'                  => [                        //obrigatório
       'nuProduto'              => 'EBR0266630U0118'        //obrigatório
      ,'nuLote'                 => '123'                    //obrigatório
      ,'dtValidade'             => '01-01-2020'             //obrigatório
      ,'qtProduto'              => '123'                    //obrigatório
      ,'dtRegistro'             => '30-10-2017'             //obrigatório
      ,'coRegistro'             => '90580'                  //obrigatório
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
    'hor:retificarPosicaoEstoqueEmLote' => [
      'identificacao' => ['idOrigem' => IDORIGEM,'coIBGE' => COIBGE,'nuProtocoloEntrada' => $nuProtocoloEntrada]
      ,'registro' => $registros
    ]
  ];

  //envio da requisição
  $protocolo = $client->__soapCall("retificarPosicaoEstoqueEmLote", $arguments);

  // resposta da requisição
  ver($protocolo);

} catch (SoapFault $e){
  //O erro do Web Service ou mensagem de falha para ser tratado.
  ver($e);
}

?>