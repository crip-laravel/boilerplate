<?php namespace App\Listeners;

use Crip\UserManager\App\Events\UserCreateValidateEvent;
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
     * Handle the event.
     *
     * @param  UserCreateValidateEvent $event
     * @return \Illuminate\Validation\Validator
     */
    public function handle(UserCreateValidateEvent $event)
    {
        return Validator::make($event->request->all(), [
            'email' => 'email|required',
            'name' => 'required',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|min:6|same:password'
        ]);
    }
}