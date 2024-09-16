<?php

namespace Tests\Unit;

use Illuminate\Http\Response;
use Illuminate\Foundation\Testing\TestCase;

class XeroControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function testBalanceSheetApiEndpoint(): void
    {
        $this->json('get', '/BalanceSheet')
        ->assertStatus(Response::HTTP_OK)
        ->assertJsonFragment(['ReportID' => 'BalanceSheet']);
    }
}
