<?php

namespace App\Models\Model\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekspedisi extends Model
{
    use HasFactory;

    protected $table  = 'ekspedisi';

    public function user_modify(){
        return $this->belongsTo( '\App\User',  'user_modified');
    }
}
