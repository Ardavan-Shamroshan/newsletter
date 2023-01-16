<?php

namespace Modules\Admin\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = ['data' => 'array'];

    public function notifiable() {
        return $this->morphTo();
    }

    protected static function newFactory() {
        return \Modules\Admin\Database\factories\NotificationFactory::new();
    }

    /**
     * Relations
     */

    public function user() {
        return $this->morphMany(User::class, 'notifiable');
    }
}
