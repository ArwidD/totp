<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function showRegister()
    {
        return View::make('register');
    }

    public function register(Request $request)
    {
        $user=User::factory()->make($request->request->all());
        dd($user);
    }
}