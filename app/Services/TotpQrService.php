<?php

namespace App\Services;

use App\Models\User;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

class TotpQrService {
    static function generateQrCode(User $user) {
        $issuer=env('TOTP_ISSUER', 'me');
        $issuerEnc=urlencode($issuer);
        $accountEnc=urlencode($user->email);
        $secret=urlencode($user->secret);

        $url="otpauth://Totp/{$issuerEnc}:{$accountEnc}?secret={$secret}&issuer={$issuerEnc}&digits=6&period=30";

        $renderer=new ImageRenderer(new RendererStyle(300),
        new SvgImageBackEnd());

        $writer=new ImageRenderer(
            new RendererStyle(300),
            new SvgImageBackEnd()
        );

        $writer=new Writer($renderer);
        $svgString=$writer->writeString($url);

        return[
            'url'=>$url,
            'mime' =>'image/svg+xml',
            'svg' => $svgString
        ];
    }
}