<?php

namespace MindApps\LaravelApiPagamentos\Cobranca;

use GuzzleHttp\Client;
use MindApps\LaravelApiPagamentos\ApiHelper;
use MindApps\LaravelApiPagamentos\Util;

class Cobranca
{
    /**
     * @info Retorna lista de cobranças
     * @param $token
     * @return mixed
     * @throws \Exception
     */
    public static function getCobrancas($token)
    {
        $api = new ApiHelper();

        $uri = ApiHelper::getUrlBase();

        $response = $api->simpleRequest('GET', $uri.'/cobrancas', $token, []);

        return $response;
    }

    /**
     * @info Retorna detalhes da cobrança
     * @param $token
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public static function getDetalhesCobranca($token, $id)
    {
        $api = new ApiHelper();

        $uri = ApiHelper::getUrlBase();

        $response = $api->simpleRequest('GET', $uri.'/cnab/cobrancas/'.$id.'/show', $token, []);

        return $response;
    }

    /**
     * @info Realiza post para gerar a cobrança
     * @param $token
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public static function postGeraCobranca($token, $params)
    {
        $api = new ApiHelper();

        $uri = ApiHelper::getUrlBase();

        //formata dados padrões obrigatórios
        $params['especie']      = 'DM';
        $params['aceite']       = '1';
        $params['envia_email']  = '0';
        $params['emite_nf']     = '0';

        $response = $api->simpleRequest('POST', $uri.'/cnab/cobrancas/add', $token, $params);

        return $response;
    }
    /**
     * @info Realiza post para alterar a data de vencimento da cobrança (boleto)
     * @param $token
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public static function postAlteraVencimentoCobranca($token, $id, $dataVencimento)
    {
        $api = new ApiHelper();

        $uri = ApiHelper::getUrlBase();

        $params = [
            'cobranca_id' => $id,
            'data_vencimento' => Util::formataDataUtc($dataVencimento),
        ];

        $response = $api->simpleRequest('POST', $uri.'/cnab/cobrancas/edit', $token, $params);

        return $response;
    }

    /**
     * @info Realiza post para cancelar a cobrança
     * @param $token
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public static function postCancelaCobranca($token, $id, $justificativa)
    {
        $api = new ApiHelper();

        $uri = ApiHelper::getUrlBase();

        $params = [
            'cobranca_id' => $id,
            'justificativa' => $justificativa,
        ];

        $response = $api->simpleRequest('POST', $uri.'/cnab/cobrancas/cancel', $token, $params);

        return $response;
    }

    /**
     * @info Realiza post para informar que a cobrança foi paga (baixa)
     * @param $token
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public static function postBaixaCobranca($token, $id, $dataPagamento)
    {
        $api = new ApiHelper();

        $uri = ApiHelper::getUrlBase();

        $params = [
            'cobranca_id' => $id,
            'data_pagamento' => Util::formataDataUtc($dataPagamento),
        ];

        $response = $api->simpleRequest('POST', $uri.'/cnab/cobrancas/paid', $token, $params);

        return $response;
    }
}
