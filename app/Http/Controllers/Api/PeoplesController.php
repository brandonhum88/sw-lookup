<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

class PeoplesController extends Endpoint
{
    public function __construct()
    {
        parent::__construct();
        $this -> resource_type = 'people';
    }
}
