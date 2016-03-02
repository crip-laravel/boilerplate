<?php

namespace App\Http\Controllers\Auth;

use App\Services\Contracts\IAuthService;
use App\User;
use Exception;
use Response;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

/**
 * Class AuthController
 * @package App\Http\Controllers\Auth
 */
class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * @var IAuthService
     */
    private $authService;

    /**
     * Create a new authentication controller instance.
     * @param IAuthService $authService
     */
    public function __construct(IAuthService $authService)
    {
        $this->middleware('guest', ['except' => 'getLogout']);
        $this->redirectPath = action('DashboardController@getIndex');
        $this->loginPath = action('Auth\AuthController@getLogin');
        $this->authService = $authService;
    }

    // URI is generated in class constructor
    protected $redirectPath = '';
    protected $loginPath = '';

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);
    }

    /**
     * Social authentications
     */

    /**
     * Redirect the user to the Provider authentication page.
     *
     * @param $provider
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return $this->authService->redirectToSocialProvider($provider);
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @param $provider
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $this->authService->handleSocialProviderCallback($provider);
    }
}
