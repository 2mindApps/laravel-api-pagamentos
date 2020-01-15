<?php

namespace MindApps\LaravelApiPagamentos\Integracao;

use GuzzleHttp\Client;
use MindApps\LaravelApiPagamentos\ApiHelper;
use MindApps\LaravelApiPagamentos\Util;

class Integracao
{
    /**
     * @info Retorna lista de integrações de bancos (para CNAB)
     * @param $token
     * @return mixed
     * @throws \Exception
     */
    public static function getIntegracaoCnab($token)
    {
        $api = new ApiHelper();

        $uri = ApiHelper::getUrlBase();

        $response = $api->simpleRequest('GET', $uri.'/integracoes/cnabs', $token, []);

        return $response;
    }

    /**
     * @info Retorna lista de integrações com gateways (para checkout)
     * @param $token
     * @return mixed
     * @throws \Exception
     */
    public static function getIntegracaoGateway($token)
    {
        $api = new ApiHelper();

        $uri = ApiHelper::getUrlBase();

        $response = $api->simpleRequest('GET', $uri.'/integracoes/gateways', $token, []);

        return $response;
    }

}
