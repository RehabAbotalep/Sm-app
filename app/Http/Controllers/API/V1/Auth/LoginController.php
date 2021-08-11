<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Http\Controllers\APIV1Controller;
use App\Http\Resources\UserProfileResource;
use App\Jobs\SenLogedUserEmail;
use App\Mail\UserLoggedMail;
use App\Models\User;
use App\Services\AccessTokenService;
use Nette\Schema\ValidationException;
use Psr\Http\Message\ServerRequestInterface;

class LoginController extends APIV1Controller
{
    private $accessTokenService;

    public function __construct(AccessTokenService $accessTokenService)
    {
        $this->accessTokenService = $accessTokenService;
    }

    public function login(ServerRequestInterface $request)
    {
        //validation
        $data = $this->isValid($request);

        //get token
        $response = $this->accessTokenService->issueToken($request);
        $tokenData = json_decode($response->getContent(), true);
        $user = User::where('email', $data['username'])->firstOrFail();

        //send Email
       // \Mail::to($data['username'])->send(new UserLoggedMail());

        dispatch(new SenLogedUserEmail($data['username']));

        $tokenData['user'] = new UserProfileResource($user);

        return $this->ok($tokenData);
    }

    private function isValid(ServerRequestInterface $request)
    {
        $rules = [
            'grant_type' => 'required',
            'client_id' => 'required|exists:oauth_clients,id',
            'client_secret' => 'required|exists:oauth_clients,secret',
            'username' => 'required',
            'password' => 'required',
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
