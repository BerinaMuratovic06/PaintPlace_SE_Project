<?php
use PHPUnit\Framework\TestCase;

class DatabaseConnectionTest extends TestCase {
    public function testConnectionCheck() {
        $response = file_get_contents('http://localhost:8080/connection-check');
        $this->assertStringContainsString('Connected to the database', $response);
    }
}
