<?php 
/*
 * Exemplo de XML
 * 
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:hor="http://www.saude.gov.br/horus-ws/schemas/v1/HorusTypes">
   <soapenv:Header/>
   <soapenv:Body>
      <hor:informarAvaliacao>
         <identificacao>
            <idOrigem>E</idOrigem>
            <coIBGE>23</coIBGE>
         </identificacao>
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
         </avaliacao>
      </hor:informarAvaliacao>
   </soapenv:Body>
</soapenv:Envelope>

 */

//Parâmetros de Conexão
$email = "SEU E-MAIL";
$senha = "SUA SENHA";
//Parâmetros do XML
$idOrigem = 'E';
$coIBGE = '23';
$coRegistroOrigem = '123';
$qtLMEavaliadaC1 = '31';
$qtLMEavaliadaC2 = '31';
$qtLMEavaliadaC3 = '31';
$coProcedimento = '0604010010';
$dtAvaliacao = '15-10-2017';
$avAdequacao = 'N';
$coCNES = '5717493';
$coCNS = '700600555663867';

try{
    $client = new SoapClient('http://horusws.treinamento.saude.gov.br/horus-ws-service/HorusWSService/HorusWS?wsdl',['login'=>$email,'password'=>$senha]);
    
    $arguments = ['hor:informarAvaliacaoDeferida' => [
         'identificacao' => ['idOrigem' => $idOrigem, 'coIBGE' => $coIBGE],
            'avaliacao' => [   'coRegistroOrigem' => $coRegistroOrigem,
                                'qtLMEavaliadaC1' => $qtLMEavaliadaC1,
                                'qtLMEavaliadaC2' => $qtLMEavaliadaC2,
                                'qtLMEavaliadaC3' => $qtLMEavaliadaC3,
                                 'coProcedimento' => $coProcedimento,
                                    'dtAvaliacao' => $dtAvaliacao,
                                    'avAdequacao' => $avAdequacao,
                                         'coCNES' => $coCNES,
                                          'coCNS' => $coCNS],
    ]];
    
    $protocolo = $client->__soapCall("informarAvaliacaoDeferida", $arguments);
    
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