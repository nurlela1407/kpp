<?php

namespace App\Models\Model\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'nama', 'harga', 'stock_available', 'stock_total', 'elektronika_id', 'is_ready','jenis', 'berat', 'gambar',
    ];

    public function user_modify(){
        return $this->belongsTo('\App\User', 'user_modified');
    }
}
