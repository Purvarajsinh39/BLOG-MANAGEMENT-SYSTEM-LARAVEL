<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class post extends Model
{
    public function user(){
        return $this->belongsTo(user::class);
     }

}
