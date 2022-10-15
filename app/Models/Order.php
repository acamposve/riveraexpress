<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 *
 * @property $id
 * @property $customer_id
 * @property $qty
 * @property $sub_total
 * @property $vat
 * @property $total
 * @property $pay
 * @property $due
 * @property $payBy
 * @property $order_date
 * @property $order_month
 * @property $order_year
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Order extends Model
{

    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['customer_id','qty','sub_total','vat','total','pay','due','payBy','order_date','order_month','order_year','order_time'];



}
