<?php

use Firebase\JWT\JWT;
use Firebase\JWT\ExpiredException;
use Dotenv\Dotenv;

class jwtService {
    private static string $issuer = 'MK';
    private static int $expirationTime = 30 * 60;

    public static function createToken($username): string {
        $issuedAt = time();
        $expirationTime = $issuedAt + self::$expirationTime;

        $payload = [
            'iat' => $issuedAt,
            'exp' => $expirationTime,
            'sub' => $username,
            'iss' => self::$issuer
        ];

        return JWT::encode($payload, envLoaderService::getEnv("JWT_SECRET"), 'HS256');
    }

    public static function getSecretKey(): string {
        return envLoaderService::getEnv('IP');
    }
}
