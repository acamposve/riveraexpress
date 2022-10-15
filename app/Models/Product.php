<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 *
 * @property $id
 * @property $product_name
 * @property $selling_price
 * @property $buying_price
 * @property $category_id
 * @property $created_at
 * @property $updated_at
 * @property $supplier_id
 * @property $product_code
 * @property $root
 * @property $buying_date
 * @property $image
 * @property $product_quantity
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Product extends Model
{

    static $rules = [
		'product_name' => 'required',
		'selling_price' => 'required',
		'buying_price' => 'required',
		'category_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['product_name','selling_price','buying_price','category_id','supplier_id','product_code','root','buying_date','image','product_quantity','night_price'];



}
