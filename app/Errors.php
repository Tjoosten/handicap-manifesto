<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Errors
 * @package App
 */
class Errors extends Model
{
    /**
     * Mass-assign fields
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * Label relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function label()
    {
        return $this->belongsTo('App\ErrorStatus');
    }
}
