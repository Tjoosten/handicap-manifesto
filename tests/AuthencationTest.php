<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class AuthencationTest
 */
class AuthencationTest extends TestCase
{
    // DatabaseMigrations   = Used for running all the needed migrations.
    // DatabaseTransactions = used for simulation database transactions.
    use DatabaseMigrations, DatabaseTransactions;

    /**
     * GET|HEAD: login
     *
     * @group all
     * @group authencation
     */
    public function testLoginGet()
    {
        $route = $this->visit('login');
        $route->seeStatusCode(200);
    }

    /**
     * POST: /login
     *
     * @group all
     * @group authencation
     */
    public function testLoginPost()
    {
        $this->withoutMiddleware();
        $input = ['email' => 'user@domain.tld', 'password' => 'password'];
        $user = factory(App\User::class)->create([
            'email' => 'user@domain.tld',
            'password' => 'password',
        ]);

        $route = $this->post('/login', $input);
        $route->seeInDatabase('users', $input);
        $route->seeStatusCode(302);
    }

    /**
     * @group all
     * @group authencation
     */
    public function testRegisterGet()
    {

    }

    /**
     * @group all
     * @group authencation
     */
    public function testRegisterPost()
    {

    }

    /**
     * @group all
     * @group authencation
     */
    public function testLogoutGet()
    {

    }

    /**
     * @group all
     * @group authencation
     */
    public function testPasswordEmailPost()
    {

    }

    /**
     * @group all
     * @group authencation
     */
    public function testPasswordResetPost()
    {

    }

    /**
     * @group all
     * @group authencation
     */
    public function testPasswordResetGet()
    {

    }

    /**
     * @group all
     * @group authencation
     */
    public function testPasswordResetTokenGet()
    {

    }
}
