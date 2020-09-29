<?php

namespace Tests\Feature;

use App\Models\EcbRate;
use Tests\TestCase;

class EcbRateControllerTest extends TestCase
{
    private $ecbRate;

    protected function setUp(): void
    {
        parent::setUp();
        $this->ecbRate = EcbRate::factory()->create();
    }

    public function testIndex()
    {
        $response = $this->get(route('ecb-rates.index'));
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                '0' => [
                    'id',
                    'currency',
                    'rate',
                    'date',
                ],
            ],
        ]);
    }

    public function testShow()
    {
        $response = $this->get(route('ecb-rates.show', $this->ecbRate));
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                'id',
                'currency',
                'rate',
                'date',
                'history',
            ],
        ]);
    }

    public function testShowWithNonExistingId()
    {
        $response = $this->get(route('ecb-rates.show', 0));
        $response->assertStatus(404);
        $response->assertJsonStructure(['errors']);
    }
}
