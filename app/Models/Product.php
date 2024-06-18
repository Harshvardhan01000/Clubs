<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{   
    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    use HasFactory;
    protected $fillable = [
        'club_id',
        'title',
        'product_title',
        'type',
    ];
}
