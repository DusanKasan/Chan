<?php
namespace DusanKasan\Chan\Client;

interface Client
{
    public function get(string $url) : string;
}
