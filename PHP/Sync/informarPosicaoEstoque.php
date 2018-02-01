<?php 
/*
 * Exemplo de XML
 * 
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:hor="http://www.saude.gov.br/horus-ws/schemas/v1/HorusTypes">
   <soapenv:Header/>
   <soapenv:Body>
      <hor:informarPosicaoEstoque>
         <identificacao>
            <idOrigem>E</idOrigem>
            <coIBGE>23</coIBGE>
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
         </produto>
      </hor:informarPosicaoEstoque>
   </soapenv:Body>
</soapenv:Envelope>
 */

//Parâmetros de Conexão
$email = "SEU E-MAIL";
$email = "SUA SENHA";
//Parâmetros do XML
$idOrigem = 'E';
$coIBGE = '23';
$coCNES = '5717493';
$coTipoEstabelecimento = 'A';
$coRegistroOrigem = '123';
$nuProduto = 'EBR0266630U0118';
$nuLote = '12345';
$dtValidade = '01-01-2020';
$qtProduto = '3';
$dtRegistro = '30-10-2017';
$sgProgramaSaude = 'DST';

try{
    $client = new SoapClient('http://horusws.treinamento.saude.gov.br/horus-ws-service/HorusWSService/HorusWS?wsdl',['login'=>$email,'password'=>$senha]);
    
    $arguments = ['hor:informarPosicaoEstoque' => 
                        ['identificacao' => ['idOrigem' => $idOrigem, 'coIBGE' => $coIBGE],
                              'estabelecimento' => ['coCNES' => $coCNES, 
                                     'coTipoEstabelecimento' => $coTipoEstabelecimento],
                              'produto' => ['coRegistroOrigem' => $coRegistroOrigem, 
                                                   'nuProduto' => $nuProduto,
                                                      'nuLote' => $nuLote, 
                                                  'dtValidade' => $dtValidade, 
                                                   'qtProduto' => $qtProduto, 
                                                  'dtRegistro' => $dtRegistro,
                                             'sgProgramaSaude' => $sgProgramaSaude]]
                        ];
    
    $protocolo = $client->__soapCall("informarPosicaoEstoque", $arguments);
    
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