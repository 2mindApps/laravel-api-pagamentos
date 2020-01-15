<?php

namespace MindApps\LaravelApiPagamentos\Retorno;

use GuzzleHttp\Client;
use MindApps\LaravelApiPagamentos\ApiHelper;

class Retorno
{
    /**
     * @info Retorna lista de retornos
     * @param $token
     * @return mixed
     * @throws \Exception
     */
    public static function getRetornos($token)
    {
        $api = new ApiHelper();

        $uri = ApiHelper::getUrlBase();

        $response = $api->simpleRequest('GET', $uri.'/cnab/retornos', $token, []);

        return $response;
    }


    /**
     * @info Retorna os detalhes e cobranças de um arquivo retorno
     * @param $token
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public static function getDetalhesRetorno($token, $id)
    {
        $api = new ApiHelper();

        $uri = ApiHelper::getUrlBase();

        $response = $api->simpleRequest('GET', $uri.'/cnab/retornos/'.$id.'/show', $token, []);

        return $response;
    }

    /**
     * @info Realiza upload de arquivo retorno
     * @param $token
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public static function postUploadRetorno($token, $post)
    {
        $api = new ApiHelper();

        $uri = ApiHelper::getUrlBase();

        $multipart = [
            [
                'name'     => 'observacao',
                'contents' => $post['observacao'],
            ],
            [
                'name'     => 'arquivo',
                'contents' => isset($post['arquivo']) ? fopen($post['arquivo']->getRealPath(),'r') : null,
                'filename' => isset($post['arquivo']) ? $post['arquivo']->getClientOriginalName() : null
            ],
        ];

        $response = $api->multipartRequest('POST', $uri.'/cnab/retornos/add', $token, $multipart);

        return $response;
    }

}
