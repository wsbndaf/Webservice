<?php 
/*
 * Exemplo de XML
 * 
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:hor="http://www.saude.gov.br/horus-ws/schemas/v1/HorusTypes">
   <soapenv:Header/>
   <soapenv:Body>
      <hor:retificarPosicaoEstoque>
         <identificacao>
            <idOrigem>E</idOrigem>
            <coIBGE>23</coIBGE>
            <nuProtocoloEntrada>17110000023000003228</nuProtocoloEntrada>
         </identificacao>
         <estabelecimento>
            <coCNES>5717493</coCNES>
            <coTipoEstabelecimento>A</coTipoEstabelecimento>
         </estabelecimento>
         <produto>
            <coRegistroOrigem>134</coRegistroOrigem>
            <nuProduto>EBR0266630U0118</nuProduto>
            <nuLote>132</nuLote>
            <dtValidade>30-10-2020</dtValidade>
            <qtProduto>123</qtProduto>
            <dtRegistro>31-10-2017</dtRegistro>
            <sgProgramaSaude>DST</sgProgramaSaude>
            <coRegistro>32589</coRegistro>
         </produto>
      </hor:retificarPosicaoEstoque>
   </soapenv:Body>
</soapenv:Envelope>
 */

//Parâmetros de Conexão
$email = "SEU E-MAIL";
$senha = "SUA SENHA";
//Parâmetros do XML
$idOrigem = 'E';
$coIBGE = '23';
$nuProtocoloEntrada = '17110000023000003228';
$coCNES = '5717493';
$coTipoEstabelecimento = 'A';
$coRegistroOrigem = '123';
$nuProduto = 'EBR0266630U0118';
$nuLote = '12345';
$dtValidade = '01-01-2020';
$qtProduto = '3';
$dtRegistro = '30-10-2017';
$sgProgramaSaude = 'DST';
$coRegistro = '32589';

try{
    $client = new SoapClient('http://horusws.treinamento.saude.gov.br/horus-ws-service/HorusWSService/HorusWS?wsdl',['login'=>$email,'password'=>$senha]);
    
    $arguments = ['hor:retificarPosicaoEstoque' =>[
                    'identificacao' => ['idOrigem' => $idOrigem, 'coIBGE' => $coIBGE,'nuProtocoloEntrada' => $nuProtocoloEntrada],
                  'estabelecimento' => ['coCNES' => $coCNES, 'coTipoEstabelecimento' => $coTipoEstabelecimento],
                          'produto' => ['coRegistroOrigem' => $coRegistroOrigem,
                                               'nuProduto' => $nuProduto,
                                                  'nuLote' => $nuLote,
                                              'dtValidade' => $dtValidade,
                                               'qtProduto' => $qtProduto,
                                              'dtRegistro' => $dtRegistro,
                                         'sgProgramaSaude' => $sgProgramaSaude,
                                              'coRegistro' => $coRegistro]
                ]];
    
    $protocolo = $client->__soapCall("retificarPosicaoEstoque", $arguments);
    
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