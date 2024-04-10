<?php

namespace App\Services;

class Service
{
    public function OkResult($data){
        $response = [
            'success' => true,
            'result' => $data
        ];
        return $response;
    }

    public function FailResponse($mess){
        $response = [
            'success' => false,
            'result' => $mess
        ];
        return $response;
    }

    public function SeoUrl($string)
    {
        $finalString = strtolower($string);
        $finalString = iconv('UTF-8', 'ASCII//TRANSLIT', $finalString);
        $finalString = preg_replace("/[^a-z0-9_\s-]/", "", $finalString);
        $finalString = preg_replace("/[\s-]+/", " ", $finalString);
        $finalString = preg_replace("/[\s_]/", "-", $finalString);
        return $finalString;
    }
}