<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\KitapController;


class Kitap extends Model
{
    use HasFactory;
    protected $table = 'kitaplar';
    protected $fillable = ['kitap_adi', 'kitap_yazar', 'kitap_ISBN'];

}
