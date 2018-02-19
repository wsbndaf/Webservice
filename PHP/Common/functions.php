<?php

define("AMBIENTE", "http://horusws.treinamento.saude.gov.br/horus-ws-service/HorusWSService/HorusWS?wsdl");

//Parâmetros de Conexão
define("EMAIL", "SEU E-MAIL");                   // obrigatório
define("SENHA", "SUA SENHA");                    // obrigatório

//Parâmetros do XML
define("IDORIGEM", "M");                         // obrigatório
define("COIBGE", "3539905");                     // obrigatório


/**
 * Função para percorcer o array de registros e remover os itens que são opcionais
 * Não há distinção de quais itens são opcionais ou não
 * a função apenas remove os itens deixados em branco
 * ou seja, o usuário deve seguir os comentários ou o manual mais atualizado
 * em relação aos itens que podem ser deixados em branco ou não
 * 
 */
function removeOptional(&$registros){
  // remove os itens em branco
  foreach ($registros as $key_reg => &$registro) {
    foreach($registro as $key_args => &$arguments) {
      if (is_array($arguments)) {
        foreach ($arguments as $key_arg => &$argument) {
          if ($argument == '') {
            unset($arguments[$key_arg]);
          };
        };
      } elseif (!is_array($arguments) && $arguments == '') {
        unset($registro[$key_args]);
      };
    };
  };
}


/**
 * Função para debuggar
 */ 
function ver($var, $d = null){
  echo '<pre>';
  var_dump($var);
  if ($d) {
    die;
  }
  echo '<pre>';
}


?>