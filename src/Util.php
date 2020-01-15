<?php

namespace MindApps\LaravelApiPagamentos;

use Carbon\Carbon;
use GuzzleHttp\Client;

class Util
{
    /**
     * @info Verifica se a string é uma data
     * @param $string
     * @return mixed
     */
    public static function isDate($string)
    {
        $date = false;

        try
        {
            $test = Carbon::createFromFormat('d/m/Y',$string);

            $date = true;
        }
        catch(\Exception $e1)
        {
            try
            {
                $test = Carbon::createFromFormat('Y-m-d',$string);

                $date = true;
            }
            catch(\Exception $e2)
            {
                $date = false;
            }

        }

        return $date;
    }


    /**
     * @info Formata data para o formato d/m/Y
     * @param $string
     * @return mixed
     */
    public static function formataDataBr($string)
    {
        $date = null;

        try
        {
            $date = Carbon::createFromFormat('d/m/Y',$string)->format('d/m/Y');
        }
        catch(\Exception $e1)
        {
            try
            {
                $date = Carbon::createFromFormat('Y-m-d',$string)->format('d/m/Y');
            }
            catch(\Exception $e2)
            {
                //
            }

        }

        return $date;
    }

    /**
     * @info Formata data para o formato Y-m-d
     * @param $string
     * @return mixed
     */
    public static function formataDataUtc($string)
    {
        $date = null;

        try
        {
            $date = Carbon::createFromFormat('d/m/Y',$string)->format('Y-m-d');
        }
        catch(\Exception $e1)
        {
            try
            {
                $date = Carbon::createFromFormat('Y-m-d',$string)->format('Y-m-d');
            }
            catch(\Exception $e2)
            {
                //
            }

        }

        return $date;
    }
}