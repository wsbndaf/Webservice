<?php
/*
 * Exemplo de XML
 *
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:hor="http://www.saude.gov.br/horus-ws/schemas/v1/HorusTypes">
   <soapenv:Header/>
   <soapenv:Body>
      <hor:informarAvaliacaoDeferidaEmLote>
         <identificacao>
            <idOrigem>E</idOrigem>
            <coIBGE>23</coIBGE>
         </identificacao>
         <avaliacoes>
            <avaliacao>
               <coRegistroOrigem>123</coRegistroOrigem>
               <qtLMEavaliadaC1>30</qtLMEavaliadaC1>
               <qtLMEavaliadaC2>30</qtLMEavaliadaC2>
               <qtLMEavaliadaC3>30</qtLMEavaliadaC3>
               <coProcedimento>0604010010</coProcedimento>
               <dtAvaliacao>30-10-2017</dtAvaliacao>
               <avAdequacao>N</avAdequacao>
               <coCNES>5717493</coCNES>
               <coCNS>700600555663867</coCNS>
            </avaliacao>
         </avaliacoes>
      </hor:informarAvaliacaoDeferidaEmLote>
   </soapenv:Body>
</soapenv:Envelope>

 */

//Parâmetros de Conexão
$email = "SEU E-MAIL";
$email = "SUA SENHA";
//Parâmetros do XML
$idOrigem = 'E';
$coIBGE = '23';
$coRegistroOrigem = '123';
$qtLMEavaliadaC1 = '30';
$qtLMEavaliadaC2 = '30';
$qtLMEavaliadaC3 = '30';
$coProcedimento = '0604010010';
$dtAvaliacao = '30-10-2017';
$avAdequacao = 'N';
$coCNES = '5717493';
$coCNS = '700600555663867';

try{
    $client = new SoapClient('http://horusws.treinamento.saude.gov.br/horus-ws-service/HorusWSService/HorusWS?wsdl',['login'=>$email,'password'=>$senha]);
    
    $arguments = ['hor:informarAvaliacaoDeferidaEmLote' => [
                            'identificacao' => ['idOrigem' => $idOrigem,'coIBGE' => $coIBGE],
                               'avaliacoes' => ['avaliacao' => [ 'coRegistroOrigem' => $coRegistroOrigem, 
                                                                  'qtLMEavaliadaC1' => $qtLMEavaliadaC1,
                                                                  'qtLMEavaliadaC2' => $qtLMEavaliadaC2,
                                                                  'qtLMEavaliadaC3' => $qtLMEavaliadaC3,
                                                                    'coProcedimento'=> $coProcedimento, 
                                                                       'dtAvaliacao'=> $dtAvaliacao, 
                                                                       'avAdequacao'=> $avAdequacao,
                                                                            'coCNES'=> $coCNES, 
                                                                             'coCNS'=> $coCNS]
                 ]]];
    
    $protocolo = $client->__soapCall("informarAvaliacaoDeferidaEmLote", $arguments);
    
    echo '<pre>';
    var_dump($protocolo);
    echo '</pre>';
    
} catch (SoapFault $e){
    //O erro do Web Service ou mensagem de falha para ser tratado.
    echo '<pre>';
    var_dump($e);
    echo '<pre>';
}
?>