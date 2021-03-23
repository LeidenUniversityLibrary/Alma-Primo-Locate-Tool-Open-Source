<?php

namespace App\Exceptions;

use App\Mail\Exception as ExceptionMail;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Log;
use Mail;
use Request;
use Symfony\Component\ErrorHandler\ErrorRenderer\HtmlErrorRenderer;
use Symfony\Component\ErrorHandler\Exception\FlattenException;
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
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        if ($this->shouldReport($exception)) {
            $this->sendExceptionEmail($exception);
        }
        parent::report($exception);
    }

    /**
     * Parse the exception and send email
     *
     * @param Throwable $exception
     */

    public function sendExceptionEmail(Throwable $exception)
    {

        try {
            $e = FlattenException::create($exception);
            $handler = new HtmlErrorRenderer(true); // boolean, true raises debug flag...
            $html = $handler->getBody($e);
            Mail::queue(new ExceptionMail($html));
        } catch (Throwable $e) {
            Log::error($e);
        }
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if (!$this->shouldReport($exception)) {
            return parent::render($request, $exception);
        }

        if (config('app.debug')) {
            return parent::render($request, $exception);
        }

        return response()->view('errors.500', [], 500);
    }
}
