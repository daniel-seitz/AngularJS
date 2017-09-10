<?php

namespace App;

/**
 * Provides Methods to access the request
 */
abstract class JsonRequest
{
    /**
     * Get the body of the request
     *
     * @return json
     */
    public static function getBody()
    {
        $postdata = file_get_contents("php://input");
        
        return json_decode($postdata);
    }
}