<?php

namespace App\Domains\Api\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    /**
     * Create a new ApiController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['login']]);
    }

    /**
     * @OA\Post(
     *     path="/api/auth/login",
     *     tags={"auth"},
     *     summary="Login & return token",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\MediaType(
     *       mediaType="application/json",
     *       @OA\Schema(
     *         @OA\Property(
     *           property="email",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="password",
     *           type="string",
     *         ),
     *       ),
     *     ),
     *   ),
     *  @OA\Response(
     *         response="200",
     *         description="ok",
     *         content={
     *             @OA\MediaType(
     *                 mediaType="application/json",
     *                 @OA\Schema(
     *                     @OA\Property(
     *                         property="token",
     *                         type="string"
     *                     ),
     *                     @OA\Property(
     *                         property="success",
     *                         type="boolean"
     *                     )
     *                 )
     *             )
     *         }
     *     ),
     *  @OA\Response(
     *         response="401",
     *         description="Unauthorized",
     *         content={
     *             @OA\MediaType(
     *                 mediaType="application/json",
     *                 @OA\Schema(
     *                     @OA\Property(
     *                         property="error",
     *                         type="string"
     *                     ),
     *                 )
     *             )
     *         }
     *     ),
     *  @OA\Response(
     *         response="422",
     *         description="Validation Error",
     *         content={
     *             @OA\MediaType(
     *                 mediaType="application/json",
     *                 @OA\Schema(
     *                     @OA\Property(
     *                         property="errors",
     *                         type="array",
     *													@OA\Items(
     *														type="object",
     *                          	@OA\Property(property="location", type="string"),
     *                          	@OA\Property(property="param", type="string"),
     *														@OA\Property(property="msg", type="string"),
     *												)
     *                     ),
     *                     @OA\Property(
     *                         property="success",
     *                         type="boolean"
     *                     )
     *                 )
     *             )
     *         }
     *     ),
     * )
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($token = $this->guard()->attempt($credentials)) {
            return $this->respondWithToken($token);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json($this->guard()->user());
    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $this->guard()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ]);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        return Auth::guard();
    }
}
