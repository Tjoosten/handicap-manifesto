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
    protected $fillable = ['name', 'birth_date', 'address', 'city', 'email'];
}
