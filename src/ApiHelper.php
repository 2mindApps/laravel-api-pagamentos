<?php

namespace MindApps\LaravelApiPagamentos;

use GuzzleHttp\Client;

class ApiHelper
{
    /**
     * @info Retorna a URL base da API
     * @return string
     */
    public static function getUrlBase()
    {
        $url = env('APP_ENV') == 'production' ? 'https://pagamentos.2mind.com.br' : 'http://2mind-pagamentos.test';

        return $url . '/api';
    }


    /**
     * @info Realiza requisição na API do tipo form_params (requisição simples)
     * @param $method
     * @param $uri
     * @param array $formParams
     */
    public function simpleRequest($method, $uri, $formParams = [])
    {
        $result  = null;

        try
        {
            $guzzle  = new Client();
            $result  = $guzzle->request(strtoupper($method), $uri, [
                'headers'      => [
                    'Accept'   => 'application/json',
                ],
                'form_params'  => $formParams
            ]);

            $result = json_decode($result->getBody());
        }
        catch(\Exception $e)
        {
            throw new \Exception($e->getMessage());
        }

        return $result;
    }


    /**
     * @info Realiza requisição na API do tipo multipart (envio de arquivos)
     * @param $method
     * @param $uri
     * @param array $multipart
     * @return mixed
     */
    public function multipartRequest($method, $uri, $multipart = [])
    {
        $result  = null;

        try
        {
            $guzzle  = new Client();
            $result  = $guzzle->request($method, $uri, [
                'headers'      => [
                    'Accept'   => 'application/json',
                ],
                'multipart' => $multipart,
            ]);

            $result = json_decode($result->getBody());
        }
        catch(\Exception $e)
        {
            throw new \Exception($e->getMessage());
        }

        return $result;
    }


}