<?php
use PHPUnit\Framework\TestCase;

class GetPaintingsTest extends TestCase {
    public function testFetchAllPaintings() {
        $response = file_get_contents('http://localhost:8080/paintings');
        $data = json_decode($response, true);

        $this->assertIsArray($data);
    }
}
