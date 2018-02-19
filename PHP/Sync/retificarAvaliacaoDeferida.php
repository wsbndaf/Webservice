<?php 
/*
 * Exemplo de XML
 * 
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:hor="http://www.saude.gov.br/horus-ws/schemas/v1/HorusTypes">
   <soapenv:Header/>
   <soapenv:Body>
      <hor:retificarAvaliacao>
         <identificacao>
            <idOrigem>E</idOrigem>
            <coIBGE>23</coIBGE>
            <nuProtocoloEntrada>17100000023000003135</nuProtocoloEntrada>
         </identificacao>
         <avaliacao>
            <coRegistroOrigem>123</coRegistroOrigem>
            <qtLMEavaliadaC1>30</qtLMEavaliadaC1>
            <qtLMEavaliadaC2>31</qtLMEavaliadaC2>
            <qtLMEavaliadaC3>31</qtLMEavaliadaC3>
            <coProcedimento>0604010010</coProcedimento>
            <dtAvaliacao>15-10-2017</dtAvaliacao>
            <avAdequacao>N</avAdequacao>
            <coCNES>5717493</coCNES>
            <coCNS>700600555663867</coCNS>
            <coRegistro>5086</coRegistro>
         </avaliacao>
      </hor:retificarAvaliacao>
   </soapenv:Body>
</soapenv:Envelope>

 */

//Parâmetros de Conexão
$email = "SEU E-MAIL";
$email = "SUA SENHA";
//Parâmetros do XML
$idOrigem = 'E';
$coIBGE = '23';
$nuProtocoloEntrada = '17100000023000003135';
$coRegistroOrigem = '123';
$qtLMEavaliadaC1 = '30';
$qtLMEavaliadaC2 = '31';
$qtLMEavaliadaC3 = '31';
$coProcedimento = '0604010010';
$dtAvaliacao = '15-10-2017';
$avAdequacao = 'N';
$coCNES = '5717493';
$coCNS = '700600555663867';
$coRegistro = '5086';

try{
    $client = new SoapClient('http://horusws.treinamento.saude.gov.br/horus-ws-service/HorusWSService/HorusWS?wsdl',['login'=>$email,'password'=>$senha]);
    
    $arguments = ['hor:retificarAvaliacaoDeferida' => [
        'identificacao' => ['idOrigem' => $idOrigem, 'coIBGE' => $coIBGE, 'nuProtocoloEntrada' => $nuProtocoloEntrada],
            'avaliacao' => ['coRegistroOrigem' => $coRegistroOrigem,
                             'qtLMEavaliadaC1' => $qtLMEavaliadaC1,
                             'qtLMEavaliadaC2' => $qtLMEavaliadaC2,
                             'qtLMEavaliadaC3' => $qtLMEavaliadaC3,
                              'coProcedimento' => $coProcedimento,
                                 'dtAvaliacao' => $dtAvaliacao,
                                 'avAdequacao' => $avAdequacao,
                                      'coCNES' => $coCNES,
                                       'coCNS' => $coCNS,
                                  'coRegistro' => $coRegistro],
        ]];
    
    $protocolo = $client->__soapCall("retificarAvaliacaoDeferida", $arguments);
    
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