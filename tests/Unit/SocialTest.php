<?php

namespace Tests\Unit;

use Tests\TestCase;
use \Mockery;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use \Laravel\Socialite\Facades\Socialite as Socialite;
use \Laravel\Socialite\Contracts\User as ProviderUser;

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
        $socialiteUser = $this->createMock(Laravel\Socialite\Two\User::class);
        $socialiteUser->token = $token;
        $socialiteUser->id = $id;
        $socialiteUser->email = $email;

        $provider = $this->createMock(Socialite::driver('facebook'));
        $provider->expects($this->any())
            ->method('user')
            ->willReturn($socialiteUser);

        $stub = $this->createMock(Socialite::class);
        $stub->expects($this->any())
            ->method('driver')
            ->willReturn($provider);

        // Replace Socialite Instance with our mock
        $this->app->instance(Socialite::class, $stub);
    }

    /**
     * @test
     */
    public function it_redirects_to_facebook()
    {
        $response = $this->call('GET', Socialite::driver('facebook')->redirect());

        $this->assertContains('facebook.com/login/oauth', $response->getTargetUrl());
    }

    /** @test */
    public function it_retrieves_facebook_request_and_creates_a_new_user()
    {
        // Mock the Facade and return a User Object with the email 'foo@bar.com'
        $this->mockSocialiteFacade('foo@bar.com');

        $this->visit('/callback')
            ->seePageIs('/home');

        $this->seeInDatabase('users', [
            'email' => 'foo@bar.com',
        ]);
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
