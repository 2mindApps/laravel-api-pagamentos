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

        if(!$response->success)
        {
            throw new \Exception($response->log[0]['error']);
        }
        else
        {
            return $response->remessas;
        }
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

        if(!$response->success)
        {
            throw new \Exception($response->log[0]['error']);
        }
        else
        {
            return $response->quantidade;
        }
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

        if(!$response->success)
        {
            throw new \Exception($response->log[0]['error']);
        }
        else
        {
            return $response->pendencias;
        }
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

        if(!$response->success)
        {
            throw new \Exception($response->log[0]['error']);
        }
        else
        {
            return $response->remessa;
        }
    }

}
