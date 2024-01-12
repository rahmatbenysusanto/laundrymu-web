<?php

namespace App\Http\Controllers;

use App\Http\services\HitApiService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct(
        protected HitApiService $hitApiService
    ){}
}
