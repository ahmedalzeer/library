<?php

namespace App\Models;

use App\Traits\ApiResponses;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    use HasFactory, ApiResponses;

    protected $table = 'authors';
    protected $fillable = ['name', 'gender', 'country', 'status'];
}
