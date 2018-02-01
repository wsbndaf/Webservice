<?php
/*
 * Exemplo de XML
 *
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:hor="http://www.saude.gov.br/horus-ws/schemas/v1/HorusTypes">
   <soapenv:Header/>
   <soapenv:Body>
      <hor:informarSaidaMedicamentoEmLote>
         <identificacao>
            <idOrigem>E</idOrigem>
            <coIBGE>23</coIBGE>
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
               <nuLote>123</nuLote>
               <dtValidade>10-10-2020</dtValidade>
               <qtProduto>123</qtProduto>
               <dtRegistro>08-11-2017</dtRegistro>
               <sgProgramaSaude>DST</sgProgramaSaude>
               <nuCNPJFabricante>10176265000107</nuCNPJFabricante>
               <tpSaida>S-AE</tpSaida>
            </produto>
            <estabelecimento-destino>
               <idIdentificacao>CNES</idIdentificacao>
               <coCNES>5717493</coCNES>
            </estabelecimento-destino>
         </registro>
      </hor:informarSaidaMedicamentoEmLote>
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
$dtValidade = '10-10-2020';
$qtProduto = '123';
$dtRegistro = '08-11-2017';
$sgProgramaSaude = 'DST';
$nuCNPJFabricante = '10176265000107';
$tpSaida = 'S-AE';
$idIdentificacao = 'CNES';
$coCNES =  '5717493';

try{
    $client = new SoapClient('http://horusws.treinamento.saude.gov.br/horus-ws-service/HorusWSService/HorusWS?wsdl',['login'=>$email,'password'=>$senha]);
    
    $arguments = ['hor:informarSaidaMedicamentoEmLote' => [
        'identificacao' => ['idOrigem' => $idOrigem, 'coIBGE' => $coIBGE],
               'registro' => [
                    'estabelecimento' => ['coCNES' => $coCNES, 'coTipoEstabelecimento' => $coTipoEstabelecimento],
                            'produto' => ['coRegistroOrigem' => $coRegistroOrigem,
                                                 'nuProduto' => $nuProduto,
                                                    'nuLote' => $nuLote,
                                                'dtValidade' => $dtValidade,
                                                 'qtProduto' => $qtProduto,
                                                'dtRegistro' => $dtRegistro,
                                           'sgProgramaSaude' => $sgProgramaSaude,
                                          'nuCNPJFabricante' => $nuCNPJFabricante,
                                                   'tpSaida' => $tpSaida],
            'estabelecimento-destino' => ['idIdentificacao' => $idIdentificacao, 'coCNES' => $coCNES]
                  ]]];
    
    $protocolo = $client->__soapCall("informarSaidaMedicamentoEmLote", $arguments);
    
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