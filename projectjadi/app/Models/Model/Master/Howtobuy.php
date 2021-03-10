<?php

namespace App\Models\Model\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Howtobuy extends Model
{
    use HasFactory;

    protected $table  = 'howtobuy';

    public function user_modify(){
        return $this->belongsTo( '\App\User',  'user_modified');
    }
}
