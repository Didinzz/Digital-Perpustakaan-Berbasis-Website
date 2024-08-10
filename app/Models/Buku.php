<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Buku extends Model
{
    use HasFactory;


    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    protected $keyType = 'string';
    public $incrementing = false;


     protected static function booted()
    {
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }
}
