<?php

namespace App\Traits;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\ResponseTrait;
use Illuminate\Validation\UnauthorizedException;
use \Symfony\Component\HttpKernel\Exception\HttpException;
use \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait RestExceptionHandlerTrait
{
    use ResponseTrait, RestResponseTrait;

    /**
     * Get Json response for exception thrown
     *
     * @param Request $request
     * @param Exception $e
     * @return \Illuminate\Http\JsonResponse
     */
    protected function getJsonResponseForException(Request $request, Exception $e)
    {
        if (method_exists($e, 'renderer')) {
            return call_user_func([$e, 'renderer'], [$request]);
        }

        switch (true) {
            case $this->isNotFoundHttpException($e):
                return $this->getMethodNotImplementedException();
            case $this->isBadRequestException($e):
                return $this->getBadRequestException();
            case $this->isMethodNotAllowedException($e):
                return $this->getMethodNotAllowedException();
            case $this->isModelNotFoundException($e):
                return $this->getModelNotFoundException();
            case $this->isUnauthorizedException($e):
                return $this->getUnauthorizedException($e->getMessage());
            default:
                return $this->getInternalServerError();
        }
    }

    /**
     * Check if Exception object is an instance of NotFoundHttpException
     *
     * @param Exception $ex
     * @return bool
     */
    protected function isNotFoundHttpException(Exception $ex)
    {
        return $ex instanceof NotFoundHttpException;
    }

    /**
     * Check if Exception object is an instance of BadRequest
     *
     * @param Exception $ex
     * @return bool
     */
    protected function isBadRequestException(Exception $ex)
    {
        return ($ex instanceof HttpException && $ex->getStatusCode() === 400);
    }

    /**
     * Check if Exception object is an instance of BadRequest
     *
     * @param Exception $ex
     * @return bool
     */
    protected function isMethodNotAllowedException(Exception $ex)
    {
        return ($ex instanceof MethodNotAllowedHttpException &&
            $ex->getStatusCode() === 405);
    }

    /**
     * Check if Exception object is an instance of ModelNotFound
     *
     * @param Exception $ex
     * @return bool
     */
    protected function isModelNotFoundException(Exception $ex)
    {
        return ($ex instanceof ModelNotFoundException);
    }

    /** Check if Exception object is an instance of UnauthorizedException
     *
     * @param Exception $ex
     * @return bool
     */
    protected function isUnauthorizedException(Exception $ex)
    {
        return ($ex instanceof UnauthorizedException);
    }
}
