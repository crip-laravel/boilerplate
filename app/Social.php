<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Social extends AppModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'social_logins';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'provider', 'social_id'];

    /**
     * @return BelongsTo
     */
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
