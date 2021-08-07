<?php

use Illuminate\Validation\ValidationException;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 *@OA\Info(
 *     title="SM-App",
 *     version="1.0.0"
 * )
 * @Login
 * @OA\Post(
 *     path="/api/1.0/auth/login",
 *     description="User login endpont & client id, password",
 *     tags={"Auth"},
 *     @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(ref="#/components/schemas/LoginUserRequestVirtual")
 *      ),
 *     @OA\Response(
 *          response=200,
 *          description="successful loged",
 *          @OA\JsonContent(ref="#/components/schemas/LoginResponse200Virtual")
 *      ),
 *     @OA\Response(
 *          response=401,
 *          description="Invalid email or password",
 *          @OA\JsonContent(ref="#/components/schemas/Response401Virtual")
 *      ),
 *      @OA\Response(
 *          response=426,
 *          description="upgrade required",
 *          @OA\JsonContent(ref="#/components/schemas/Response401Virtual")
 *      ),
 *      @OA\Response(
 *          response=422,
 *          description="The given data was invalid",
 *          @OA\JsonContent(ref="#/components/schemas/Response422Virtual")
 *      )
 * )
 * @param ServerRequestInterface $request
 * @return JsonResponse
 * @throws ValidationException
 */

/**
 * @Register
 * @OA\Post(
 *     path="/api/1.0/auth/register",
 *     description="User register endpont & client id, password",
 *     tags={"Auth"},
 *     @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(ref="#/components/schemas/RegisterUserRequestVirtual")
 *      ),
 *     @OA\Response(
 *          response=200,
 *          description="successful loged",
 *          @OA\JsonContent(ref="#/components/schemas/LoginResponse200Virtual")
 *      ),
 *     @OA\Response(
 *          response=401,
 *          description="Invalid email or password",
 *          @OA\JsonContent(ref="#/components/schemas/Response401Virtual")
 *      ),
 *      @OA\Response(
 *          response=426,
 *          description="upgrade required",
 *          @OA\JsonContent(ref="#/components/schemas/Response401Virtual")
 *      ),
 *      @OA\Response(
 *          response=422,
 *          description="The given data was invalid",
 *          @OA\JsonContent(ref="#/components/schemas/Response422Virtual")
 *      )
 * )
 * @param ServerRequestInterface $request
 * @return JsonResponse
 * @throws ValidationException
 */
