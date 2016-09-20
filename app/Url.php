<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Builder;

class Url extends Model
{
    protected $fillable = [
        'key', 'url', 'delete_on', 'single_use',
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('currentUser', function(Builder $builder) {
            $builder->where('user_id', '=', Auth::user()->id);
        });
    }
}
