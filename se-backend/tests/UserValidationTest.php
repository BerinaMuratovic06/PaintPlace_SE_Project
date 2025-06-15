<?php
use PHPUnit\Framework\TestCase;

class UserValidationTest extends TestCase {
    public function testRegisterMissingFields() {
        $context = stream_context_create([
            'http' => [
                'method'  => 'POST',
                'header'  => "Content-Type: application/json\r\nAccept: application/json\r\n",
                'content' => json_encode([
                    'email' => 'test@example.com'
                    // Missing username, password, etc.
                ]),
                'ignore_errors' => true
            ]
        ]);

$response = file_get_contents('http://localhost:8080/users', false, $context);

$json = json_decode($response, true);
$this->assertIsArray($json, 'Response is not valid JSON');
$this->assertArrayHasKey('error', $json);

    }
}
