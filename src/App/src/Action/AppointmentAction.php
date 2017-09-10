<?php

namespace App\Action;

use App\JsonRequest;
use App\ApiResponse;
use Psr\Http\Message\ServerRequestInterface;

class AppointmentAction
{
    // Ignore the usage of a db right now
    private static $appointments = [
        ['id' => 1, 'start' => '2017-09-12T08:00:00', 'end' => '2017-09-12T09:00:00', 'client' => 'Eva', 'reason' => 1],
        ['id' => 2, 'start' => '2017-09-12T09:00:00', 'end' => '2017-09-12T10:00:00', 'client' => 'Boris', 'reason' => 4],
        ['id' => 3, 'start' => '2017-09-12T12:00:00', 'end' => '2017-09-12T13:00:00', 'client' => 'Steve', 'reason' => 3],
    ];


    /**
     * List all appointments
     *
     */
    public function index() 
    {
        return ApiResponse::success(self::$appointments);
    }

    /**
     * Create a new appointment
     *
     */
    public function create() 
    {
        $content = JsonRequest::getBody();

        if(! self::isValid($content)) return ApiResponse::error(['message' => 'invalid']);

        self::$appointments[] = $content;

        return ApiResponse::success(self::$appointments);
    }

    /**
     * Read one appointment
     *
     */
    public function read(ServerRequestInterface $request) 
    {
        $id = $request->getAttribute('id');

        foreach(self::$appointments as $key => $appointment) {
            if($appointment['id'] == $id) {
                return ApiResponse::success($appointment);
            }
        }

        return ApiResponse::error(['message' => 'Not found']);
    }

    /**
     * Update an existing appointment
     *
     */
    public function update(ServerRequestInterface $request) 
    {
        $id = $request->getAttribute('id');

        $content = JsonRequest::getBody();

        if(! $this->isValid($content)) return ApiResponse::error(['message' => 'invalid']);

        foreach(self::$appointments as $key => $appointment) {
            if($appointment['id'] == $id) {
                self::$appointments[$key] = $content;

                return ApiResponse::success(self::$appointments);
            }
        }

        return ApiResponse::error(['message' => 'Not found']);
    }

    /**
     * Delete an existing appointment
     *
     */
    public function delete(ServerRequestInterface $request) 
    {
        $id = $request->getAttribute('id');

        foreach(self::$appointments as $key => $appointment) {
            if($appointment['id'] == $id) {
                unset(self::$appointments[$key]);

                return ApiResponse::success(self::$appointments);
            }
        }

        return ApiResponse::error(['message' => 'Not found']);
    }


    /**
     * Validation
     * 
     * @param ServerRequestInterface $appointment
     * @return boolean
     */
    private function isValid($appointment)
    {
        if(! isset($appointment->client)) return false;
        if(! isset($appointment->start)) return false;
        if(! isset($appointment->end)) return false;
        if(! isset($appointment->reason)) return false;

        // could perform other logic here
        // i.e. check for valid dates
        // i.e. check for valid reason

        return true;
    }

}
