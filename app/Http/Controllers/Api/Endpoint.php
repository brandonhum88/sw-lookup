<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class Endpoint extends Controller
{
    const SWAPI_URI = 'https://swapi.co/api/';

    protected $resource_type;
    protected $client;

    public function __construct()
    {
        $this -> client = new Client([
            'base_uri' => self::SWAPI_URI,
            'verify' => false
        ]);
    }

    public function index(Request $request)
    {
        return $this -> FetchPage($request -> page);
    }

    // Get page of resources
    public function FetchPage($page_no)
    {
        $result = $this -> client -> request('GET', $this -> resource_type . "/?page=$page_no");
        $data = json_decode($result->getBody());

        $results = $data -> results;

        foreach($results as &$resource)
        {
            $resource -> id = $this -> ExtractID($resource);
        }

        return ['resources' => $results, 'count' => $data -> count];
    }

    // Get a single resource
    public function find($id)
    {
        $result = $this -> client -> request('GET', $this -> resource_type . "/$id");
        $data = json_decode($result->getBody());

        return ['resources' => [$data]];
    }

    // Search for resources
    public function Search(Request $request)
    {
        $result = $this -> client -> request('GET', $this -> resource_type . "/?search=" . $request -> get('query'));

        $data = json_decode($result->getBody());

        $options = [];

        foreach($data -> results as $resource)
        {
            $id = $this -> ExtractID($resource);

            $options[] = [
                'id' => $id,
                'name' => $resource -> name
            ];
        }

        return $options;
    }

    // Extract the id from the url
    public function ExtractID($resource)
    {
        $id = str_replace(self::SWAPI_URI . $this -> resource_type . '/', '', $resource -> url);
        return str_replace('/', '', $id);
    }
}
