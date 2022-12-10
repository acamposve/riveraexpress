<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Employee
 *
 * @property $id
 * @property $name
 * @property $email
 * @property $phone
 * @property $address
 * @property $salary
 * @property $photo
 * @property $nid
 * @property $joining_date
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Employee extends Model
{
    
    static $rules = [
		'name' => 'required',
		'email' => 'required',
		'phone' => 'required',
		'address' => 'required',
		'salary' => 'required',
		'joining_date' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','email','phone','address','salary','photo','nid','joining_date'];



}
