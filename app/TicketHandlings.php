<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketHandlings extends Model
{
    /**
     * Mass-assign fields
     *
     * @var array
     */
    protected $fillable = ['user_id', 'message'];

    /**
     * user relation to get the user data.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
