<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class DisclaimerTest
 */
class DisclaimerTest extends TestCase
{
    /**
     * GET|HEAD: /disclaimer
     * ROUTE:    disclaimer
     *
     * @group all
     * @group disclaimer
     */
    public function testSignatureUrl()
    {
        $route = $this->visit(route('disclaimer'));
        $route->seeStatusCode(200);
    }
}
