<?php

namespace AppTest\Action;

use App\ApiResponse;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;

class ApiResponseTest extends TestCase
{
    private $testClass;

    /** @test */
    public function it_returns_success()
    {
        $response = ApiResponse::success();

        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function it_returns_error()
    {
        $response = ApiResponse::error();

        $this->assertEquals(400, $response->getStatusCode());
    }

    /** @test */
    public function it_returns_the_success_message()
    {
        $message = "This is the message";

        $response = ApiResponse::success($message);
        $payload = $response->getPayload();

        $this->assertEquals($message, $payload['content']);
    }

    /** @test */
    public function it_returns_the_success_array()
    {
        $message = [
            0 => "This is",
            1 => "the array",
        ];

        $response = ApiResponse::success($message);
        $payload = $response->getPayload();

        $this->assertEquals($message, $payload['content']);
        $this->assertEquals(2, $payload['count']);
    }

    /** @test */
    public function it_returns_the_error_message()
    {
        $message = "This is the error";

        $response = ApiResponse::error($message);
        $payload = $response->getPayload();

        $this->assertEquals($message, $payload['error']);
    }

    /** @test */
    public function it_returns_the_error_array()
    {
        $message = [
            0 => "This is",
            1 => "the array",
            2 => "with an error call",
        ];

        $response = ApiResponse::error($message);
        $payload = $response->getPayload();

        $this->assertEquals($message, $payload['error']);
    }
}