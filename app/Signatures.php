<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Signatures
 * @package App
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
