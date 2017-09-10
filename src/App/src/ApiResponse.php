<?php

namespace App;

use Zend\Diactoros\Response\JsonResponse;

class ApiResponse
{
    // status code of the response
    private static $statusCode;


    /**
     * Returns the data with success
     *
     * @return json
     */
    public static function success($data = [])
    {
        $content = [
            'content' => $data,
            'count' => count($data),
        ];

        return self::setStatusCode(200)->respond($content);
        
    }

    /**
     * Returns an error
     * This should be specified into more detailed responses
     *
     * @return json
     */
    public static function error($error = [])
    {
        $content = [
            'error' => $error,
            'code' => 'error',
        ];

        return self::setStatusCode(400)->respond($content);
    }

    /**
     * Assemble the Response
     *
     * @return json
     */
    private static function respond($content = [])
    {
        $response = new JsonResponse($content);

        return $response->withStatus(self::$statusCode);
    }

    /**
     * Sets the status code
     *
     * @param $statusCode
     * @return static
     */
    private static function setStatusCode($statusCode)
    {
        self::$statusCode = $statusCode;

        return new static;
    }
}