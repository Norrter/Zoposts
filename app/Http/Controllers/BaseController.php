<?php

namespace App\Http\Controllers;

use App\Services\Post\Service;
use Illuminate\Routing\Controller;

class BaseController extends Controller
{
    public function __construct(Service $service)
    {
        return $this->service = $service;
    }
}
