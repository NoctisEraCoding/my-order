<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property float $prize
 * @property string $cover
 * @property string $images
 * @property string $ingredients
 * @property string $allergens
 * @property boolean $hidden
 * @property integer $categoryId
 * @property string $created_at
 * @property string $updated_at
 * @property OrderProduct[] $orderProducts
 * @property Category $category
 * @property MenuProduct[] $menuProducts
 */
class Product extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    protected $casts = [
        'images' => 'array',
        'ingredients' => 'array',
        'allergens' => 'array',
    ];

    /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'prize', 'cover', 'images', 'ingredients', 'allergens', 'hidden', 'categoryId', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderProducts()
    {
        return $this->hasMany('App\Models\OrderProduct', 'productId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'categoryId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function menuProducts()
    {
        return $this->hasMany('App\Models\MenuProduct', 'productId');
    }
}
