<?php

namespace AppTest\Action;

use App\Action\AppointmentAction;
use App\JsonRequest;
use App\ApiResponse;
use Psr\Http\Message\ServerRequestInterface;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;

class AppointmentActionTest extends TestCase
{
    private $appointments = [
        ['id' => 1, 'start' => '2017-09-12T08:00:00', 'end' => '2017-09-12T09:00:00', 'client' => 'Eva', 'reason' => 1],
        ['id' => 2, 'start' => '2017-09-12T09:00:00', 'end' => '2017-09-12T10:00:00', 'client' => 'Boris', 'reason' => 4],
        ['id' => 3, 'start' => '2017-09-12T12:00:00', 'end' => '2017-09-12T13:00:00', 'client' => 'Steve', 'reason' => 3],
    ];



    /** @test */
    public function it_returns_an_array_of_appoinments()
    {
        $response = AppointmentAction::index();
        $payload = $response->getPayload();

        $this->assertEquals($payload['content'], $this->appointments);
    }

    /** @test */
    public function it_does_not_create_an_appoinment()
    {
        $response = AppointmentAction::create();
        $payload = $response->getPayload();

        $this->assertEquals(400, $response->getStatusCode());
        $this->assertEquals(['message' => 'invalid'], $payload['error']);
    }

    /** @test */
    public function it_creates_an_appoinment()
    {
        $appointment = json_encode([
            'client' => 'Test',
            'reason' => 2,
            'start' => '2017-09-12T13:00:00',
            'end' => '2017-09-12T14:00:00',
        ]);
 
        $stub = $this->createMock(JsonRequest::class);

        $stub->method('getBody')->willReturn($appointment);

        $response = AppointmentAction::create();
        $payload = $response->getPayload();

        // would need further digging here
        // $this->assertEquals(4, $payload['count']);
    }


    //
    // FROM HERE ON NOT FURTHER IMPLEMENTED
    //

    /** @test */
    public function it_throws_an_validation_error_when_creating_an_appoinment()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function it_gets_an_appoinment()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function it_updates_an_appoinment()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function it_throws_an_validation_error_when_updating_an_appoinment()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function it_deletes_an_appoinment()
    {
        $this->assertTrue(true);
    }

}
