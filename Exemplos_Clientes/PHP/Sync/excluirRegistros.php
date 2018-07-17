<?php 
/*
 * Exemplo de XML
 * 
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:hor="http://www.saude.gov.br/horus-ws/schemas/v1/HorusTypes">
   <soapenv:Header/>
   <soapenv:Body>
      <hor:excluirRegistro>
         <produto>
            <coRegistroOrigem>123</coRegistroOrigem>
            <coRegistro>5057</coRegistro>
         </produto>
         <protocolo>
            <nuProtocoloEntrada>17100000023000003112</nuProtocoloEntrada>
            <dtRecebimento>31-10-2017 16:31:20</dtRecebimento>
         </protocolo>
      </hor:excluirRegistro>
   </soapenv:Body>
</soapenv:Envelope>
 */

//Parâmetros de Conexão
$email = "SEU E-MAIL";
$senha = "SUA SENHA";
//Parâmetros do XML
$coRegistroOrigem = '123';
$coRegistro = '5057';
$nuProtocoloEntrada = '17100000023000003112'; 
$dtRecebimento = '31-10-2017 16:31:20';

try{
    $client = new SoapClient('http://horusws.treinamento.saude.gov.br/horus-ws-service/HorusWSService/HorusWS?wsdl',['login'=>$email,'password'=>$senha]);
    
    
    $arguments= ['hor:excluirRegistro' => ['produto'=> ['coRegistroOrigem'=>$coRegistroOrigem, 'coRegistro'=>$coRegistro],
                                           'protocolo'=> ['nuProtocoloEntrada'=>$nuProtocoloEntrada, 'dtRecebimento'=>$dtRecebimento]]];
    
    $protocolo = $client->__soapCall("excluirRegistros", $arguments);
    
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