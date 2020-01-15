<?php

namespace MindApps\LaravelApiPagamentos\Remessa;

use GuzzleHttp\Client;
use MindApps\LaravelApiPagamentos\ApiHelper;

class Remessa
{
    /**
     * @info Retorna lista de remessas
     * @param $token
     * @return mixed
     * @throws \Exception
     */
    public static function getRemessas($token)
    {
        $api = new ApiHelper();

        $uri = ApiHelper::getUrlBase();

        $response = $api->simpleRequest('GET', $uri.'/cnab/remessas', $token, []);

        return $response;
    }

    /**
     * @info Retorna quantidade de pendências para gerar remessas
     * @param $token
     * @return mixed
     * @throws \Exception
     */
    public static function getQuantidadePendencias($token)
    {
        $api = new ApiHelper();

        $uri = ApiHelper::getUrlBase();

        $response = $api->simpleRequest('GET', $uri.'/cnab/remessas/pendencias', $token, []);

        return $response;
    }

    /**
     * @info Retorna detalhes da lista de pendências para gerar remessas
     * @param $token
     * @return mixed
     * @throws \Exception
     */
    public static function getDetalhesPendencias($token)
    {
        $api = new ApiHelper();

        $uri = ApiHelper::getUrlBase();

        $response = $api->simpleRequest('GET', $uri.'/cnab/remessas/pendencias', $token, []);

        return $response;
    }


    /**
     * @info Retorna os detalhes e cobranças de um arquivo remessa
     * @param $token
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public static function getDetalhesRemessa($token, $id)
    {
        $api = new ApiHelper();

        $uri = ApiHelper::getUrlBase();

        $response = $api->simpleRequest('GET', $uri.'/cnab/remessas/'.$id.'/show', $token, []);

        return $response;
    }

    /**
     * @info Gera remessa de acordo com itens pendentes
     * @param $token
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public static function postGeraRemessa($token)
    {
        $api = new ApiHelper();

        $uri = ApiHelper::getUrlBase();

        $response = $api->simpleRequest('POST', $uri.'/cnab/remessas/add', $token, []);

        return $response;
    }

}
