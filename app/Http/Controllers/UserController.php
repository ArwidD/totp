<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\User;
use App\Storage\UserRepository;
use Illuminate\Database\UniqueConstraintViolationException;
use App\Services\TotpQrService;


class UserController extends Controller
{
    public function __construct(private UserRepository $repo)
    {

    }
    public function showRegister()
    {
        return View::make('register');
    }

    public function register(Request $request)
    { try {
        $user=User::factory()->make($request->request->all());
        
        $this->repo->add($user);

        $qr = TotpQrService::generateQrCode($user);
        return View::make('mail', ['qr' => $qr]);
    } catch (UniqueConstraintViolationException $e) {
        return View::make('register', ['message'=>'User email exists']);
    }
}
}

    
