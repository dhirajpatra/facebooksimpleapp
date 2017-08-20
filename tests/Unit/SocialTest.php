<?php

namespace Tests\Unit;

use Tests\TestCase;
use \Mockery;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use \Laravel\Socialite\Contracts\User as ProviderUser;
use Socialite;
use App\SocialAccount;
use App\User;


/**
 * Class SocialTest
 *
 * @package Tests\Unit
 */
class SocialTest extends TestCase
{

    /**
     * Mock the Socialite Factory, so we can hijack the OAuth Request.
     * @param  string  $email
     * @param  string  $token
     * @param  int $id
     * @return void
     */
    public function mockSocialiteFacade($email = 'foo@bar.com', $token = 'foo', $id = 1)
    {
        $socialiteUser = $this->createMock(Socialite::class);
        $socialiteUser->token = $token;
        $socialiteUser->id = $id;
        $socialiteUser->email = $email;

        $provider = $this->createMock(\App\SocialAccountService::class);
        $provider->expects($this->any())
            ->method('createOrGetUser')
            ->willReturn($socialiteUser);

        // Replace Socialite Instance with our mock
        $this->app->instance(Socialite::class, $provider);
    }

    /**
     * @test
     */
    public function it_redirects_to_facebook()
    {
        $response = $this->call('GET', '/redirect');

        $this->assertContains('https://www.facebook.com/v2.10/dialog/oauth', $response->getTargetUrl());
    }



    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    
}
