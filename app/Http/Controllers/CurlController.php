<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CurlController extends Controller
{
    /**
     * GET запрос на URL
     *
     * @param $url - URL запроса
     * @param array $params - GET параметры запроса
     * @return bool|string - Возвращает результат GET запроса
     */
    public function get($url, $params = array()) {
        // Получаем из массива параметров строку
        $get_str = '';
        foreach ($params as $key => $value) {
            $get_str = $get_str . '&' . $key . '=' . $value;
        }
        $url = $url . "?" . $get_str;

        if( $curl = curl_init() ) {
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
            $result = curl_exec($curl);
            curl_close($curl);

            return $result;
        }
    }
}
