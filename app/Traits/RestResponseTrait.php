<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\MessageBag;
use League\Fractal\TransformerAbstract;
use Themsaid\Transformers\AbstractTransformer;

trait RestResponseTrait
{

    /**
     * Get JSON error for bad request
     *
     * @param string $message
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    protected function getBadRequestException($message = 'Bad request', $statusCode = 400)
    {
        $response = ['code' => 'BAD_REQUEST'];
        $message = $message ?: 'Bad request';
        if (is_array($message)) {
            $response['error'] = $message;
        } elseif ($message instanceof MessageBag) {
            $response['error'] = $message->getMessages();
        } else {
            $response['message'] = $message;
        }

        return $this->jsonResponse($response, $statusCode);
    }

    /**
     * Get JSON error for methods/routes not implemented
     *
     * @param string $message
     * @param int $statusCode
     * @return mixed
     */
    protected function getMethodNotImplementedException(
        $message = 'Method not implemented',
        $statusCode = 404
    ) {
        return $this->jsonResponse(['code' => 'METHOD_NOT_IMPLEMENTED', 'message' => $message], $statusCode);
    }

    /**
     * Get JSON error for internal service error.
     *
     * @param string $message
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    protected function getInternalServerError(
        $message = 'Internal Server Error',
        $statusCode = 500
    ) {
        return $this->jsonResponse(['code' => 'INTERNAL_SERVER_ERROR', 'message' => $message], $statusCode);
    }

    /**
     * Get JSON error for method not allowed.
     *
     * @param string $message
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    protected function getMethodNotAllowedException(
        $message = 'Method Not Allowed',
        $statusCode = 405
    ) {
        return $this->jsonResponse(['code' => 'METHOD_NOT_ALLOWED', 'message' => $message], $statusCode);
    }

    /**
     * Get JSON error for model not found
     *
     * @param string $message
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    protected function getModelNotFoundException(
        $message = 'Record Not Found',
        $statusCode = 404
    ) {
        return $this->jsonResponse(['code' => 'NOT_FOUND', 'message' => $message], $statusCode);
    }

    /**
     * Get JSON error for model not found
     *
     * @param string $message
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    protected function getUnauthorizedException(
        $message = 'Unauthorized access',
        $statusCode = 401
    ) {
        return $this->jsonResponse(['code' => 'UNAUTHORIZED', 'message' => $message], $statusCode);
    }

    /**
     * format JSON response
     *
     * @param array|null $payload
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    protected function jsonResponse(array $payload = null, $statusCode = 404)
    {
        $payload = $payload ?: [];

        return response()->json($payload, $statusCode);
    }

    /**
     * @param array|null $payload
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    protected function jsonSuccessResponse(array $payload = null, $statusCode = 200)
    {
        return $this->jsonResponse(['data' => $payload], $statusCode);
    }

    /**
     * @param Model $item
     * @param TransformerAbstract $transformer
     * @param array $relationsToLoad
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    protected function jsonSuccessTransformedResponse(
        Model $item,
        $transformer,
        array $relationsToLoad = [],
        $statusCode = 200
    ) {

        if ($relationsToLoad) {
            $item->eagerLoadRelations($relationsToLoad);
        }

        $data = fractal($item, $transformer)->toArray();
        return $this->jsonSuccessResponse($data, $statusCode);
    }
}
