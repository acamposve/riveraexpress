<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Coin
 *
 * @property $id
 * @property $name
 * @property $quantity
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Coin extends Model
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
