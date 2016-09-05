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
    protected $fillable = ['naam', 'email', 'melding', 'categorie', 'status'];

    /**
     * Category relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\ErrorCategory', 'categorie', 'id');
    }

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
