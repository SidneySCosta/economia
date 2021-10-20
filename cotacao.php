<?php


require __DIR__ . '/vendor/autoload.php';

//DEPENDENCIAS
use \App\Awesome\Economia;

//INSTANCIA DA CLASSE 
$obEconomia = new Economia;

//VERIRICACAO DOS ARGUMENTOS
if (!isset($argv[2])) {
    die('Obrigatorio enviar duas moedas');
}

//MOEDAS
$moedaA = $argv[1];
$moedaB = $argv[2];


//EXECUCAO DA REQUISICAO NA API
$dadosCotacao = $obEconomia->consultarCotacao($moedaA, $moedaB);

//CONFIGURACAO DO RESPONSE DOS DADOS
$dadosCotacao = $dadosCotacao[$moedaA . $moedaB] ?? [];

//IMPRIME O RETORNO DA COTACAO 
echo 'Moedas: ' . $moedaA . ' -> ' . $moedaB . "\n";
echo 'Compra: ' . ($dadosCotacao['bid'] ?? 'Desconhecido') . "\n";
echo 'Venda: ' . ($dadosCotacao['ask'] ?? 'Desconhecido') . "\n";

// echo "<pre>";
// print_r($dadosCotacao);
// echo "</pre>";
// exit;
