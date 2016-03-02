<?php
/**
 * Created by PhpStorm.
 * User: IGO-PC
 * Date: 9/27/2015
 * Time: 2:30 PM
 */

namespace App\Services\Contracts;

use Exception;
use Response;

/**
 * Interface IAuthService
 * @package App\Services\Contracts
 */
interface IAuthService
{
    /**
     * Handle social provider callback action for authorisation
     *
     * @param $provider
     * @return void
     */
    public function handleSocialProviderCallback($provider);

    /**
     * Redirect the user to the Provider authentication page.
     *
     * @param $provider
     * @return Response
     * @throws Exception
     */
    public function redirectToSocialProvider($provider);
}