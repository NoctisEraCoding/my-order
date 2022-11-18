<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $orderId
 * @property integer $userId
 * @property string $intentStripe
 * @property string $chargeStripe
 * @property string $refundStripe
 * @property string $refundReason
 * @property string $created_at
 * @property string $updated_at
 * @property Order $order
 * @property User $user
 */
class PaymentStatus extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'payment_status';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['orderId', 'userId', 'intentStripe', 'chargeStripe', 'refundStripe', 'refundReason', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo('App\Models\Order', 'orderId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'userId');
    }
}
