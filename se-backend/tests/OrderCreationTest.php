<?php
use PHPUnit\Framework\TestCase;

class OrderCreationTest extends TestCase {
    public function testCreateOrder() {
        $context = stream_context_create([
            'http' => [
                'method'  => 'POST',
                'header'  => "Content-Type: application/json\r\nAccept: application/json\r\n",
                'content' => json_encode([
                    'user_id'    => 1,
                    'painting_id'=> 1,
                    'quantity'   => 2
                ]),
                'ignore_errors' => true
            ]
        ]);

        $result = file_get_contents('http://localhost:8080/orders', false, $context);
        $json = json_decode($result, true);

        $this->assertArrayHasKey('order_id', $json);
    }
}
