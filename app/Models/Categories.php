<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Categories extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;
    protected $fillable = [
        'image',
        'status'
    ];
    public $translatedAttributes = ['name', 'description', ];
    public function type()
    {
        return $this->hasMany(Type::class);
    }
}
