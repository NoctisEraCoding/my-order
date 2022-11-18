<?php

namespace App\Models;

use App\Events\NewNotifications;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $userId
 * @property string $text
 * @property boolean $read
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 */
class Notification extends Model
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
    protected $fillable = ['userId', 'text', 'read', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'userId');
    }

    public static function createNotification($userId, $message){
        $notification = new Notification;
        $notification->userId = $userId;
        $notification->text = $message;
        $notification->save();

        event(new NewNotifications($notification));
    }
}
