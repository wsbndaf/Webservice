<?php 
/*
 * Exemplo de XML
 * 
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:hor="http://www.saude.gov.br/horus-ws/schemas/v1/HorusTypes">
   <soapenv:Header/>
   <soapenv:Body>
      <hor:retificarSaidaMedicamento>
         <identificacao>
            <idOrigem>E</idOrigem>
            <coIBGE>23</coIBGE>
            <nuProtocoloEntrada>17110000023000003262</nuProtocoloEntrada>
         </identificacao>
         <estabelecimento>
            <coCNES>5717493</coCNES>
            <coTipoEstabelecimento>A</coTipoEstabelecimento>
         </estabelecimento>
         <produto>
            <coRegistroOrigem>123</coRegistroOrigem>
            <nuProduto>EBR0266630U0118</nuProduto>
            <nuLote>ABC123</nuLote>
            <dtValidade>10-10-2020</dtValidade>
            <qtProduto>1234</qtProduto>
            <dtRegistro>01-11-2018</dtRegistro>
            <sgProgramaSaude>DST</sgProgramaSaude>
            <nuCNPJFabricante>10176265000107</nuCNPJFabricante>
            <tpSaida>S-AE</tpSaida>
            <coRegistro>78547</coRegistro>
         </produto>
         <estabelecimento-destino>
            <idIdentificacao>CNES</idIdentificacao>
            <coCNES>5717493</coCNES>
         </estabelecimento-destino>
      </hor:retificarSaidaMedicamento>
   </soapenv:Body>
</soapenv:Envelope>

 */

//Parâmetros de Conexão
$email = "SEU E-MAIL";
$email = "SUA SENHA";
//Parâmetros do XML
$idOrigem = 'E';
$coIBGE = '23';
$nuProtocoloEntrada = '17110000023000003262';
$coCNES = '5717493';
$coTipoEstabelecimento = 'A';
$coRegistroOrigem = '123';
$nuProduto = 'EBR0266630U0118';
$nuLote = 'ABC123';
$dtValidade = '10-10-2020';
$qtProduto = '1234';
$dtRegistro = '01-11-2018';
$sgProgramaSaude = 'DST';
$nuCNPJFabricante = '10176265000107';
$tpSaida = 'S-AE';
$coRegistro  = '78547';
$idIdentificacao = 'CNES';
$coCNES =  '5717493';

try{
    $client = new SoapClient('http://horusws.treinamento.saude.gov.br/horus-ws-service/HorusWSService/HorusWS?wsdl',['login'=>$email,'password'=>$senha]);
    
    $arguments = ['hor:retificarSaidaMedicamento' => [
                    'identificacao' => ['idOrigem' => $idOrigem, 'coIBGE' => $coIBGE, 'nuProtocoloEntrada' => $nuProtocoloEntrada],
                  'estabelecimento' => ['coCNES' => $coCNES,'coTipoEstabelecimento' => $coTipoEstabelecimento],
                          'produto' => ['coRegistroOrigem' => $coRegistroOrigem,
                                               'nuProduto' => $nuProduto,
                                                  'nuLote' => $nuLote,
                                              'dtValidade' => $dtValidade,
                                               'qtProduto' => $qtProduto,
                                              'dtRegistro' => $dtRegistro,
                                         'sgProgramaSaude' => $sgProgramaSaude,
                                                 'tpSaida' => $tpSaida,
                                              'coRegistro' => $coRegistro],
           'estabelecimento-destino' => ['idIdentificacao' => $idIdentificacao,
                                                  'coCNES' => $coCNES]
    ]];
    
    $protocolo = $client->__soapCall("retificarSaidaMedicamento", $arguments);
    
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