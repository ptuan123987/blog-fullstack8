<?php

namespace App\Http\Controllers;

use App\Models\SocialAccount;
use App\Http\Requests\StoreSocialAccountRequest;
use App\Http\Requests\UpdateSocialAccountRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Contracts\Provider;

use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAccountController extends Controller
{


    public function create(Provider $provider)
    {
        $providerUser = $provider->user();
        $providerName = class_basename($provider);

        $account = SocialAccount::whereProvider($providerName)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {
            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $providerName
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    'avatar' => $providerUser->getAvatar(),
                    'password' => Hash::make('password'),

                ]);
            }

            $account->user()->associate($user);
            $account->save();
            return $user;
        }
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback( $provider)
    {
        $user = $this->create(Socialite::driver($provider));

        if ($user->wasRecentlyCreated) {
            // This is the first login
            Auth::login($user);

            if ($user->role === 'user') {
                return redirect("/account/profile-setting");
            } elseif ($user->role === 'admin') {
                return redirect("/admin");
            } else {
                return redirect("/");
            }
        } else {
            Auth::login($user);

            if ($user->role === 'user') {
                return redirect("/account/profile-setting");
            } elseif ($user->role === 'admin') {
                return redirect("/admin");
            } else {
                return redirect("/");
            }
        }
    }

}
