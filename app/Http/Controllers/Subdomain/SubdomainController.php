<?php

namespace App\Http\Controllers\Subdomain;

use App\Http\Controllers\Controller;

class SubdomainController extends Controller
{
    public function __construct($subdomain = 'test')
    {
        $this->subdomain = $subdomain;
    }

    public function index()
    {
        return 'hello'.$this->subdomain;
    }
}
