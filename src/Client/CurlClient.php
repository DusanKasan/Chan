<?php

namespace DusanKasan\Chan\Client;

use DusanKasan\Chan\Client\Exceptions\ApiCommunicationFailed;

class CurlClient implements Client
{
    public function get(string $url) : string
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = curl_exec($ch);
        curl_close($ch);

        if ($data === NULL) {
            throw new ApiCommunicationFailed;
        }

        return $data;
    }
}
