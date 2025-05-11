<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\JsonResponse;
use App\Services\Auth\AuthService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SignupRequest;


class AuthController extends Controller
{

    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    // public function signup(AuthSignupRequest $request)
    // {
    //     try {
    //         $data = $this->authService->register($request->validated());
    //         return ApiResponse::success([
    //             'user' => new UserResource($data['user']),
    //             'accessToken' => $data['access_token'],
    //         ], 'User registered successfully');
    //     } catch (RuntimeException $e) {
    //         return ApiResponse::error($e->getMessage(), 500);
    //     }
    // }



    public function signup(SignupRequest $request): JsonResponse
    {
        // Validazione dei dati della richiesta
        $validatedData = $request->validated();

        // Passa i dati al servizio per la registrazione
        $result = $this->authService->signup($validatedData);

        if (isset($result['error'])) {
            return response()->json([
                'success' => false,
                'message' => $result['error'],
                'details' => $result['message']
            ], 500);
        }

        return response()->json([
            'success' => true,
            'statusCode' => 201,
            'message' => 'User has been registered successfully.',
            'data' => $result
        ], 201);
    }
}
