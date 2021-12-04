<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Type extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;
    
    public $translatedAttributes = ['name'];
    protected $fillable =['categories_id'];
    public function product()
    {
        return $this->hasMany(Product::class);
    }
    public function categories()
    {
        return $this->belongsTo(Categories::class);
    }
}
