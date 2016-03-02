<?php namespace App;

use Crip\Core\Data\Model;
use Crip\Core\Traits\CripUser;
use Crip\UserManager\Contracts\IHasPerm;
use Crip\UserManager\Contracts\IHasRole;
use Crip\UserManager\Traits\HasPerm;
use Crip\UserManager\Traits\HasRoles;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

/**
 * Class User
 * @package App
 */
class User extends Model implements AuthenticatableContract, CanResetPasswordContract, IHasPerm, IHasRole
{
    use Authenticatable, CanResetPassword, HasPerm, HasRoles, CripUser;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

}
