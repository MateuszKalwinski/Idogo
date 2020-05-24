<?php

namespace App\Services;
use App\SocialFacebookAccount;
use App\User;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialFacebookAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialFacebookAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new SocialFacebookAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {

                $user_data = explode(' ', $providerUser->getName());
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $user_data[0],
                    'surname' => $user_data[1],
                    'password' => md5(rand(1,10000)),
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }
}
