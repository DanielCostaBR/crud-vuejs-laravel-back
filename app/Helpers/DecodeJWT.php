<?php

namespace App\Helpers;

class DecodeJWT
{
    public function decodeJWT(string $token): string
    {
            $tokenParts = explode(".", $token);
            $tokenHeader = base64_decode($tokenParts[0]);
            $tokenPayload = base64_decode($tokenParts[1]);
            json_decode($tokenHeader);
            $jwtPayload = json_decode($tokenPayload);
            return $jwtPayload->sub;
    }
}
