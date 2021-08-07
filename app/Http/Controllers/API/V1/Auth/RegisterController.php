<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Http\Controllers\APIV1Controller;
use App\Http\Resources\UserProfileResource;
use App\Models\User;
use App\Services\AccessTokenService;
use Illuminate\Support\Arr;
use Nette\Schema\ValidationException;
use Psr\Http\Message\ServerRequestInterface;

class RegisterController extends APIV1Controller
{
    private $accessTokenService;

    public function __construct(AccessTokenService $accessTokenService)
    {
        $this->accessTokenService = $accessTokenService;
    }

    public function register(ServerRequestInterface $request)
    {
        //validation
        $data = $this->isValid($request);

        $data['email'] = $data['username'];
        $data['password'] = \Hash::make($data['password']);

        $user = User::create(Arr::only($data, ['name', 'email', 'password']));
        $user->profile()->create(Arr::only($data, ['bio']));

        // get token
        $response = $this->accessTokenService->issueToken($request);
        $tokenData = json_decode($response->getContent(), true);
        $tokenData['user'] = new UserProfileResource($user);
        return $this->ok($tokenData);

    }

    private function isValid(ServerRequestInterface $request)
    {
        $rules = [
            'grant_type' => 'required',
            'client_id' => 'required|exists:oauth_clients,id',
            'client_secret' => 'required|exists:oauth_clients,secret',
            'username' => 'required|unique:users,email',
            'password' => 'required',
            'name' => 'required'
        ];

        $messages = [
            'client_id.exists' => 'Invalid client',
            'client_secret.exists' => 'Invalid client',
        ];
        $data = $request->getParsedBody();
        try{
            request()->validate($rules, $data, $messages);
            return $data;
        }catch (ValidationException $exception){
            throw ValidationException::withMessages($exception->errors());
        }
    }
}
