<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\SocialAccountService;
use Socialite;
use User;

/**
 * Class SocialAuthController process Social networking related methods
 *
 * @package App\Http\Controllers
 */
class SocialAuthController extends Controller
{
    /**
     * Redirect User to FaceBook to approve OAuth Handshake.
     *
     * @return mixed
     */
    public function redirect()
    {
        try {
            return Socialite::driver('facebook')->redirect();

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Handle Return Request from FaceBook OAuth API
     *
     * @param SocialAccountService $service
     * @return \Illuminate\Http\RedirectResponse|string
     */
    public function callback(SocialAccountService $service)
    {
        try {
            $providerUser = Socialite::driver('facebook')->user();

            $user = $service->createOrGetUser($providerUser);

            \Auth()->login($user);

            return redirect()->to('/home');

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * when a user delete/remove/deauthorization the app from face book, called back url will come here
     *
     * @param $signedRequest
     * @return \Illuminate\Http\RedirectResponse|string
     */
    public function delete()
    {
        try {

            $socialAccountService = new SocialAccountService();
            
            $signedRequest = null;

            switch($_SERVER['REQUEST_METHOD'])
            {
                case 'GET':
                    $signedRequest = $_GET['signed_request'];
                    break;
                case 'POST':
                    $signedRequest = $_POST['signed_request'];
                    break;
            }

            $socialAccountService->deAuthorize($signedRequest);

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
