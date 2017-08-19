<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Socialite\Facades\Socialite;

class RegisterTest extends DuskTestCase
{
    /**
     * this will test social fb login
     */
    /*public function testLogin()
    {

        $abstractUser = Mockery::mock('Laravel\Socialite\Two\User');
         $abstractUser->shouldReceive('getId')
         ->andReturn(1234567890)
         ->shouldReceive('getEmail')
         ->andReturn(str_random(10).'@test.com')
         ->shouldReceive('getNickname')
         ->andReturn('Pseudo')
         ->shouldReceive('getName')
         ->andReturn('Arlette Laguiller')
         ->shouldReceive('getAvatar')
         ->andReturn('https://en.gravatar.com/userimage');

         $provider = Mockery::mock('Laravel\Socialite\Contracts\Provider');
         $provider->shouldReceive('user')->andReturn($abstractUser);

         Socialite::shouldReceive('driver')->with('facebook')->andReturn($provider);

         $this->visit(route("authFacebookCallback"))
         ->seePageIs(route("home"));



    

        $provider = \Mockery::mock('Laravel\Socialite\Contracts\Provider');
        $provider->shouldReceive('redirect')->andReturn('Redirected');
        $providerName = class_basename($provider);
        //Call model factory here
        //$socialAccount = factory('\User')->create(['provider' => $providerName]);

        $abstractUser = \Mockery::mock('Laravel\Socialite\Two\User');
        // Get the api user object here
        $abstractUser
            ->shouldReceive('getId')
            ->andReturn(rand())
            ->shouldReceive('getName')
            ->andReturn(str_random(10))
            ->shouldReceive('getEmail')
            ->andReturn(str_random(10) . '@gmail.com')
            ->shouldReceive('getAvatar')
            ->andReturn('https://en.gravatar.com/userimage');

        $provider = \Mockery::mock('Laravel\Socialite\Contracts\Provider');
        $provider->shouldReceive('user')->andReturn($abstractUser);

        Socialite::shouldReceive('driver')->with('facebook')->andReturn($provider);

        // After Oauth redirect back to the route user logged in
        $this->browse(function ($browser) {
            $browser->visit('/callback')
                -> assertSee('/');
        });

    }*/

    /**
     * @throws \Exception
     * @throws \Throwable
     */
    public function testExample()
    {
        $this->browse(function ($browser) {
            $browser->visit('/') //Go to the homepage
            ->clickLink('Register') //Click the Register link
            ->assertSee('Register') //Make sure the phrase in the arguement is on the page
            //Fill the form with these values
            ->value('#name', 'Joe')
                ->value('#email', 'joe@example.com')
                ->value('#password', '123456')
                ->value('#password-confirm', '123456')
                ->click('button[type="submit"]') //Click the submit button on the page
                ->assertPathIs('/home') //Make sure you are in the home page
                //Make sure you see the phrase in the arguement
                ->assertSee("You are logged in!");
        });
    }
}
