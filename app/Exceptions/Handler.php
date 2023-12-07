<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        //
    }

    /**
     * Report or log an exception.
     *
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $e)
    {
        if ($request->is('api/*')) {
            if ($e instanceof ValidationException) {
                return apiError(__('error.err_422'), 422, $e->errors());
            } elseif ($e instanceof HttpException) {
                $definedErrors = [400, 401, 403, 404, 429, 500, 1001];
                $statusCode = $e->getStatusCode();
                $code = in_array($statusCode, $definedErrors) ? $statusCode : 500;

                return apiError(__("error.err_{$code}"), $code);
            } else {
                return apiError(__('error.err_500'), 500);
            }
        }

        return parent::render($request, $e);
    }
}
