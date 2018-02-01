<?php 
/*
 * Exemplo de XML
 * 
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:hor="http://www.saude.gov.br/horus-ws/schemas/v1/HorusTypes">
   <soapenv:Header/>
   <soapenv:Body>
      <hor:protocolo>
         <nuProtocoloEntrada>17100000023000003132</nuProtocoloEntrada>
         <dtRecebimento>31-10-2017 15:34:12</dtRecebimento>
      </hor:protocolo>
   </soapenv:Body>
</soapenv:Envelope>

 */

//Parâmetros de Conexão
$email = "SEU E-MAIL";
$email = "SUA SENHA";
//Parâmetros do XML
$nuProtocoloEntrada = '17100000023000003132';
$dtRecebimento = '31-10-2017 15:34:12';

try{
    $client = new SoapClient('http://horusws.treinamento.saude.gov.br/horus-ws-service/HorusWSService/HorusWS?wsdl',['login'=>$email,'password'=>$senha]);
    
    $arguments= ['hor:protocolo' => ['nuProtocoloEntrada' => $nuProtocoloEntrada,
                                          'dtRecebimento' => $dtRecebimento]];
    
    $protocolo = $client->__soapCall("consultarResultadoProcessamento", $arguments);
    
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