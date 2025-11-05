<?php

namespace App\Services;

use OTPHP\TOTP;

class TotpService {
    public function verify(string $secret, string $code):bool {
        try {
            $totp=TOTP::create($secret);
            return $totp->verify($code, null, 1);
        } catch (\Exception $e){
            return false;
        }
    }
}