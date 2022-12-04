<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property string $image
 * @property string $description
 * @property boolean $show
 */
class HomepageSetting extends Model
{
    /**
     * @var array
     */
    public $timestamps = false;
    protected $fillable = ['id', 'title', 'image', 'description', 'show'];
}
