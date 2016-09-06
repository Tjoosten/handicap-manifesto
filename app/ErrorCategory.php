<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ErrorCategory
 * @package App
 */
class ErrorCategory extends Model
{
    /**
     * Mass-assign fields.
     *
     * @var array
     */
    protected $fillable = ['categorie'];
}
