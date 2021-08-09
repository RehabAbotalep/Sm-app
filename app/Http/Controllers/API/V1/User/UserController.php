<?php

namespace App\Http\Controllers\API\V1\User;

use App\Http\Controllers\APIV1Controller;
use App\Http\Resources\UserProfileResource;
use Illuminate\Http\Request;

class UserController extends APIV1Controller
{
    /**
     * @OA\Get(
     *     path="/api/1.0/users/profile",
     *     description="User Profile",
     *     tags={"User"},
     *     security={
     *          {"passport": {}},
     *      },
     *     @OA\Response(
     *          response=200,
     *          description="successful loged",
     *          @OA\JsonContent(ref="#/components/schemas/UserProfileResponse200Virtual")
     *      ),
     *     @OA\Response(
     *          response=401,
     *          description="token required",
     *          @OA\JsonContent(ref="#/components/schemas/Response401Virtual")
     *      )
     * )
     */


    public function profile(): \Symfony\Component\HttpFoundation\JsonResponse
    {
        $user = auth()->user();
        return $this->ok(
            (new UserProfileResource($user))->resolve()
        );
    }
}
