<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Bill
 *
 * @property $id
 * @property $name
 * @property $quantity
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Bill extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','quantity'];



}
