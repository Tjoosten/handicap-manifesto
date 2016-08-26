<?php

namespace App\Http\Controllers;

use App\Statistics;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->logVisit();
    }

    public function logVisit()
    {
        Statistics::create([
            'route' =>  Request::url(),
            'ip_address' => Request::ip(),
        ]);
    }
}
