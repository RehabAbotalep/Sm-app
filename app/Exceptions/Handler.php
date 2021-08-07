<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e)
    {
        if ($request->is('api*')) {

            if ($e instanceof \Illuminate\Auth\AuthenticationException) {
                return $this->unauthorized();
            }

            if ($e instanceof OAuthServerException) {
                return $this->unauthorized(null, $e->getMessage());
            }

            if ($e instanceof ValidationException) {
                return $this->invalidRequest($e->validator->errors()->toArray());
            }

            if ($e instanceof NotFoundHttpException) {
                return $this->notFound();
            }
        }

        return parent::render($request, $e); // TODO: Change the autogenerated stub
    }
}
