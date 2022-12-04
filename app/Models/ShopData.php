<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $phone
 * @property string $workDay
 * @property string $workHour
 * @property string $closedDay
 * @property string $location
 * @property string $email
 * @property string $googleMap
 * @property string $twitter
 * @property string $facebook
 * @property string $instagram
 */
class ShopData extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';
    public $timestamps = false;
    protected $table = 'shop_datas';

    /**
     * @var array
     */
    protected $fillable = ['phone', 'workDay', 'workHour', 'closedDay', 'location', 'email', 'googleMap', 'twitter', 'facebook', 'instagram'];
}
