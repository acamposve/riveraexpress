<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Expense
 *
 * @property $id
 * @property $details
 * @property $amount
 * @property $expense_date
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Expense extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['details','amount','expense_date'];



}
