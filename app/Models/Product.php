<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'type_id',
        'baseflavor_id',
    ];
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function baseflavor()
    {
        return $this->belongsTo(Baseflavor::class);
    }
    public function Tags()
    {
        return $this->belongsToMany(Tags::class);
    }
}
