<?php
/**
 * Created by PhpStorm.
 * User: IGO-PC
 * Date: 9/27/2015
 * Time: 2:34 PM
 */

namespace App\Services\User;

use App\Repositories\Contracts\ISocialRepository;
use App\Repositories\Contracts\IUserRepository;
use App\Services\Contracts\IAuthService;
use Auth;
use Config;
use Exception;
use Response;
use Socialite;

/**
 * Class AuthService
 * @package App\Services\User
 */
class AuthService implements IAuthService
{
    /**
     * @var IUserRepository
     */
    private $userRepository;

    /**
     * @var ISocialRepository
     */
    private $socialRepository;

    /**
     * @param IUserRepository $userRepository
     * @param ISocialRepository $socialRepository
     */
    public function __construct(IUserRepository $userRepository, ISocialRepository $socialRepository)
    {
        $this->userRepository = $userRepository;
        $this->socialRepository = $socialRepository;
    }

    /**
     * Handle social provider callback action for authorisation
     *
     * @param $provider
     * @return void
     */
    public function handleSocialProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

        //Check is this email present in DB
        $existing = $this->socialRepository->findByProvider($user->id, $provider);

        if(empty($existing)) {
            //There is no combination of this social id and provider, so create new one
            // As there no use of user if social is not created, do this in database transaction
            $existing = \DB::transaction(function () use ($user, $provider) {
                $socialUser = $this->socialRepository->create([
                    'social_id' => $user->id,
                    'provider' => $provider,
                    'user_id' => $this->userRepository->create([
                        'email' => $user->email,
                        'name' => $user->name,
                    ])->id,
                ]);

                return $socialUser;
            });
        }

        Auth::login($existing->user, true);
    }

    /**
     * Redirect the user to the Provider authentication page.
     *
     * @param $provider
     * @return Response
     * @throws Exception
     */
    public function redirectToSocialProvider($provider)
    {
        // TODO: add custom exception and his handler for correct error view display
        $providerConfiguration = Config::get('services.' . $provider);
        if (empty($providerConfiguration) || !is_array($providerConfiguration)) {
            throw new Exception("Unknown provider '{$provider}'");
        }

        return Socialite::driver($provider)->redirect();
    }
}