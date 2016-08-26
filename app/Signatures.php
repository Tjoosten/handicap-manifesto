<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Signatures.
 */
class Signatures extends Model
{
    /**
     * Mass-assign fields.
     *
     * @var array
     */
    protected $fillable = ['naam', 'geboortedatum', 'stad', 'email'];
}
