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
$dadosFechamento = $obEconomia->consultarUltimosFechamentos($moedaA, $moedaB, 7); // buscando os ultimos 7 dias 


//IMPRIME O RETORNO DA COTACAO 
echo 'Moedas: ' . $moedaA . ' -> ' . $moedaB . "\n";

//ITERACAO DOS DADOS DO FECHAMENTO
foreach ($dadosFechamento as $fechamento) {
    //OUTPUT
    $output = [
        date('Y-m-d', $fechamento['timestamp']),
        number_format($fechamento['bid'], 4, '.', ''),
        number_format($fechamento['ask'], 4, '.', ''),
    ];

    //IMPRIME O RESULTADO
    echo implode(' | ', $output) . "\n";
}
