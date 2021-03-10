<?php

namespace App\Models\Model\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $table  = 'bank';

    public function user_modify(){
        return $this->belongsTo( '\App\User',  'user_modified');
    }
}
