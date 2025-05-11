<?php

namespace App\Services\Auth;

use Exception;
use RuntimeException;
use Illuminate\Support\Facades\Http;
use App\Repositories\Contracts\UserRepositoryInterface;

class AuthService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    // public function register(array $data): array
    // {
    //     try {
    //         $user = $this->userRepository->create([
    //             'name' => $data['name'],
    //             'email' => $data['email'],
    //             'password' => $data['email'],
    //         ]);

    //         $token = $user->createToken('remedic-webapp')->accessToken;

    //         return [
    //             'user' => $user,
    //             'access_token' => $token
    //         ];
    //     } catch (\Exception $e) {
    //         return [
    //             'error' => 'Registration failed. Please try again later.',
    //             'message' => $e->getMessage()
    //         ];
    //     }
    // }

    public function signup(array $data): array
    {
        try {

            $user = $this->userRepository->create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'],
            ]);

            $response = Http::post(env('APP_URL') . '/oauth/token', [
                'grant_type' => 'password',
                'username' => $data['email'],
                'password' => $data['password'],
                'scope' => '',
            ]);

            // $token = $response->json()['access_token'];

            return [
                'user' => $user,
                'access_token' => ""
            ];
        } catch (RuntimeException $e) {
            return [
                'error' => 'Registration failed. Please try again later.',
                'message' => $e->getMessage()
            ];
        }
    }
}
