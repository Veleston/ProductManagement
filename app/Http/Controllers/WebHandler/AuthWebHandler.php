<?php

namespace App\Http\Controllers\WebHandler;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class AuthWebHandler extends Controller
{
    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        $authObj = new AuthController();
        $authData = $authObj->login($data);
        return $authData;
    }
}
