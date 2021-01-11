<?php

namespace App\Traits;

use Symfony\Component\HttpFoundation\Response;

trait ApiResponse
{
    protected function prepareApiResponse(string $message = '', int $statusCode = Response::HTTP_NOT_FOUND)
    {
        if (empty($message)) {
            $message = Response::$statusTexts[$statusCode];
        }

        return [
            'status' => [
                'code' => $statusCode,
                'message' => $message,
            ],
        ];
    }

    protected function successApiResponse($data, int $statusCode = Response::HTTP_OK, string $message = '')
    {
        $response = $this->prepareApiResponse($message, $statusCode);
        $response['data'] = $data;

        return response()->json($response, $statusCode);
    }

    protected function errorApiResponse(array $errors, int $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR, string $message = '')
    {
        $response = $this->prepareApiResponse($message, $statusCode);
        $response['errors'] = $errors;

        return response()->json($response, $statusCode);
    }

    public function okApiResponse(array $data, string $message = '')
    {
        return $this->successApiResponse($data, Response::HTTP_OK, $message);
    }

    public function createdApiResponse($data, string $message = '')
    {
        return $this->successApiResponse($data, Response::HTTP_CREATED, $message);
    }

    public function badRequestApiResponse(array $data, string $message = '')
    {
        return $this->errorApiResponse($data, Response::HTTP_BAD_REQUEST, $message);
    }

    public function unauthorizedApiResponse(array $data, string $message = '')
    {
        return $this->errorApiResponse($data, Response::HTTP_UNAUTHORIZED, $message);
    }

    public function forbiddenApiResponse(array $data, string $message = '')
    {
        return $this->errorApiResponse($data, Response::HTTP_FORBIDDEN, $message);
    }

    public function notFoundApiResponse(array $data, string $message = '')
    {
        return $this->errorApiResponse($data, Response::HTTP_NOT_FOUND, $message);
    }

    public function conflictApiResponse(array $data, string $message = '')
    {
        return $this->errorApiResponse($data, Response::HTTP_CONFLICT, $message);
    }

    public function unprocessableApiResponse(array $data, string $message = '')
    {
        return $this->errorApiResponse($data, Response::HTTP_UNPROCESSABLE_ENTITY, $message);
    }
}