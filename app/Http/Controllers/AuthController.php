<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function getCsrfToken()
    {
        return response()->json([
            'csrf_token' => csrf_token(),
        ]);
    }
}
