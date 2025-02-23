<?php

namespace Tests\Unit;
use App\Http\Controllers\Test;

use Tests\TestCase;
use Illuminate\Support\Facades\Http;
test('example', function () {
    expect(true)->toBeTrue();
});

class SampleTest extends TestCase {
    public function test_mock_api_response() {
        // Mock HTTP response for the API call
        Http::fake([
            'https://api.exchangerate-api.com/*' => Http::response([
                'rates' => ['EUR' => 0.222]
            ], 200)
        ]);

        $service = new Test();
        
        // The mocked response should return 0.85 for EUR
        $this->assertEquals(0.85, $service->getExchangeRate('EUR'));
    }
}

?>