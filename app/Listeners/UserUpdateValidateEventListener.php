<?php namespace App\Listeners;

use Auth;
use Crip\UserManager\App\Events\UserUpdateValidate;
use Validator;

/**
 * Class UserUpdateValidateEventListener
 * @package App\Listeners
 */
class UserUpdateValidateEventListener
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
     * @param  UserUpdateValidate $event
     * @return \Illuminate\Validation\Validator
     */
    public function handle(UserUpdateValidate $event)
    {
        if (Auth::user()->id != $event->id) {
            // TODO: add validation to allow change other user data
        }

        $validator = Validator::make($event->request->all(), [
            'email' => 'email|required|unique:users,email,' . $event->id,
            'name' => 'required',
            'password' => 'min:6'
        ]);

        return $validator;
    }
}