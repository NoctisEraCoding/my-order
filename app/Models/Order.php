<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $userId
 * @property string $couponCode
 * @property float $total
 * @property boolean $payed
 * @property integer $couriedId
 * @property string $created_at
 * @property string $updated_at
 * @property OrderProduct[] $orderProducts
 * @property PaymentStatus[] $paymentStatuses
 * @property Courier $courier
 * @property User $user
 */
class Order extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['userId', 'couponCode', 'total', 'payed', 'couriedId', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderProducts()
    {
        return $this->hasMany('App\Models\OrderProduct', 'orderId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paymentStatuses()
    {
        return $this->hasMany('App\Models\PaymentStatus', 'orderId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function courier()
    {
        return $this->belongsTo('App\Models\Courier', 'couriedId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'userId');
    }
}
