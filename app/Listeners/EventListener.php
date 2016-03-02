<?php namespace App\Listeners;

use Crip\UserManager\App\Events\UserCreateValidate;
use Validator;

/**
 * Class EventListener
 * @package App\Listeners
 */
class EventListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the UserCreateValidateEvent event.
     *
     * @param  UserCreateValidate $event
     * @return \Illuminate\Validation\Validator
     */
    public function handle(UserCreateValidate $event)
    {
        $validator = Validator::make($event->request->all(), [
            'email' => 'email|required|unique:users,email',
            'name' => 'required',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|min:6|same:password'
        ]);

        return $validator;
    }
}