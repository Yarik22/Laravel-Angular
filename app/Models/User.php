<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'bio',
        'profile_image',
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string) \Illuminate\Support\Str::uuid();
        });
    }
}
