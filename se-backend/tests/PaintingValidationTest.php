<?php
use PHPUnit\Framework\TestCase;

class PaintingValidationTest extends TestCase {
    public function testAddPaintingMissingFields() {
        $context = stream_context_create([
            'http' => [
                'method'  => 'POST',
                'header'  => "Content-Type: application/json\r\nAccept: application/json\r\n",
                'content' => json_encode([
                    'user_id' => 1,
                    'name'    => 'Untitled Painting'  // missing 'artist'
                ]),
                'ignore_errors' => true  
            ]
        ]);

        $result = file_get_contents('http://localhost:8080/paintings', false, $context);
        $json = json_decode($result, true);

        $this->assertEquals('Missing required fields', $json['error']);
    }
}
