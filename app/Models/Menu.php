<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $from
 * @property string $to
 * @property float $prize
 * @property string $cover
 * @property string $created_at
 * @property string $updated_at
 * @property MenuProduct[] $menuProducts
 */
class Menu extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    protected $casts = [
        'products' => 'array'
    ];

    /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'from', 'to', 'prize', 'cover', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function menuProducts()
    {
        return $this->hasMany('App\Models\MenuProduct', 'menuId');
    }
}
