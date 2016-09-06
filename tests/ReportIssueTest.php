<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class ReportIssueTest
 */
class ReportIssueTest extends TestCase
{
    /**
     * GET|HEAD: /report
     * ROUTE:    report
     *
     * @group report
     * @group all
     */
    public function testReportView()
    {
        $url   = route('report');

        $route = $this->visit($url);
        $route->seeStatusCode(200);
    }
}
