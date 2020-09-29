<?php

namespace Tests\Unit;

use App\Models\EcbRate;
use Tests\TestCase;

class EcbRateTest extends TestCase
{
    private $actualEcbRate;
    private $historicalEcbRate;

    protected function setUp(): void
    {
        parent::setUp();
        $this->actualEcbRate = EcbRate::factory()->create();
        $this->historicalEcbRate = EcbRate::factory()->historical()->create();
    }

    public function testActualScopeFiltersOutActualEcbRates()
    {
        $actualRates = EcbRate::actual()->get();
        $this->assertTrue($actualRates->contains('id', $this->actualEcbRate->id));
        $this->assertFalse($actualRates->contains('id', $this->historicalEcbRate->id));
    }

    public function testHistoricalScopeFiltersOutHistoricalEcbRates()
    {
        $historicalRates = EcbRate::historical()->get();
        $this->assertTrue($historicalRates->contains('id', $this->historicalEcbRate->id));
        $this->assertFalse($historicalRates->contains('id', $this->actualEcbRate->id));
    }
}
