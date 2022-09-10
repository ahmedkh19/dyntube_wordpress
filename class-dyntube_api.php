<?php

class DynTube_API {

    private const TOKEN = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJjcmVhdGl2ZWJhbmRAaG90bWFpbC5jb20iLCJqdGkiOiIzNjE5OTMwMS04MTM2LTQ5NjgtODBkMC1lZWQ3Nzk1NTQxMDMiLCJ1c2VySWQiOiI2MzE5OTU5M2ZhMDRiNTMyZjI5NmI3MzUiLCJhY2NvdW50SWQiOiI3b2ZNblVhWVkwTDBUNGNZNFdCM3ciLCJleHAiOjI1MzQwMjMwMDgwMCwiaXNzIjoiaHR0cHM6Ly9keW50dWJlLmNvbSIsImF1ZCI6Ik1hbmFnZSJ9.qtr4mHZmqYgjQrtZtHLuE_JIDB1I0jJ9EkdqVt3Dtbc'; // Secret Key
    private const PROJECT_ID = 'VmEJZZu7EOn9gRr6on0wA';
    private const API_URL = [
        'video' => 'https://upload.dyntube.com/v1/videos',
    ];
    /*
    * Base API : the fundemntial of the api request
    */
    private function _BASEAPI($_URL, $_METHOD , $_FIELDS)
    {
        try {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL               => $_URL,
                CURLOPT_RETURNTRANSFER    => true,
                CURLOPT_ENCODING          => '',
                CURLOPT_MAXREDIRS         => 10,
                CURLOPT_TIMEOUT           => 0,
                CURLOPT_FOLLOWLOCATION    => true,
                CURLOPT_HTTP_VERSION      => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST     => $_METHOD,
                CURLOPT_POSTFIELDS        => $_FIELDS,
                CURLOPT_HTTPHEADER        => array(
                    "Authorization: Bearer " . TOKEN
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            return $response;
        } catch (\Throwable $th) {
            return $th;
        }


    }

    /*
    * Upload video using url
    */
    public function _UPLOAD_VIDEO($_VIDEO_URL) 
    {
        $fields = array(
            'url' => $_VIDEO_URL,
            'projectId' => PROJECT_ID
        );
        $result = _BASEAPI(API_URL['video'], 'POST', $fields);
        return $result;
    }

}