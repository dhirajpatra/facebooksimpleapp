<?php

namespace app;

use Laravel\Socialite\Contracts\User as ProviderUser;
use Illuminate\Support\Facades\Auth;
use \App\SocialAccount as SocialAccount;
use \App\User as User;

/**
 * Class SocialAccountService
 *
 * @package app
 */
class SocialAccountService
{
    /**
     * This method will create or get the user details from facebook provider
     *
     * @param ProviderUser $providerUser
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    public function createOrGetUser(ProviderUser $providerUser)
    {
        try {

            $account = SocialAccount::whereProvider('facebook')
                ->whereProviderUserId($providerUser->getId())
                ->whereIsActive(1)
                ->first();

            if ($account) {
                return $account->user;

            } else {

                $account = new SocialAccount([
                    'provider_user_id'      => $providerUser->getId(),
                    'provider'              => 'facebook',
                    'is_active'             => 1,
                    'provider_access_token' => $providerUser->token
                ]);

                $user = User::whereEmail($providerUser->getEmail())->first();
                // user not exist
                if (!$user) {

                    $user = User::create([
                        'email' => $providerUser->getEmail(),
                        'name' => $providerUser->getName(),
                        'username' => $providerUser->getNickname(),
                        'avatar' => $providerUser->getAvatar(),
                        'password' => bcrypt(str_random(20)),
                    ]);
                }
                // if the data different from saved data
                $this->checkIfUserNeedsUpdating($providerUser, $user);

                $account->user()->associate($user);
                $account->save();

                return $user;
            }

        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    /**
     * this method check if the user data are same as in db
     *
     * @param $userData
     * @param $user
     * @return string
     */
    public function checkIfUserNeedsUpdating($userData, $user) {

        try {
            // new data from services
            $socialData = [
                'avatar' => $userData->avatar,
                'email' => $userData->email,
                'name' => $userData->name,
                'username' => $userData->nickname,
            ];

            // already saved data
            $dbData = [
                'avatar' => $user->avatar,
                'email' => $user->email,
                'name' => $user->name,
                'username' => $user->username,
            ];

            if (!empty(array_diff($socialData, $dbData))) {
                $user->avatar = $userData->avatar;
                $user->email = $userData->email;
                $user->name = $userData->name;
                $user->username = $userData->nickname;

                $user->save();
            }

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * this method will process de authorization/removed app url call back from social network
     *
     * @param $signedRequest
     * @return bool|mixed|null
     */
    public function deAuthorize($signedRequest)
    {
        try {

            $socialAccount = new SocialAccount();

            // get the data out from facebook call back url
            list($encodedSig, $payload) = explode('.', $signedRequest, 2);

            $secret = env('FB_CLIENT_SECRET', 'c3e5bc1e3ab84e492d09a2c713ac4164'); // Use your app secret here

            // decode the data
            $sig = base64_decode(strtr($encodedSig, '-_,', '+/='));
            $data = json_decode(base64_decode(strtr($payload, '-_,', '+/=')), true);

            // confirm the signature
            $expectedSig = hash_hmac('sha256', $payload, $secret, $raw = true);
            if ($sig !== $expectedSig) {
                error_log('Bad Signed JSON signature!');
                return null;
            }

            $this->auth->logout();
            // update user as in active
            $socialAccount->updateStatusInactive( $data['user_id'] );

            return true;

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    
    }
}