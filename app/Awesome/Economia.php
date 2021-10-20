<?php

namespace App\Awesome;

class Economia
{
    /**
     *URL base da API
     * @var string
     */
    const BASE_URL = 'https://economia.awesomeapi.com.br/json';

    /**
     *Metodo para consultar a cotacao atual das moedas
     * @param string $moedaA
     * @param string $moedaB
     * @return array
     */
    public function consultarCotacao($moedaA, $moedaB)
    {
        return $this->get('/last/' . $moedaA . '-' . $moedaB);
    }

    /**
     *Metodo para consultar a cotacao atual das moedas
     * @param string $moedaA
     * @param string $moedaB
     * @param integer $dias
     * @return array
     */
    public function consultarUltimosFechamentos($moedaA, $moedaB, $dias = 1)
    {
        return $this->get('/daily/' . $moedaA . '-' . $moedaB . '/' . $dias);
    }


    /**
     *Metodo para executar a requisicao na API 
     * @param string $resource
     * @return array
     */
    public function get($resource)
    {
        //ENDPOINT
        $endpoint = self::BASE_URL . $resource;

        //INICIA CURL
        $curl = curl_init();

        //CONFIG DO CURL
        curl_setopt_array($curl, [
            CURLOPT_URL => $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'GET'
        ]);

        //RESPONSE DO CURL
        $response = curl_exec($curl);

        //FECHA CURL
        curl_close($curl);

        //RETORNA O RESULTADO EM ARRAY
        return json_decode($response, true);

        // echo "<pre>";
        // print_r($endpoint);
        // echo "</pre>";
        // exit;
    }
}
