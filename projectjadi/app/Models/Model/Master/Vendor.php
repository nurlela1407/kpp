<?php

namespace App\Models\Model\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $table  = 'vendors';

    public function user_modify(){
        return $this->belongsTo( '\App\User',  'user_modified');
    }
}
