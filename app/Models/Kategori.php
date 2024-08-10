<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Kategori extends Model
{
    use HasFactory;
     protected $keyType = 'string';
    public $incrementing = false;


    // public function kategori(){
    //     return $this->belongsTo(Kategori::class, 'kategori_id');
    // }
     protected static function booted()
    {
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }

}
