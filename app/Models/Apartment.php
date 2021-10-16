<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'address', 'price', 'thumbnail','content', 'detail', 'status'];
    use HasFactory;
}
