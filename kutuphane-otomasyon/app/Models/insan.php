<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class insan extends Model
{
    use HasFactory;
    protected $table = 'insan';
    protected $fillable = ['Ad_Soyad','irtibat'];
}
