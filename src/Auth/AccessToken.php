<?php

namespace MindApps\LaravelApiPagamentos\Auth;

use GuzzleHttp\Client;
use MindApps\LaravelApiPagamentos\ApiHelper;

class AccessToken
{
    /**
     * @info Gera accessToken utilizado nas requisições via API
     * @param $clientId
     * @param $clientSecret
     */
    public static function generate($clientId, $clientSecret)
    {
        $api = new ApiHelper();

        $uri = ApiHelper::getUrlBase();

        $response = $api->simpleRequest('POST', $uri.'/access-token', [
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
        ]);

        if(!$response->success)
        {
            throw new \Exception('Não foi possível gerar o AccessToken. Verifique se as variáveis clientId e clientSecret foram enviadas corretamente.');
        }
        else
        {
            return $response->result->token;
        }
    }

}
