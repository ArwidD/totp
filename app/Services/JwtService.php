<?php

namespace App\Services;

use Carbon\Carbon;
use Firebase\JWT\JWt;
use Firebase\JWT\Key;

class JwtService {
    private string $key;

    private string $algo='HS256';

    public function __construct() {
        $this->key=env('JWT_SECRET', 'fallback_key');
    }

    public function createAccessToken(string $userId) {
        $now=Carbon::now();
        $exp=$now->copy()->addMinutes(15);
        $payload= [
            'sub'=>$userId,
            'iat'=>$now->timestamp,
            'exp'=>$exp->timestamp
        ];

        return JWT::encode($payload, $this->key, $this->algo);
    }

    public function validate(string $token):?object {
        try {
            return JWT::decode($token, new key($this->key, $this->algo));
        } catch (\Throwable $e) {
            return null;
        }
    }

    public function createRefreshToken():string {
        return bin2hex(random_bytes(40));
    }
}