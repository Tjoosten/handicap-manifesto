<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class SignatureTest.
 */
class SignatureTest extends TestCase
{
    // DatabaseMigrations   = Used for running all the needed migrations.
    // DatabaseTransactions = used for simulation database transactions.
    use DatabaseMigrations, DatabaseTransactions;

    /**
     * POST:   /signature
     * ROUTE:  signature.insert.
     *
     * @group all
     * @group signatures
     */
    public function testSignaturePost()
    {
        // Factories & named route
        $url = route('signature.insert');
        $signature = factory(App\User::class)->create();

        // Input.
        $input['naam'] = 'Jhon Doe';
        $input['email'] = 'JhonDoe@example.org';
        $input['geboortedatum'] = '00/00/1995';
        $input['stad'] = 'Silicon Valley';

        // Validation errors.
        $routeErr = $this->post($url, []);      // Validation errors url.
        $routeErr->dontSeeInDatabase('signatures', $input);
        $routeErr->seeStatusCode(302);
        $routeErr->assertHasOldInput();

        // Without validation.
        $routeSuc = $this->post($url, $input);  // Without validation errors url.
        $routeSuc->seeInDatabase('signatures', $input);
        $routeSuc->seeStatusCode(302);
    }

    /**
     * GET|HEAD: /
     * ROUTE:    Home.
     *
     * @group all
     * @group signatures
     */
    public function testSignatureGet()
    {
        $route = $this->visit(route('home'));
        $route->seeStatusCode(200);
    }

    /**
     * GET|HEAD: signature/pdf
     * ROUTE:    signature.pdf.
     *
     * @group all
     * @group signatures
     */
    public function testSignaturePdf()
    {
        $route = $this->visit(route('signature.pdf'));
        $route->seeStatusCode(200);
    }
}
