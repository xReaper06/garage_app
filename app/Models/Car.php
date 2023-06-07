<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $table = 'cars';
	protected $fillable = [
        'platenumber',
        'color',
        'model',
        'brand',
        'yearbought',
        'image',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
