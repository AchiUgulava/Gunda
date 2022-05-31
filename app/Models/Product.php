<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Product extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    public $translatedAttributes = ['name', 'description'];
    protected $fillable = [
        'price',
        'image',
        'type_id',
        'baseflavor_id',
        'satus',
    ];



    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function baseflavor()
    {
        return $this->belongsTo(Baseflavor::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tags::class);
    }
}
