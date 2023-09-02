<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class satilik extends Model
{
    use HasFactory;
    protected $table = 'satilik';
    protected $fillable = ['kitap_adi', 'kitap_yazar', 'kitap_ISBN', 'kitap_stok','kitap_fiyat'];
}
