<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class API extends Controller
{
    // base url
    protected static $BASE_URL = "https://anime-steel.vercel.app/kiryuu/";

    // hit and get a data from api
    public static function call(string $path): mixed
    {
        $client = new \GuzzleHttp\Client();
        $url = self::$BASE_URL . $path;
        $response = $client->request('GET', $url);
        return json_decode($response->getBody());
    }
}
