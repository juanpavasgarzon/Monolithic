<?php

namespace App\Core\User\Controllers;

use App\Common\Controller\Controller;
use App\Core\User\Request\CredentialRequest;
use App\Core\User\Request\RegisterRequest;
use App\Core\User\Services\RegisterUserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

/**
 * @OA\Tag(
 *     name="User",
 *     description="Operations related to user authentication and registration"
 * )
 */
class UserController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/auth/register",
     *     summary="Register a new user",
     *     tags={"User"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="name", type="string", example="John Doe"),
     *             @OA\Property(property="email", type="string", format="email", example="john@example.com"),
     *             @OA\Property(property="password", type="string", example="password123"),
     *             @OA\Property(property="password_confirmation", type="string", example="password123")
     *         )
     *     ),
     *     @OA\Response(
     *         response="201",
     *         description="User successfully registered",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="user", type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="name", type="string", example="John Doe"),
     *                 @OA\Property(property="email", type="string", example="john@example.com"),
     *                 @OA\Property(property="created_at", type="string", format="date-time", example="2024-11-15T10:00:00"),
     *                 @OA\Property(property="updated_at", type="string", format="date-time", example="2024-11-15T10:00:00")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Bad request, invalid input"
     *     )
     * )
     */
    public function register(RegisterRequest $request, RegisterUserService $service): JsonResponse
    {
        $name = $request->name();
        $email = $request->email();
        $password = $request->password();

        $user = $service->handle($name, $email, $password);

        return response()->json(['user' => $user], 201);
    }

    /**
     * @OA\Post(
     *     path="/api/auth/login",
     *     summary="User login",
     *     tags={"User"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="email", type="string", format="email", example="john@example.com"),
     *             @OA\Property(property="password", type="string", example="password123"),
     *             @OA\Property(property="remember", type="boolean", example=true)
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Login successful",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Login successful"),
     *             @OA\Property(property="token", type="string", example="your_generated_token_here")
     *         )
     *     ),
     *     @OA\Response(
     *         response="401",
     *         description="Invalid credentials"
     *     )
     * )
     */
    public function login(CredentialRequest $request): JsonResponse
    {
        $email = $request->email();
        $password = $request->password();

        $attempt = Auth::attempt([$email, $password], $request->remember());
        if (!$attempt) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('auth-token');

        return response()->json([
            'message' => 'Login successful',
            'token' => $token->plainTextToken,
        ]);
    }

    /**
     * @OA\Post(
     *     path="/api/auth/logout",
     *     summary="User logout",
     *     security={{"bearerAuth":{}}},
     *     tags={"User"},
     *     @OA\Response(
     *         response="200",
     *         description="Logout successful",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Logout successful")
     *         )
     *     ),
     *     @OA\Response(
     *         response="401",
     *         description="Unauthorized"
     *     )
     * )
     */
    public function logout(): JsonResponse
    {
        Auth::user()->tokens()->delete();
        return response()->json(['message' => 'Logout successful']);
    }
}
