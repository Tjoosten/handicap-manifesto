<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Quotes
 * @package App
 */
class Quotes extends Model
{
    /**
     * Mass-assign fields
     *
     * @var array
     */
    protected $fillable = ['naam', 'email', 'publish', 'getuigenis'];
}
