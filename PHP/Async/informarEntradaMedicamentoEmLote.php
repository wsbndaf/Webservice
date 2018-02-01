<?php
/*
 * Exemplo de XML
 *
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:hor="http://www.saude.gov.br/horus-ws/schemas/v1/HorusTypes">
   <soapenv:Header/>
   <soapenv:Body>
      <hor:informarEntradaMedicamentoEmLote>
         <identificacao>
            <idOrigem>E</idOrigem>
            <coIBGE>23</coIBGE>
         </identificacao>
         <registro>
            <estabelecimento>
               <coCNES>5717493</coCNES>
               <coTipoEstabelecimento>A</coTipoEstabelecimento>
            </estabelecimento>
            <produto>
               <coRegistroOrigem>123</coRegistroOrigem>
               <nuProduto>EBR0266630U0118</nuProduto>
               <nuLote>123</nuLote>
               <dtValidade>01-01-2020</dtValidade>
               <qtProduto>123</qtProduto>
               <dtRegistro>30-10-2017</dtRegistro>
               <sgProgramaSaude>DST</sgProgramaSaude>
               <nuCNPJFabricante>00530493000171</nuCNPJFabricante>
               <nuNotaFiscal>1324</nuNotaFiscal>
               <nuValorUnitario>1234.1234</nuValorUnitario>
               <nuCNPJDistribuidor>00530493000171</nuCNPJDistribuidor>
               <tpEntradaEstoque>E-O</tpEntradaEstoque>
            </produto>
         </registro>
      </hor:informarEntradaMedicamentoEmLote>
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
$nuLote = '123';
$dtValidade = '01-01-2020';
$qtProduto = '123';
$dtRegistro = '30-10-2017';
$sgProgramaSaude = 'DST';
$nuCNPJFabricante = '00530493000171'; 
$noFabricanteInternacional = 'FABRICANTE';
$nuNotaFiscal = '1324';
$nuValorUnitario = '1234.1234';
$nuCNPJDistribuidor = '00530493000171';
$tpEntradaEstoque = 'E-O';


try{
    $client = new SoapClient('http://horusws.treinamento.saude.gov.br/horus-ws-service/HorusWSService/HorusWS?wsdl',['login'=>$email,'password'=>$senha]);
    
    $arguments = ['hor:informarEntradaMedicamentoEmLote' =>
                            ['identificacao' => ['idOrigem' => $idOrigem, 'coIBGE' => $coIBGE],
                             'registro' =>  ['estabelecimento' => ['coCNES' => $coCNES, 'coTipoEstabelecimento' => $coTipoEstabelecimento],
                                              'produto' => ['coRegistroOrigem' => $coRegistroOrigem, 
                                                                   'nuProduto' => $nuProduto,
                                                                      'nuLote' => $nuLote, 
                                                                  'dtValidade' => $dtValidade, 
                                                                   'qtProduto' => $qtProduto, 
                                                                  'dtRegistro' => $dtRegistro,
                                                             'sgProgramaSaude' => $sgProgramaSaude,
                                                            'nuCNPJFabricante' => $nuCNPJFabricante,
                                                                'nuNotaFiscal' => $nuNotaFiscal,
                                                   'noFabricanteInternacional' => $noFabricanteInternacional,
                                                             'nuValorUnitario' => $nuValorUnitario,
                                                          'nuCNPJDistribuidor' => $nuCNPJDistribuidor,
                                                          'tpEntradaEstoque' => $tpEntradaEstoque]
                   ]]];
    
    $protocolo = $client->__soapCall("informarEntradaMedicamentoEmLote", $arguments);
    
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