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
}