<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Post extends Model
{
    protected $fillable = ['title', 'content'];

    public $timestamps = true;

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $model->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        });
    }
}
