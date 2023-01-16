<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'keywords','email','mobile','phone','address','copyright','google_map', 'terms', 'logo', 'icon'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Setting\Database\factories\SettingFactory::new();
    }
}
