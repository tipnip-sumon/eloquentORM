<?php

namespace App\Helpers;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTToken
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function CreateToken($userEmail):string
    {
        $key = env('JWT_KEY');
        $payload = [
            'iss'=>'Laravel-Token',
            'iat'=>time(),
            'exp'=>time()+60*60,
            'userEmail'=>$userEmail
        ];
        return JWT::encode($payload,$key,'HS256');
    }
    public function VerifyToken($token) : string
    {
       try {
            $key = env('JWT_KEY');
            $decode = JWT::decode($token,new Key($key,'HS256'));
            return $decode->userEmail;
       } catch (\Throwable $th) {
            return "Unauthorized";
       }
    }

}
